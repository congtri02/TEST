@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">{{ trans('admin.admin_name') }}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ trans('admin.admin_name') }}">
            </div>

            {{-- <div class="form-group">
                <label for="email">{{ trans('admin.email') }}</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">{{ trans('admin.password') }}</label>
                <input type="password" name="password" id="password" class="form-control">
            </div> --}}

            <button type="submit" class="btn btn-primary">{{ trans('admin.new_admin') }}</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection
