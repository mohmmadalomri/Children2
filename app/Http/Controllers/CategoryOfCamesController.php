<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfGames;
use App\Models\Game;
use Illuminate\Http\Request;

class CategoryOfCamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoryOfGames = CategoryOfGames::paginate(5);
        return view('dashboard.categoryofgames.index', compact('categoryOfGames'));
    }

    public function __construct()
    {
        view()->share([
            'menu' => "categoryofgame"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('dashboard.categoryofgames.create');
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
            'name' => 'required|string',
            'image' => 'required|image',
            'background' => 'image'
        ]);

        $data = $request->all();
        $background = $request->file('background');
        $data['background'] = $this->images($background, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $categoryOfGames = CategoryOfGames::create($data);
        return redirect()->route('categoryofgames.index')->with('done', 'category add sucess fuly');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $games = Game::where('category_id', $id)->get();


        return view('dashboard.games.allgame')->with('games', $games);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryOfGames = CategoryOfGames::findOrFail($id);
        return view('dashboard.categoryofgames.create', compact('categoryOfGames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryOfGames)
    {

        $categoryOfGames = CategoryOfGames::find($categoryOfGames);
        $request->validate([
            'name' => 'string',
            'image' => 'image',
            'background' => 'image'
        ]);
        $data = $request->all();
        $image = $request->file('image');
        if ($request->hasFile('image')){
            $oldimage=$categoryOfGames->image;
            $data['image'] = $this->images($image, $oldimage);
        }
        $background = $request->file('background');
        if ($request->hasFile('background')){
            $oldbackground=$categoryOfGames->background;
            $data['background'] = $this->images($background, $oldbackground);
        }


        $categoryOfGames->update($data);
        return redirect()->route('categoryofgames.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryOfGames = Categoryofgames::find($id);
        $categoryOfGames->delete();
        return redirect()->route('categoryofgames.index');
    }
}
