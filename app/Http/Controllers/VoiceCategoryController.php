<?php

namespace App\Http\Controllers;

use App\Models\VoiceCategory;
use Illuminate\Http\Request;

class VoiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voicecategory=VoiceCategory::paginate(5);
        return view('dashboard.voicecategory.index',compact('voicecategory'));
    }

    public function __construct(){
        view()->share([
            'menu'=>"voiccategory"
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.voicecategory.create');
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
            'name' => 'required|string',
            'image' => 'required|image',
            'background' => 'required|image'
        ]);
        $data = $request->all();
        $background = $request->file('background');
        $data['background'] = $this->images($background, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $voicecategory=VoiceCategory::create($data);
        return redirect()->route('voice-category.index');
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
        $voicecategory=VoiceCategory::find($id);
        return view('dashboard.voicecategory.create',compact('voicecategory'));
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
        $voicecategory=VoiceCategory::find($id);
        $request->validate([
            'name' => 'string',
            'image' => 'image',
            'background' => 'image'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')){
            $oldimage=$voicecategory->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        if ($request->hasFile('background')){
            $oldbackground=$voicecategory->background;
            $background = $request->file('background');
            $data['background'] = $this->images($background, $oldbackground);
        }


        $voicecategory->update($data);
        return redirect()->route('voice-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voicecategory=VoiceCategory::find($id);
        $voicecategory->delete();
        return redirect()->route('voice-category.index');
    }
}
