<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AnswerDatatable;
use App\DataTables\ExamDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\QuestionRequest;
use App\Model\Answer;
use App\Model\Exam;
use App\Model\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnswerDatatable $answer)
    {
        return $answer->render('admin.answers.index', ['title' => trans('admin.answer-control')]);
    }
    public function createAnswer(AnswerDatatable $answer)
    {
        return $answer->render('admin.answers.index', ['title' => trans('admin.answer-control')]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
{
    // Assuming you fetch exams here, adjust it according to your logic
    $exams = Exam::all(); // Or however you retrieve your exams

    $questions = [];
    $examId = $request->input('examId');

    // Fetch questions only if examId is provided and valid
    if ($examId) {
        $exam = Exam::find($examId);
        if ($exam) {
            // Assuming you have a relationship between Exam and Question model
            $questions = $exam->questions;
        }
    }

    return view('admin.answers.create', [
        'title' => trans('admin.new_answer'),
        'exams' => $exams,
        'questions' => $questions,
    ]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request)
    {
        Answer::create($request->all());
        return redirect(aurl('exam/' . $request->examId))->with('success', trans('admin.create_success'));
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
    public function edit(Answer $answer)
    {
        return view('admin.answers.edit', ['title' => trans('admin.edit_answer_page'), 'answer' => $answer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, Answer $answer)
    {
        $answer->update($request->all());
        return redirect(aurl('answer'))->with('success', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect(aurl('answer'))->with('success', trans('admin.delete_success'));
    }

    public function destroyAll()
    {
        if (!request('items')) {
            return redirect(aurl('answer'))->with('error', trans('admin.please_check_record_number'));
        }
        // destory : it Make the Delete based on the number of request items it received
        Exam::destroy(request('items'));
        return redirect(aurl('answer'))->with('success', trans('admin.delete_success'));
    }
}
