@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

            <img src="{{asset('img/done.svg')}}" alt="">
        </div>
        <div class="col-md-6">
            <p class="display-3">Great! </p>
            <p class="display-4">
            You can now call {{ session('assistant') }} to assist them to room <u>{{session('roomz')}}</u>.
                <br><br>
                Don't forget to ask for the payment amount of : P {{session('final_amt')}}.00 
            </p>

            <a href="{{route('home')}}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Proceed to Home
            </a>
        </div>
    </div>
</div>
@endsection