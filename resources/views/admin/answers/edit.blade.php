@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('answer.update', $answer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exam">{{ trans('admin.exam') }}</label>
                <select name="examId" id="exam" class="form-control">
                    @foreach(App\Model\Exam::pluck('title', 'id') as $examId => $examTitle)
                        <option value="{{ $examId }}" {{ $answer->examId == $examId ? 'selected' : '' }}>
                            {{ $examTitle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="question">{{ trans('admin.question') }}</label>
                <select name="questionId" id="question" class="form-control">
                    @foreach(App\Model\Question::pluck('title', 'id') as $questionId => $questionTitle)
                        <option value="{{ $questionId }}" {{ $answer->questionId == $questionId ? 'selected' : '' }}>
                            {{ $questionTitle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">{{ trans('admin.answer') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $answer->title }}">
            </div>

            <div class="form-group">
                <label for="order">{{ trans('admin.order') }}</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ $answer->order }}" min="0">
            </div>

            <div class="form-group">
                <label for="status">{{ trans('admin.answer_status') }}</label>
                <select name="status" id="status" class="form-control" style="height:calc(2.25rem + 5px);">
                    <option value="0" {{ $answer->status == 0 ? 'selected' : '' }}>
                        {{ trans('admin.not-correct') }}
                    </option>
                    <option value="1" {{ $answer->status == 1 ? 'selected' : '' }}>
                        {{ trans('admin.correct') }}
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
