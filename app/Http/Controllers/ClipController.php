<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clip;
use Validator, Input, Redirect, Session;

class ClipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all clips
        $clips = Clip::all();

        //load the view and pass clips
        return view('clipviews.index')
            ->with('clips', $clips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Load create form
        return view('clipviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'name' => 'required',
            'categoryid' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process login
        if($validator->fails())
        {
            return Redirect::to('clips/create')
                ->withErrors($validator);
        }
        else
        {
            // store
            $clip = new clip;
            $clip->name = Input::get('name');
            $clip->categoryid = Input::get('categoryid');

            $clip->save();
        }

        // redirect to index
        Session::flash('message', 'Clip was successfully created.');
        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the clip
        $clip = Clip::find($id);

        // show view and pass the clip to it
        return view('clipviews.show')
            ->with('clip', $clip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the clip
        $clip = Clip::find($id);

        //show the edit form and pass the clip to it
        return view('clipviews.edit')
            ->with('clip', $clip);
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
        // validate
        $rules = array(
            'name' => 'required',
            'categoryid' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process login
        if($validator->fails())
        {
            return Redirect::to('clips/'.$id.'/edit')
                ->withErrors($validator);
        }
        else
        {
            // store
            $clip = Clip::find($id);

            $clip->name = Input::get('name');
            $clip->categoryid = Input::get('categoryid');

            $clip->save();
        }

        // redirect to index
        Session::flash('message', 'Successfully updated clip.');
        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete clip
        $clip = Clip::find($id);
        $clip->delete();

        //redirect to index
        Session::flash('message', 'Successfully deleted the clip.');
        return Redirect::to('/');
    }
}
