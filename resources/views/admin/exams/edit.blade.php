@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('exam.update', $exam->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">{{ trans('admin.exam_name') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $exam->title }}">
            </div>

            <div class="form-group">
                <label for="totalDegree">{{ trans('admin.column_total_degree') }}</label>
                <input type="text" name="totalDegree" id="totalDegree" class="form-control" placeholder="{{ trans('admin.placeholder_total_degree_default') }}" value="{{ $exam->totalDegree }}">
            </div>

            <div class="form-group">
                <label for="isActive">{{ trans('admin.active') }}</label>
                <select name="isActive" id="isActive" class="form-control" style="height:calc(2.25rem + 5px);">
                    <option value="1" {{ $exam->isActive == 1 ? 'selected' : '' }}>{{ trans('admin.activate') }}</option>
                    <option value="0" {{ $exam->isActive == 0 ? 'selected' : '' }}>{{ trans('admin.not-activate') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
