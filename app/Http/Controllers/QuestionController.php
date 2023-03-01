<?php

namespace App\Http\Controllers;

use App\Models\CategoryOfGames;
use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isInstanceOf;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question = Question::paginate(5);
        $category = QuestionCategory::all();
        return view('dashboard.question.index', compact('category', 'question'));

    }

    public function __construct()
    {
        view()->share([
            'menu' => "question"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = QuestionCategory::all();
        return view('dashboard.question.create', compact('category'));
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
            'correct_answer' => 'required|string',
            'answer_1' => 'required|string',
            'answer_2' => 'required|string',
            'answer_3' => 'required|string',
            'answer_4' => 'required|string',
        ]);


        $data = $request->all();
        $background = $request->file('background');
        $data['background'] = $this->images($background, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $question = Question::create($data);

//        Session::put('successMassege',"Question successfully added");
        return redirect()->route('question.index');

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
        $question = Question::find($id);
        $category = QuestionCategory::all();
        return view('dashboard.question.create', compact('question', 'category'));
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
        $question = Question::find($id);
        $request->validate([
            'name' => '|string',
            'image' => '|image',
            'correct_answer' => 'string',
            'answer_1' => 'string',
            'answer_2' => 'string',
            'answer_3' => 'string',
            'answer_4' => 'string',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $oldimage = $question->image;
            $image = $request->file('image');
            $data['image'] = $this->images($image, $oldimage);
        }

        $question->update($data);
        return redirect()->route('question.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('question.index');
    }


//    public function startquiz($id)
//    {
//        $question = Question::where('category_id',$id)->first();
//        Session::put("nextq", '1');
//        Session::put("wrongans", '0');
//        Session::put("correctans", '0');
//
//        return view('dashboard.question.answeDesk', compact('question'));
//
//    }

//    public function submentans(Request $request,$id)
//    {
//        $nextq = Session::get("nextq");
//        $wrongans = Session::get("wrongans");
//        $correctans = Session::get("correctans");
//
//        $nextq += 1;
//
//        if ($request->dbans == $request->ans) {
//            $correctans += 1;
//        } else {
//            $wrongans += 1;
//        }
//        Session::put("nextq", $nextq);
//        Session::put("wrongans", $wrongans);
//        Session::put("correctans", $correctans);
//
//        $question = Question::where('category_id', $id)->get();
//        $i = 0;
//        foreach ($questions as $question) {
//            $i++;
//            if ($questions->count() < $nextq) {
//                return view('dashboard.question.end');
//            }
//            if ($i == $nextq) {
//                return view('dashboard.question.answeDesk')->with(['question' => $question]);
//            }
//        }
////        return view('dashboard.question.answeDesk')->with(['questions'=>$question]);
//
//    }


}
