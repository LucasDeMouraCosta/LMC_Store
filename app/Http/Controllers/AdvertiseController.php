<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\AdvertiseImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{

    public function show(String $slug){
        $data['advertise'] = Advertise::where('slug', $slug)->first();

        if(!$data['advertise']){
            return redirect()->back()->with('error', 'O Anúncio não foi encontrado.');
        }
        
        $data['advertise']->views += 1;
        $data['advertise']->save();

        $data['relatedAdvertises'] = Advertise::where('category_id', $data['advertise']->category_id)
            ->where('state_id', $data['advertise']->state_id)
            ->where('id', '!=', $data['advertise']->id)
            ->orderBy('created_at', 'desc')
            ->orderBy('views', 'desc')
            ->limit(4)
            ->get();

        return view('advertise.show', $data);
    }

    public function delete(String $id){
        $advertise = Advertise::find($id);
        
        if(!$advertise){
            return redirect()->back()->with('error', 'O Anúncio não foi encontrado.');
        }
    
        if($advertise->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'Você não tem autorização para deletar esse Anúncio.');
        }

        $advertise->delete();
        return redirect()->back()->with('success', 'Anúncio deletado com sucesso!.');
    }
}
