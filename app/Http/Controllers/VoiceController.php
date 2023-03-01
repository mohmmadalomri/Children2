<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfGames;
use App\Models\Voice;
use App\Models\VoiceCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voices = Voice::paginate(5);
        $category = VoiceCategory::all();
        return view('dashboard.voice.index', compact('voices', 'category'));
    }

    public function __construct()
    {
        view()->share([
            'menu' => "voice"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = VoiceCategory::all();
        return view('dashboard.voice.create', compact('category'));
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
            'voice_file' => 'required|file',
            'name' => 'required|string'
        ]);
        $data = $request->all();
        $voice_file = $request->file('voice_file');
        $data['voice_file'] = $this->images($voice_file, null);
        $voices = Voice::create($data);
        return redirect()->route('voice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Voice $voice)
    {
        $path = storage_path("app/public/upload/files/audio/" . $voice->voice_file);

        if (!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = VoiceCategory::all();

        $voices = Voice::find($id);
        return view('dashboard.voice.create', compact('voices', 'category'));
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
        $voices = Voice::find($id);
        $request->validate([
            'voice_file' => 'file',
            'name' => 'string'
        ]);
        $data = $request->all();
//        $voice_file = $request->file('voice_file');

        if ($request->hasFile('voice_file')) {
            $oldvoice = $voices->voice_file;
            $voice_file = $request->file('voice_file');
            $data['voice_file'] = $this->images($voice_file, $oldvoice);

        }
        $voices->update($data);
        return redirect()->route('voice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voices = Voice::find($id);
        $voices->delete();
        return redirect()->route('voice.index');
    }
}
