@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <input type="submit" value="sussion end test" id="btn" class="btn btn-info btn-submit">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script type="text/javascript">
    $(document).ready(function () {

        $('#btn').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: "/home",
                type: "GET",
                success: function (response) {
                    $("#funcArea").html(response);
                },
                error: function (response) {

                    if (response.status == 401) {
                        toastr.warning('Please login to get back.', 'Session Expired', {timeOut: 5000})
                    }
                }
            });
        });
    });
</script>
@endsection
