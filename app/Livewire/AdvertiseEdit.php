<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdvertiseEdit extends Component
{

    use WithFileUploads;

    public $advertise;

    public $title;
    public $description;
    public $price;
    public $stateSelected;
    public $user_contact_id;
    public $categorySelected;
    public $negotiable;

    public $photos = [];
    public $allPhotos = [];
    public $featuredPhotoIndex = 0;
    public $photosToDelete = [];

    public function rules(){
        return [
            'title' => 'required|min:8|max:255',
            'description' => 'required|min:8|max:500',
            'price' => 'required|numeric|min:0',
            'categorySelected' => 'required|exists:categories,id',
            'stateSelected' => 'required|exists:states,id',
            'user_contact_id' => [
                'required',
                Rule::exists('user_contacts', 'id')->where(function ($query) {
                    $query->where('user_id', Auth::id());
                }),
            ],
            'photos' => 'array|max:10',
            'photos.*' => 'max:2048', 
        ];
    }

    public function mount($advertise){
        $this->advertise = $advertise;

        $this->title = $advertise->title;
        $this->description = $advertise->description;
        $this->price = number_format($advertise->price, 2, ',', '.');
        $this->stateSelected = $advertise->state_id;
        $this->user_contact_id = $advertise->user_contact_id;
        $this->categorySelected = $advertise->category_id;
        $this->negotiable = $advertise->negotiable;

        $this->photos = $advertise->images->map(function ($image) {
            return [
                'id' => $image->id,
                'url' => $image->url,
                'isNew' => false,
            ];
        })->toArray();

        $this->allPhotos = $this->photos;
    }

    public function prevPhoto(){
        if ($this->featuredPhotoIndex > 0) {
            $this->featuredPhotoIndex--;
            return;
        }

        if($this->featuredPhotoIndex === 0 && count($this->photos) > 0){
            $this->featuredPhotoIndex = count($this->photos) - 1;
        } else {
            $this->featuredPhotoIndex = 0;
        }
    }
    public function nextPhoto(){
        if ($this->featuredPhotoIndex < count($this->photos) - 1) {
            $this->featuredPhotoIndex++;
            return;
        }

        if($this->featuredPhotoIndex === count($this->photos) - 1 && count($this->photos) > 0){
            $this->featuredPhotoIndex = 0;
        }
    }

    public function updatedPhotos($newPhotos){
        
        $this->allPhotos = collect($this->allPhotos)
            ->merge(collect($newPhotos)->map(function ($photo) {
                return [
                    'id' => null, 
                    'url' => $photo->temporaryUrl(), 
                    'isNew' => true, 
                    'file' => $photo, 
                ];
            }))
            ->values()
            ->toArray();
        
        $this->photos = $this->allPhotos;

    }

    public function deletePhoto($index){
        $photo = $this->photos[$index];

        if (!$photo['isNew']) {
            $this->photosToDelete[] = $photo['id'];
        }

        unset($this->photos[$index]);
        $this->photos = array_values($this->photos);

        $this->allPhotos = $this->photos;


        if ($this->featuredPhotoIndex >= count($this->photos)) {
            $this->featuredPhotoIndex = count($this->photos) - 1;
        }
    }

    public function movePhotoLeft($index){
        if ($index > 0) {
            $temp = $this->photos[$index - 1];
            $this->photos[$index - 1] = $this->photos[$index];
            $this->photos[$index] = $temp;

            $this->allPhotos = $this->photos;

            if ($this->featuredPhotoIndex === $index) {
                $this->featuredPhotoIndex--;
            } elseif ($this->featuredPhotoIndex === $index - 1) {
                $this->featuredPhotoIndex++;
            }
        }
    }

    public function movePhotoRight($index){
        if ($index < count($this->photos) - 1) {
            $temp = $this->photos[$index + 1];
            $this->photos[$index + 1] = $this->photos[$index];
            $this->photos[$index] = $temp;

            $this->allPhotos = $this->photos;

            if ($this->featuredPhotoIndex === $index) {
                $this->featuredPhotoIndex++;
            } elseif ($this->featuredPhotoIndex === $index + 1) {
                $this->featuredPhotoIndex--;
            }
        }
    }

    public function save(){
        $originalPrice = $this->price;
        $this->price = str_replace(['.', ','], ['', '.'], $this->price);
        $this->price = (float) $this->price;
        
        try {
            $this->validate();
        } catch (\Exception $e) {
            $this->price = $originalPrice;
            throw $e;
        }
    
        $slug = Str::slug($this->title);
        $originalSlug = $slug;
        $i = 1;
    
        while (Advertise::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }

        $this->advertise->update([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'state_id' => $this->stateSelected,
            'user_contact_id' => $this->user_contact_id,
            'category_id' => $this->categorySelected,
            'negotiable' => $this->negotiable,
        ]);

        
        foreach ($this->photosToDelete as $photoId) {
            $image = $this->advertise->images()->find($photoId);

            if ($image) {
                $imagePath = public_path($image->url); 

                if (file_exists($imagePath)) {
                    unlink($imagePath); 
                }
                
                $image->delete();
            }
        }

        if ($this->photos) {
            $destinationPath = public_path('assets' . DIRECTORY_SEPARATOR . 'advertises_images');

            foreach ($this->photos as $index => $photo) {
                if (!$photo['isNew']) {
                    $image = $this->advertise->images()->find($photo['id']);
                    if ($image) {
                        $image->update(['sequence_number' => $index]);
                    }
                }else{
                    $tempPath = str_replace('\\', '/', $photo['file']->getRealPath());
                    $filename = uniqid() . '.' . $photo['file']->getClientOriginalExtension();
                    
                    if (file_exists($tempPath)) {
                        rename($tempPath, $destinationPath . DIRECTORY_SEPARATOR . $filename);
                    } else {
                        throw new \Exception("O arquivo temporário não existe.");
                    }

                    AdvertiseImage::create([
                        'advertise_id' => $this->advertise->id,
                        'url' => '/assets/advertises_images/' .  $filename,
                        'sequence_number' => $index,
                    ]);
                }
            }
        }	

        $this->photosToDelete = [];

        $this->dispatch('advertise-edit', [
            'message' => 'Alterações salvas com sucesso!',
            'redirect' => route('my_ads')
        ]);

    }

    public function render(){
        return view('livewire.advertise-edit');
    }
}
