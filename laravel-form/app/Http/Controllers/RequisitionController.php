<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $user_id = Auth::id();
        $requisition = Requisition::where('user_id', $user_id);
        return view('requests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);

        $newFileName = uniqid() . '-' . $request->title . '.' . $request->file->extension();

        $request->file->move(public_path('files'), $newFileName);

        Post::create([
            'title' => $request->input('title'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'requesttitle' => $request->input('requesttitle'),
            'message' => $request->input('message'),
            'file_path' => $newFileName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
