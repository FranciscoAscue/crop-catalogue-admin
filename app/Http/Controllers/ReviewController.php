<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function star(Request $request,$user,$clone){

        $stars = $request->input('rating');
 
        $fav = Review::where('user_id', $user)->first();

        if (!$fav) {
            $fav = Review::create([
                'user_id' => $user,
            ]);
        }

        $fav->update([
            'value' => $stars,
        ]);

        return response()->json(['success' => 'stars actualizado con éxito', 'stars' => $clone]);
      }
}
