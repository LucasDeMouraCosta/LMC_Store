<?php

namespace App\Livewire;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use App\Models\User;
use App\Models\UserContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdvertiseCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $stateSelected;
    public $user_contact_id;
    public $categorySelected;
    public $negotiable = '0';
    public $photos = [];

    public $allPhotos = [];
    public $featuredPhotoIndex = 0;

    protected $listeners = ['updatePrice'];

    // protected $rules = [
    //     'title' => 'required|min:8|max:255',
    //     'description' => 'required|min:8|max:500',
    //     'price' => 'required|numeric|min:0',
    //     'categorySelected' => 'required|exists:categories,id',
    //     'stateSelected' => 'required|exists:states,id',
    //     'user_contact_id' => [
    //         'required',
    //         Rule::exists('user_contacts', 'id')->where(function ($query) {
    //             $query->where('user_id', Auth::id());
    //         }),
    //     ],
    //     'photos' => 'array|max:10',
    //     'photos.*' => 'image|max:2048', // 2MB Max
    // ];

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
            'photos.*' => 'image|max:2048', // 2MB Max
        ];
    }

    public function mount(){
        $this->stateSelected = Auth::user()->state_id;
        $this->user_contact_id = UserContact::where('user_id', Auth::user()->id)->orderBy('label')->first()->id;
    }

    public function render(){
        return view('livewire.advertise-create');
    }

    public function updatePrice($price){
        $this->price = $price;
    }

    public function updatedPhotos($newPhotos){

        $this->allPhotos = collect($this->allPhotos)
        ->merge($newPhotos)
        ->unique(fn ($file) => $file->getFilename())
        ->values()
        ->toArray();

        $this->photos = $this->allPhotos;
    }

    public function prevPhoto()
    {
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
    public function nextPhoto()
    {
        if ($this->featuredPhotoIndex < count($this->photos) - 1) {
            $this->featuredPhotoIndex++;
            return;
        }

        if($this->featuredPhotoIndex === count($this->photos) - 1 && count($this->photos) > 0){
            $this->featuredPhotoIndex = 0;
        }
    }

    public function deletePhoto($index)
    {
        if ($index <= $this->featuredPhotoIndex && $this->featuredPhotoIndex !== 0) {
            $this->featuredPhotoIndex--;
        }
    
        // Remove o índice e reatribui os itens restantes
        unset($this->photos[$index]);
    
        // Aqui forçamos o reindexamento para garantir que o array fique limpo e sem "fantasmas"
        $this->photos = collect($this->photos)->values()->all();
    
        // Garantir que o índice de destaque continue válido
        if ($this->featuredPhotoIndex < 0 && count($this->photos) > 0) {
            $this->featuredPhotoIndex = 0;
        }

        $this->allPhotos = $this->photos;
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
        $this->price = str_replace(['.', ','], ['', '.'], $this->price);
        $this->price = (float) $this->price;
        
        $this->validate();
    
        $slug = Str::slug($this->title);
        $originalSlug = $slug;
        $i = 1;
    
        while (Advertise::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }
        
        $advertise = Advertise::create([
            'title' => $this->title,
            'slug' => $slug,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->categorySelected,
            'user_id' => Auth::id(),
            'user_contact_id' => $this->user_contact_id,
            'state_id' => $this->stateSelected,
            'negotiable' => $this->negotiable,
            
        ]);

        if ($this->photos) {
            $destinationPath = public_path('assets' . DIRECTORY_SEPARATOR . 'advertises_images');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); 
            }

            foreach ($this->photos as $index => $photo) {
                $tempPath = str_replace('\\', '/', $photo->getRealPath());
                $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
                
                if (file_exists($tempPath)) {
                    rename($tempPath, $destinationPath . DIRECTORY_SEPARATOR . $filename);
                } else {
                    throw new \Exception("O arquivo temporário não existe.");
                }

                AdvertiseImage::create([
                    'advertise_id' => $advertise->id,
                    'url' => '/assets/advertises_images/' .  $filename,
                    'featured' => ($index == 0) ? 1 : 0,
                ]);
            }
        }

        $this->reset();

        $this->dispatch('advertise-create', [
            'message' => 'Anúncio criado com sucesso!',
            'redirect' => route('my_ads')
        ]);
    }
}
