@extends('admin.index')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="float:none;">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="examId">{{ trans('admin.exam') }}</label>
                    <select name="examId" id="examId" class="form-control">
                        <option value="">{{ trans('admin.select_exam') }}</option>
                        @foreach($exams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">{{ trans('admin.question') }}</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ trans('admin.enter_question') }}" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="order">{{ trans('admin.order') }}</label>
                    <input type="number" name="order" id="order" class="form-control" min="0" placeholder="{{ trans('admin.enter_order') }}" value="{{ old('order') }}">
                </div>
                <div class="form-group">
                    <label for="degree">{{ trans('admin.degree') }}</label>
                    <input type="number" name="degree" id="degree" class="form-control" min="0" placeholder="{{ trans('admin.enter_degree') }}" value="{{ old('degree') }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ trans('admin.new_question') }}</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

