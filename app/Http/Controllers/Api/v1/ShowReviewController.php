<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use Symfony\Component\HttpFoundation\Response;

class ShowReviewController extends Controller
{
    public function show(Request $request, $id)
    {
        $review = Review::find($id);
        if (empty($review)) {
            return response()->json(['error' => 'Review not found'], Response::HTTP_NOT_FOUND);
        }

        return new ReviewResource($review);
    }
}
