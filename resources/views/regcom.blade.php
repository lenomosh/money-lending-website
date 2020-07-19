@extends('layouts.front1')
@section('script')
    @if ($errors->has('errorMessage'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong> {{ $errors->first('errorMessage') }}
        </div>
    @endif
    {{--@if ($errors->has('lname'))--}}
        {{--<div class="alert alert-danger">{{ $errors->first('lname') }}</div>--}}
        {{--<style>--}}
            {{--#lname {--}}
                {{--border-color: #761b18;--}}
            {{--}--}}
        {{--</style>--}}

    {{--@endif--}}
    <style>
        div.well {
            margin-top: 15%;
            margin-left: 15%;
            margin-right: 15%;
            border-radius: 25px;
        }
        div.well h1{
        @import url("https://fonts.googleapis.com/css?family=Lobster");
            font-family: 'Lobster', cursive;
            text-transform: uppercase;
            text-align: center;

        }
        div.well h2{
        @import url("https://fonts.googleapis.com/css?family=Noticia+Text");
            font-family: 'Noticia Text', serif;
            font-style: italic;
            text-align: center;
        }
        div img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;

        }
    </style>
@endsection

@section('initiatepayment')
    <div class="well">
        <div id="firstInitiate">
            <script>
                var link = document.getElementById('secondinitiate');
                // document.getElementById("button").value = "Try Again";
                link.style.display = 'none'; //or
                link.style.visibility = 'hidden';
                var link = document.getElementById('displayoninitiate');
                // document.getElementById("button").value = "Try Again";
                link.style.display = 'none'; //or
                link.style.visibility = 'hidden';
            </script>
            <img id="hidden" src="{{asset('images/mpesa.png')}}" width="200" height="153" class="img img-responsive img-rounded" alt="Lipa na MPesa Logo"><br><br>
            <h1 id="hidden">Hey {{Session()->get('name')}}, One more step</h1><br>
            <h2 id="hidden">Kindly pay a one time registration fee of KSH. 100</h2>
            <form action="regcom/initiate" method="post">
                @csrf
            <input id="button" type="submit" class="btn btn-lg btn-block btn-success" value="Pay Now">
            </form>
        </div>
        <form id="secondinitiate" action="regcom/checkstatus" method="post">
            @csrf
            @if (Session::has('checkoutRequestID'))

                <script>
                    var link = document.getElementById('firstInitiate');
                    // document.getElementById("button").value = "Try Again";
                    link.style.display = 'none'; //or
                    link.style.visibility = 'hidden';
                </script>
                <img src="{{asset('images/stkpush.png')}}" width="200" height="200" class="img img-responsive img-rounded" alt="Mpesa STK Push IMG"><br><br>
                <h1>You should see a STKPush on your phone with the Safaricom line <b>{{session()->get('phone')}} </b> that prompts you to enter your PIN</h1><br>
                <h2>The default registration fee is KSH. 100. Once you've completed the payment click the button below</h2>
            @endif
        </form>
        <form action="regcom/checkstatus" method="post">
            @csrf

            @if (Session::has('checkoutRequestID'))
                <input type="submit" class="btn btn-lg btn-block btn-info" value="Check Transaction Status">
                @if (Session::has('querystatus'))
                    <div class="alert alert-danger">
                        {{Session::get('querystatus')}}
                    </div>
                @endif

            @endif
            @if ($errors->has('response'))
                <div class="aler alert-danger">
                    {{$errors->first('response')}}
                </div>
                
            @endif
        </form>
        <br>
        @if (Session::has('checkoutRequestID'))
            <form  action="regcom/initiate" method="post">
                <div id="displayoninitiate">
                    @csrf
                    <input id="button" type="submit" class="btn btn-lg btn-block btn-warning" value="Initiate STK Push again">

                </div>
            </form>
            @endif


    </div>
    
@stop