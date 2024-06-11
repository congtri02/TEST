@extends('admin.index')

@section('content')

{{--{{$user->token}}--}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float:none;">{{ $title }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form_data" action="{{ aurl('admin/destroy/all') }}" method="POST">
            @csrf
            @method('DELETE')
            <table class="dataTable table table-bordered table-striped dtr-inline">
                {!! $dataTable->table() !!}
            </table>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-danger">
                <p class="empty_record d-none">{{ trans('admin.please_check_record_number') }}</p>
                <p class="not_empty_record d-none">
                    {{ trans('admin.confirm_delete_record') }} <span id="record_count"></span> {{ trans('admin.questionMark') }}
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">{{ trans('admin.close') }}</button>
                <button type="button" class="btn btn-primary btn-sm submit_delete_all">{{ trans('admin.okay') }}</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
<script>
    function delete_All() {
        // Define the delete_All function here
    }
</script>
@endpush

@endsection
