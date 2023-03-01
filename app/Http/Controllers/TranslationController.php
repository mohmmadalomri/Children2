<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfGames;
use App\Models\Question;
use App\Models\Translation;
use App\Models\TranslationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translation = Translation::paginate(5);
        $category = TranslationCategory::all();
        return view('dashboard.translation.index', compact('translation', 'category'));
    }

    public function __construct()
    {
        view()->share([
            'menu' => "translation"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = TranslationCategory::all();
        return view('dashboard.translation.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'link' => 'string|required',
            'image' => 'image|required'
        ]);
        $data = $request->all();
        $background = $request->file('background');
        $data['background'] = $this->images($background, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);

        $translation = Translation::create($data);
        return redirect()->route('translation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = TranslationCategory::all();
        $translation = Translation::find($id);
        return view('dashboard.translation.create', compact('translation', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $translation = Translation::find($id);

        $request->validate([
            'name' => 'string',
            'link' => 'string',
            'image' => 'image'
        ]);
        $data = $request->all();
        if ($request->hasFile('iamge')){
            $oldimage=$translation->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }


        $translation->update($data);
        return redirect()->route('translation.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $translation = Translation::find($id);
        $translation->delete();
        return redirect()->route('translation.index');

    }
}
