<?php

namespace App\Http\Controllers;

use App\Models\TranslationCategory;
use Illuminate\Http\Request;

class TranslationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translationcategory=TranslationCategory::paginate(5);
        return view('dashboard.translationcategory.index',compact('translationcategory'));
    }
    public function __construct(){
        view()->share([
            'menu'=>"translationcategory"
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.translationcategory.create');

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
        $translationcategory=TranslationCategory::create($data);
        return redirect()->route('translation-category.index');
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
        $translationcategory=TranslationCategory::find($id);
        return view('dashboard.translationcategory.create',compact('translationcategory'));

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
        $translationcategory=TranslationCategory::find($id);
        $request->validate([
            'name' => 'string',
            'image' => 'image',
            'background' => 'image'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')){
            $oldimage=$translationcategory->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }
        if ($request->hasFile('background')){
            $oldbackgroumd=$translationcategory->background;
            $background = $request->file('background');
            $data['background'] = $this->images($background, $oldbackgroumd);
        }

        $translationcategory->update($data);
        return redirect()->route('translation-category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $translationcategory=TranslationCategory::find($id);
        $translationcategory->delete();
        return redirect()->route('translation-category.index');

    }
}
