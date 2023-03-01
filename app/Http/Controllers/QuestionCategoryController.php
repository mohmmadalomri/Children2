<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Monolog\Handler\IFTTTHandler;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questioncategory = QuestionCategory::paginate(5);
        return view('dashboard.questioncategory.index', compact('questioncategory'));

    }

    public function __construct()
    {
        view()->share([
            'menu' => "questioncqteory"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.questioncategory.create');

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
            'background' => 'required|image'
        ]);
        $data = $request->all();
        $background = $request->file('background');
        $data['background'] = $this->images($background, null);
        $image = $request->file('image');
        $data['image'] = $this->images($image, null);
        $questioncategory = QuestionCategory::create($data);
        return redirect()->route('question-category.index');
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
        $questioncategory = QuestionCategory::find($id);
        return view('dashboard.questioncategory.create', compact('questioncategory'));
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


        $questioncategory = QuestionCategory::find($id);
        $request->validate([
            'name' => 'string',
            'image' => '|mage',
            'background' => 'image'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $oldimage=$questioncategory->image;
            $data['image'] = $this->images($image, $oldimage);
        }
        if ($request->hasFile('background')){
            $oldbackground=$questioncategory->background;
            $background = $request->file('background');
            $data['background'] = $this->images($background, $oldbackground);
        }


        $questioncategory->update($data);
        return redirect()->route('question-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questioncategory = QuestionCategory::find($id);
        $questioncategory->delete();
        return redirect()->route('question-category.index');

    }


    public function startquiz($id)
    {

        $questions = Question::where('category_id', $id)->get();
        $questioncategory=QuestionCategory::all();
        Session::put("nextq", '1');
        Session::put("wrongans", '0');
        Session::put("correctans", '0');

        return view('dashboard.question.answeDesk')->with(['questions'=>$questions[0],'questioncategory'=>$questioncategory]);

    }


    public function submentans(Request $request,$id)
    {
        $questioncategory=QuestionCategory::all();
        $nextq = Session::get("nextq");
        $wrongans = Session::get("wrongans");
        $correctans = Session::get("correctans");

        $nextq += 1;

        if ($request->dbans == $request->ans) {
            $correctans += 1;
        } else {
            $wrongans += 1;
        }
        Session::put("nextq", $nextq);
        Session::put("wrongans", $wrongans);
        Session::put("correctans", $correctans);

        $questions = Question::where('category_id',$id)->get();
        $i = 0;
        foreach ($questions as $question) {
            $i++;
            if ($questions->count() < $nextq) {
                return view('dashboard.question.end');
            }
            if ($i == $nextq) {
//                return view('dashboard.question.answeDesk')->with(['question' => $question,'questioncategory'=>$questioncategory]);
                return view('dashboard.question.answeDesk',compact('questions','questioncategory'));
            }
        }
//        return view('dashboard.question.answeDesk')->with(['questions'=>$question]);

    }
}
