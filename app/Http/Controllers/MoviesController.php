<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(4);
        return view('movies.index',compact('movies'))->with('i',(request()->input('page,1')-1)*4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres=['Action','Comedy','Biopic','Horror','Drama'];

        return view('movies.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required',
        'genre'=>'required',
        'poster'=>'required |image|mimes:jpeg,png,jpg,gif|max:2048',  
    ]);

        $imageName= '';
        if ($request->poster) {
            
            $imageName = time().'.'.$request->poster->extension();
            $request->poster->move(public_path('upload'),$imageName);
        }

        $data = new Movie;
         $data->title =$request->title;
         $data->genre =$request->genre;
         $data->release_year =$request->release_year;
         $data->poster =$imageName;
         $data->save();
         return redirect()->route('movies.index')->with('MOvies has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
