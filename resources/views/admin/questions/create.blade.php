@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">New Questions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('question.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exam_id">Exam</label>
                <select name="exam_id" id="exam_id" class="form-control">
                    <option value="{{ old('exam_id') }}"></option>
                    @foreach($exam as $exams)
                        <option value="{{ $exams->id }}">{{ $exams->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" name="question" id="question" class="form-control" placeholder="nhập câu hỏi" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input type="text" name="answer" id="answer" class="form-control" min="0" placeholder=" nhập đáp án " value="{{ old('answer') }}">
            </div>
            <div class="form-group">
                <label for="option1">Option1</label>
                <input type="text" name="option1" id="option1" class="form-control" min="0" placeholder=" câu trả lời thứ nhất" value="{{ old('option1') }}">
            </div>
            <div class="form-group">
                <label for="option2">Option2</label>
                <input type="text" name="option2" id="option2" class="form-control" placeholder=" câu trả lời thứ hai" value="{{ old('option2') }}">
            </div>
            <div class="form-group">
                <label for="option3">Option3</label>
                <input type="text" name="option3" id="option3" class="form-control" min="0" placeholder="câu trả lời thứ ba" value="{{ old('option3') }}">
            </div>


            <button type="submit" class="btn btn-primary">{{ trans('admin.new_question') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
