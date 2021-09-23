<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $allMovies = Movie::all();

        if ($allMovies) {
            return response()->json([
                'success' => true,
                'data' => $allMovies
            ], 200);
        } 

        return response()->json([
            'success' => false,
            'messate' => 'Error from database'
        ], 500);
    }

    public function create(Request $request)
    {
        $movie = Movie::create([
            'title'=>$request->title,
            'director'=>$request->director,
            'year'=>$request->year,
            'duration'=>$request->duration,
            'genre'=>$request->genre,
            'actors'=>$request->actors,
        ]);

        if ($movie) {
            return response()->json([
                'success' => true,
                'message'=>'Movie created',
                'data' => $movie
            ], 200);
        } 

        return response()->json([
            'success'=>false,
            'message'=>'Error'
        ], 500);
    }

    public function update(Request $request, Movie $movie)
    {
        $movie = Movie::find($request->movie_id);

        if ($movie) {
            
            $movieUp = $movie->update(request()->all());

            if($movieUp){            
                return response()->json([
                    'success' => true,
                    'message'=>'Movie updated',
                    'user' => $movieUp
                ], 200);
            } 

            return response()->json([
                'success'=>false,
                'message'=>'Update error'
            ], 400);
        }

        return response()->json([
            'success'=>false,
            'message'=>'Unable to find the movie'
        ], 500);

    }


    public function destroy(Request $request)
    {
        $movie = Movie::find($request->movie_id);

        if ($movie) {

            $movie->delete();

            return response()->json([
                'success' => true,
                'message' => 'Movie deleted'
            ], 200);

        } 

        return response()->json([
            'success'=>false,
            'message'=>'Error'
        ], 500);
    }
}
