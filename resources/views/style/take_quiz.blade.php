@extends('style.index')

@section('content')

    <div class="result">
        <div class="container" style="padding: 5rem 0">

            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <a href="{{route("user.contentQuiz")}}" id="export" class="btn btn-success btn-sm" >Take Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

