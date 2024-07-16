<?php

namespace App\Http\Controllers;

use App\Models\Clon;
use Illuminate\Http\Request;


class CloneController extends Controller
{
    public function show($id)
    {
        $foto = Clon::find($id);
        
        return view('System.item', compact('foto'));
    }
}
