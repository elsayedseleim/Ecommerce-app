<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    
    public function view(){
        $reviews = Review::all();
        // dd($reviews);
        return view('reviews',['reviews'=>$reviews]);
    }
    public function add(Request $request){
        $request->validate([
            'name'=>['required','min:5'],
            'email'=>'required',
            'subject'=>['required','min:5'],
            'comment'=>'required',
        ]);
        $review = new Review();
        $review->name = $request->name;
        $review->email = $request->email;
        $review->subject =  $request->subject	;
        $review->comment = $request->comment;

        $review->save();
        return redirect('/reviews');

    }
}
