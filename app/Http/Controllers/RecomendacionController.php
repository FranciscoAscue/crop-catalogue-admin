<?php

namespace App\Http\Controllers;

use App\Models\Clon;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RecomendacionController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('System.index', compact('countries'));
    }


    public function show(Request $request)
    {
        $recommendedItems = $request['recommended_items'];

        $query = Clon::query();
        foreach ($recommendedItems as $index => $family) {
            if ($index === 0) {
                $query->where('family', $family);
            } else {
                $query->orWhere('family', $family);
            }
        }
        
        $results = $query->get();

        if ($results->isEmpty()) {
            $difference = $recommendedItems;
            return view('System.show',compact('results','difference'));
        }

        $uniqueFamilies = $results->pluck('family')->unique()->values()->toArray();
        $difference = array_diff($recommendedItems, $uniqueFamilies); 
        return view('System.show', compact('results', 'difference'));
    }

    public function get_recommend(Request $request)
{
    $url = 'http://localhost:10000/recommend';

    // Asegura que top_n sea un entero
    $top_n = (int) $request->quantity;

    // Los datos a enviar en el cuerpo de la solicitud
    $data = [
        'column_name' => $request->country ?? 'Peru',
        'top_n' => $top_n
    ];

    // Realiza la solicitud POST
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer PgVPDqHJ9ffJ2Lx73bXvv9uraib1Y0eCYb9HvCa3aOluuzfkoMFJ1',
    ])->post($url ,$data);

    return redirect()->route('clones.show', $response->json() );
}

}
