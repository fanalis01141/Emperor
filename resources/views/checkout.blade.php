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

                You have checked-out {{$name}} from room {{$room}}.

                The total cost of {{$name}}'s stay is P {{$total}}.00
                
            </p>

            <a href="{{route('home')}}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Proceed to Home
            </a>
        </div>
    </div>
</div>
@endsection