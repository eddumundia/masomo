<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel;
use App\Question;
use Input;

class QuestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        if(\Auth::user()->role_id == 3){
            $query = "created_by";
        }else if(\Auth::user()->role_id == 4){
            $query = "verified_by";
        }
        $questions = Question::latest()->where([$query => \Auth::user()->name])->get();
        return view('questions.index', compact('questions'));
    }
    
    public function create(){
        return view('questions.create');
    }
    
    public function store(Request $Requests){
        $option_1 = $Requests->input('firstoption');
        $option_2 = $Requests->input('secondoption');
        $option_3 = $Requests->input('thirdoption');
        $option_4 = $Requests->input('fourthoption');
        
        $question = new question();
        $question->question = $Requests->input('question');
        $question->subject_id = \Auth::user()->subject_id;
        $question->section_id = \Auth::user()->section_id;
        $question->created_by = \Auth::user()->name;
        if($question->save()){
            $question_id =  $question->id;
                 \App\Answer::create([
                    'question_id' => $question_id,
                    'created_by' => \Auth::user()->name,
                    'answer' => $option_1,
                ]);
                 \App\Answer::create([
                    'question_id' => $question_id,
                    'created_by' => \Auth::user()->name,
                    'answer' => $option_2,
                ]);
                  \App\Answer::create([
                    'question_id' => $question_id,
                    'created_by' => \Auth::user()->name,
                    'answer' => $option_3,
                ]);
                   \App\Answer::create([
                    'question_id' => $question_id,
                    'created_by' =>\Auth::user()->name,
                    'answer' => $option_4,
                ]);
        }
        return redirect("/question");
 
    }
    // public function show(Question $question){
    public function show($id){
       $question = Question::find($id);
       return view("questions.view", compact('question'));
    }
    
    public function edit($id){
        $question = Question::findOrFail($id);
        
        return view("questions.edit", compact('question'));
    }
    
public function update(Request $request, $id)
{
   $question = Question::find($id);
   $question->subject_id = $request->input('subject_id');
   $question->section_id = $request->input('section_id');
   $question->question = $request->input('question');
   $question->explanation = $request->input('explanation');
   $question->updated_by = \Auth::user()->name;
   $question->save();
    return redirect("/question/$id");
}
 /*
  * 
  */
public function Saveexplanation(Request $request,$id){
    $question = Question::find($id);
    $question->explanation = $request->input('explanation');
    $question->save();
    return redirect("/question/$id");
}
/*
 * 
 */
public function Verify($id){
    $question = Question::find($id);
    $question->verified = 1;
    $question->save();
    return redirect("/question/$id");
}
/*
 * 
 */
public function Correct($id, $answer){
    $answers = \App\Answer::where("question_id", $id)->update(['correct'=> 0]);
    $correct = \App\Answer::find($answer);
    $correct->correct = 1;
    $correct->save();
    return redirect("/question/$id");
}

public function upload(){
    return view("questions.upload");
}

public function uploadexcel(Request $request){
    if(Input::hasFile('questions')){
            $path = Input::file('questions')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $question = new Question();
                    $question->subject_id = $value->subject;
                    $question->section_id = $value->class;
                    $question->question = $value->question;
                    $question->created_by = \Auth::user()->name;
                    $question->created_at = date("Y-m-d H:i:s");
                    $question->updated_at = date("Y-m-d H:i:s");
                    if($question->save()){
                        \App\Answer::create([
                            'question_id' => $question->id,
                            'created_by' => \Auth::user()->name,
                            'answer' => $value->choice_a,
                        ]);
                        \App\Answer::create([
                            'question_id' => $question->id,
                            'created_by' => \Auth::user()->name,
                            'answer' => $value->choice_b,
                        ]);
                        \App\Answer::create([
                            'question_id' => $question->id,
                            'created_by' => \Auth::user()->name,
                            'answer' => $value->choice_c,
                        ]);
                        \App\Answer::create([
                            'question_id' => $question->id,
                            'created_by' => \Auth::user()->name,
                            'answer' => $value->choice_d,
                        ]);
                    }
                }
            }

    }
    return redirect("/question");
}


    
}
