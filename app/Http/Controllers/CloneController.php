<?php

namespace App\Http\Controllers;

use App\Models\Clon;
use Illuminate\Http\Request;


class CloneController extends Controller
{
    public function show($id)
    {
        $clone = Clon::find($id);        
        $foto = $clone->cloneCharacteristics()->random();;
        return view('System.item', compact('clone','foto'));
    }
}
