<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExamDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Model\Exam;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExamDatatable $exam)
    {

        return $exam->render('admin.exams.index', ['listExam' => Exam::all(),'title' => trans('admin.exam-control')]);
    }
    public function createExam(ExamDatatable $exam)
    {
        return $exam->render('admin.exams.add', ['title' => trans('admin.exam-control')]);
    }
    public function storeExam(Request $request )
    {
        try{
            Exam::create([
                'title' => $request->input('title')
            ]);
            Session::flash('success','Store exam successfull');
        }catch(\Exception $err){
            Session::flash('error',$err->getMessage());
        }
        return Redirect::to(route('exam.list'));
    }

    public function deleteExam(Request $request )
    {
        $resultAjax = new \stdClass();
        $resultAjax->status = false;
        $resultAjax->message = "";
        try{
            Exam::destroy([
                'id' => $_POST["id"]
            ]);
            $resultAjax->status = true;
            $resultAjax->message = "Remove exam successful";
        }catch(\Exception $err){
            $resultAjax->message = $err->getMessage();
        }
        echo json_encode($resultAjax);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exams.create', ['title' => trans('admin.new_question')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        Exam::create($request->all());
        return redirect(aurl('exam'))->with('success', trans('admin.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('admin.exams.view', ['title' => trans('admin.exam_details'), 'exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('admin.exams.edit', ['title' => trans('admin.edit_exam_page'), 'exam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $exam)
    {
        $exam->update($request->all());
        return redirect(aurl('exam'))->with('success', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect(aurl('exam'))->with('success', trans('admin.delete_success'));
    }

    public function destroyAll()
    {
        if (!request('items')) {
            return redirect(aurl('exam'))->with('error', trans('admin.please_check_record_number'));
        }
        // destory : it Make the Delete based on the number of request items it received
        Exam::destroy(request('items'));
        return redirect(aurl('exam'))->with('success', trans('admin.delete_success'));
    }
}
