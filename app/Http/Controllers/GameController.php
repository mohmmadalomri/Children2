<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfGames;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $games = Game::paginate(5);
        $category = CategoryOfGames::all();
        return view('dashboard.games.index', compact('games', 'category'));
    }


    public function __construct()
    {
        view()->share([
            'menu' => "games"
        ]);
    }

    public function allgame(CategoryOfGames $category)
    {

        $category = CategoryOfGames::all();

        $games = Game::where('category_id', $category->id)->get();
        return view('dashboard.games.allgame', compact('games', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = CategoryOfGames::all();
        return view('dashboard.games.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $games = Game::all();
        $request->validate([
            'name' => 'required|string',
            'link' => 'string',
            'description' => 'string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|integer',
            'backgrounder' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();
        $backgrounder = $request->file('backgrounder');
        $data['backgrounder'] = $this->images($backgrounder, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
//        if($backgrounder){
//            $file= $request->file('backgrounder');
//            $filename= date('YmdHi').$file->getClientOriginalName();
//            $file->move(public_path('Image/'), $filename);
//
//            $data['backgrounder']= 'Image/' . $filename;
//        }


//        if ($request->file('backgrounder')) {
//            $backgrounderfileName = uniqid() . '.' . $backgrounder->getClientOriginalExtension();
//            $backgrounderpath = Storage::putFileAs('public/images', $backgrounder, $backgrounderfileName);
//            $backgrounderurl = Storage::url($backgrounderpath);
//            $data['backgrounder'] = $backgrounderurl;
//        }

//        $image = $request->file('image');
//        if ($request->file('image')) {
//            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
//            $path = Storage::putFileAs('public/images', $image, $fileName);
//            $url = Storage::url($path);
//            $data['image'] = $url;
//        }


//        if ($image) {
//            $file = $request->file('image');
//            $filename = date('YmdHi') . $file->getClientOriginalName();
//            $file->move(public_path('Image/'), $filename);
//
//            $data['image'] = 'Image/' . $filename;
//        }


        $game = Game::create($data);
        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryOfGames $category)
    {
        $category = CategoryOfGames::all();
        $games = Game::where('category_id', $category)->get();

        return view('dashboard.games.allgame', compact('games', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = CategoryOfGames::all();
        $games = Game::find($id);
        return view('dashboard.games.create', compact('games', 'category'));
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
        $data = $request->all();
        $games = Game::find($id);
        $oldimage = $games->image;
        $request->validate([
            'name' => 'string',
            'link' => 'string',
            'description' => 'string',
            'image' => 'file',
            'category_id' => 'integer',
            'backgrounder' => 'file',
        ]);
//        $oldImage = public_path("/app/public/images/".$games->image);
//        if (Storage::exists($oldImage)) {
//            Storage::delete($oldImage);
//        }
//        $oldbackgrounder = public_path("/app/public/images/{$games->backgrounder}");
//        if (Storage::exists($oldbackgrounder)) {
//            Storage::delete($oldbackgrounder);
//        }
        if ($request->hasFile('image')) {
            $oldimage = $games->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }


//        if ($request->hasFile('image')) {
//            $oldfile = $oldimage;
//            $oldfilename = public_path('/') . $oldfile;
//            File::delete($oldfilename);
//
//            $file = $request->file('image');
//            $filename = date('YmdHi') . $file->getClientOriginalName();
//            $file->move(public_path('Image/'), $filename);
//
//            $data['image'] = 'Image/' . $filename;
//        }

        if ($request->hasFile('backgrounder')){
            $oldbackgrounder = $games->backgrounder;
            $backgrounder = $request->file('backgrounder');
            $data['backgrounder'] = $this->images($backgrounder, $oldbackgrounder);
        }

//        if ($request->file('backgrounder')) {
//            $backgrounderfileName = uniqid() . '.' . $backgrounder->getClientOriginalExtension();
//            $backgrounderpath = Storage::putFileAs('public/images', $backgrounder, $backgrounderfileName);
//            $backgrounderurl = Storage::url($backgrounderpath);
//            $data['backgrounder'] = $backgrounderurl;
//        }
//
//        $backgrounder=$request->file('backgrounder');
//            $backgrounderfileName=uniqid() . '.' . $backgrounder->getClientOriginalExtension();
//            $backgrounderpath=Storage::putFileAs('public/images', $backgrounder, $backgrounderfileName);
//            $backgrounderurl=Storage::url($backgrounderpath);
//            $data['backgrounder']=$backgrounderurl;


        $games->update($data);
        return redirect()->route('games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $games = Game::find($id);
        $games->delete();
        return redirect()->route('games.index');


    }
}
