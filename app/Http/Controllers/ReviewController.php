<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = new Review;
        $review->name = $request->get('name');
        $review->review = $request->get('review');
        $review->album_id = $request->get('album_id');
        $review->save();

        return redirect()->back()->with('success', 'New review has been added!');
    }
}
