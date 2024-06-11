@extends('admin.index')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="float:none;">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('exam.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="template">{{ trans('admin.exam_name') }}</label>
                    <input type="text" name="title" id="template" class="form-control" value="">
                </div>

                <button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
