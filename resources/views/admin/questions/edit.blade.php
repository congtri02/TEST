@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('question.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exam">{{ trans('admin.exam') }}</label>
                <select name="examId" id="exam" class="form-control">
                    @foreach(App\Model\Exam::pluck('title', 'id') as $examId => $examTitle)
                        <option value="{{ $examId }}" {{ $question->examId == $examId ? 'selected' : '' }}>
                            {{ $examTitle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">{{ trans('admin.question') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $question->title }}">
            </div>

            <div class="form-group">
                <label for="order">{{ trans('admin.order') }}</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ $question->order }}" min="0">
            </div>

            <div class="form-group">
                <label for="degree">{{ trans('admin.degree') }}</label>
                <input type="number" name="degree" id="degree" class="form-control" value="{{ $question->degree }}" min="0">
            </div>

            <button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
