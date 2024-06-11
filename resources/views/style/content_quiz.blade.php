<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quiz</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #888; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }
        body { background-color: #eee; }
        label.radio { cursor: pointer; }
        label.radio input { position: absolute; top: 0; left: 0; visibility: hidden; pointer-events: none; }
        label.radio span { padding: 4px 0px; border: 1px solid red; display: inline-block; color: red; width: 100px; text-align: center; border-radius: 3px; margin-top: 7px }
        label.radio input:checked + span { border-color: red; background-color: red; color: #fff; }
        .ans { margin-left: 36px !important; }
        .btn:focus { outline: 0 !important; box-shadow: none !important; }
        .btn:active { outline: 0 !important; box-shadow: none !important; }
    </style>
</head>
<body class='snippet-body'>
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom">
                    <div class="d-flex flex-row justify-content-between align-items-center mcq">
                        <h4>Quiz</h4><span>(page 1)</span></div>
                </div>
                <div class="question bg-white p-3 border-bottom">
                    <form id="quizForm" action="{{ route('quiz.submit') }}" method="POST">
                        @csrf
                        @foreach($quizzes as $quiz)
                            <div class="d-flex flex-row align-items-center question-title">
                                <h3 class="text-danger">Q{{ $loop->iteration }}.</h3>
                                <h5 class="mt-1 ml-2">{{ $quiz->question }}</h5>
                            </div>
                            <input type="hidden" name="id_{{ $quiz->id }}" value="{{ $quiz->id }}">

                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="answer_{{ $quiz->id }}" value="{{ $quiz->option1 }}"> <span>{{ $quiz->option1 }}</span> </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="answer_{{ $quiz->id }}" value="{{ $quiz->option2 }}"> <span>{{ $quiz->option2 }}</span> </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="answer_{{ $quiz->id }}" value="{{ $quiz->option3 }}"> <span>{{ $quiz->option3 }}</span> </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="answer_{{ $quiz->id }}" value="{{ $quiz->answer }}"> <span>{{ $quiz->answer }}</span> </label>
                            </div>

                        @endforeach
                        <div class="col-2 mx-auto d-flex flex-row justify-content-between align-items-center p-3 bg-white ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <?php
//                   echo count(array_column($quizResults, "isCorrect"));
                $arrResult = array_column($quizResults, "isCorrect");
                $arrResultCorrect = [];
                foreach($arrResult as $item){
                    if($item)
                        $arrResultCorrect[] = $item;
                }

                ?>
                @if(isset($quizResults) && !empty($_POST))
                    @foreach ($quizResults as $result)
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                            @if($result['isCorrect'])
                                <div class="alert alert-success">
                                    Correct for Question {{ $loop->iteration }}!</div>
                            @else
                                <div class="alert alert-danger">
                                    Incorrect for Question {{ $loop->iteration }}. The correct answer is:
                                    <span id="correctAnswer{{ $result['quiz']->id }}">{{ $result['quiz']->answer }}</span></div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            @if(count($arrResultCorrect) == count($arrResult))
                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    <input type="hidden" id="templateContent" class="form-control" placeholder="Enter template content">
                    <input type="hidden" id="quizContent" class="form-control" value="{{ json_encode($quizzes) }}"> <!-- New input field to hold quiz content -->
                    <button id="copyBtn" class="btn btn-primary border-success align-items-center btn-success" type="button">
                        Copy to Clipboard<i class="fa fa-angle-right ml-2"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#copyBtn').click(function() {
            var template = $('#templateContent').val();
            var quizContent = $('#quizContent').val();
            navigator.clipboard.writeText(template).then(function() {
                $.ajax({
                    url: '{{ route('quiz.copy') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        template: template,
                        quizContent: quizContent
                    },
                    success: function(response) {
                        alert(response.message + ' Copy count: ' + response.copy_count);
                    },
                    error: function(xhr, status, error) {
                        alert('Failed to copy text to database: ' + error);
                    }
                });
            }, function(err) {
                alert('Failed to copy text to clipboard: ' + err);
            });
        });
    });
</script>


</body>
</html>
