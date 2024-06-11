@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('answer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="examId">{{ trans('admin.exam') }}</label>
                <select name="examId" id="examId" class="form-control">
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="questionId">{{ trans('admin.question') }}</label>
                <select name="questionId" id="questionId" class="form-control">
                    @foreach($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('admin.answer') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="order">{{ trans('admin.order') }}</label>
                <input type="number" name="order" id="order" class="form-control" min="0" value="{{ old('order') }}">
            </div>
            <div class="form-group">
                <label for="status">{{ trans('admin.answer_status') }}</label>
                <select name="status" id="status" class="form-control" style="height:calc(2.25rem + 5px);">
                    <option value="0">{{ trans('admin.not-correct') }}</option>
                    <option value="1">{{ trans('admin.correct') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ trans('admin.new_answer') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
