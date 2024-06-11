@extends('style.index')

@section('content')

    @if (!Auth::user()->isExamined)
        @include('style.exam.exam', compact('style.exam'))
    @else
        @include('style.exam.result', compact('style.exam'))
    @endif

@endsection
@section('scripts')
    <script>
        function exportTasks(_this) {
            let _url = $(_this).data('href');
            window.location.href = _url;
        }
    </script>
@endsection
