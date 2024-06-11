<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExamDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\QuestionRequest;
use App\Model\Exam;
use App\Model\Question;
use App\Model\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class QuestionController extends Controller
{


    public function storeQuestion(Request $request )
    {
        \Log::info($request->all());
        try{
            Quiz::create([
                'exam_id' => $request->input('exam_id'),
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
                'option1' => $request->input('option1'),
                'option2' => $request->input('option2'),
                'option3' => $request->input('option3'),
            ]);
            Session::flash('success','Store exam successfull');
        }catch(\Exception $err){
            Session::flash('error',$err->getMessage());
        }
        return Redirect::to(route('quiz.list'));
    }
    public function quizList(Request $request)
    {
        return view('admin.questions.index', [
            'listExam' => Quiz::all()
        ]);
    }

    public function create(ExamDatatable $exam)
    {
        return view('admin.questions.create', [
            'exam' => Exam::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->all());
        return redirect(aurl('exam/' . $request->examId))->with('success', trans('admin.create_success'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', ['title' => trans('admin.edit_question_page'), 'question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        return redirect(aurl('exam/' . $request->examId))->with('success', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('success', trans('admin.delete_success'));
    }

}
