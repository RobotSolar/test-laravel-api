<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Http\Resources\MovieResource;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(10, ['id','title', 'description', 'year', 'popularity', 'cover', 'director']);
        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created Movie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $validData = $request->validated();
        $movie = Movie::create($validData);
        
        return response()->json([ 
            'success' => true,
            'payload' => new MovieResource($movie),
            'errors' => '',
        ], 200);
    }

    /**
     * Display the specified Movie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return new MovieResource($movie);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $validData = $request->validated();
        $movie = Movie::findOrFail($id);
        $movie->update($validData);
        
        return response()->json([ 
            'success' => true,
            'payload' => new MovieResource($movie),
            'errors' => '',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

         return response()->json([ 
            'success' => true,
            'payload' =>  'deleted successfully',
            'errors' => '',
        ], 200);
    }
}
