<?php

namespace App\Http\Controllers;
use App\category;
use App\movie;
use Illuminate\Http\Request;

class movieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = movie::all();
        $category = category::pluck('name','id');
        return view('auth2.movie.index')->with('category',$category)->with('movie',$movie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'description'=>'required',
            'category_id'=>'required',
            'image'=>'required',
          ]);
        $image = $request->image;
        if($image){
            $imagename=$image->getClientOriginalName();
            $image->move('img',$imagename);
            $forminput['image'] = $imagename;
            $image = $imagename;

        }
        
        //
        $movie = new movie;
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
       
        $movie->category_id = $request->input('category_id');
        $movie->image = $image;
        $movie->save();
        $category = category::pluck('name','id');
        $Movie =$movie;

        $movie = movie::all();
        return view('auth2.movie.index')->with('category',$category)->with('movie',$movie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Movie = movie::find($id);
        $category = category::pluck('name','id');
        return view('auth2.movie.show')->with('Movie',$Movie)->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $movie = movie::find($id);
        $movie->delete();
        return redirect()->route('movie.index');
    }
}
