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
                Here are your customer's requests items:
                <div class="row ml-3" style="font-size:30px">
                    {{$data['hours'] > 0 ? 'Extended hours: ' . $data['hours'] : ''}}
                    <br>

                    {{$data['foam'] > 0 ? 'Foam: ' . $data['foam'] : ''}}
                    <br>
                    
                    {{$data['pax'] > 0 ? 'Pax: ' . $data['pax'] : ''}}
                    <br>
                    
                    {{$data['towel'] > 0 ?  'Towel: ' . $data['towel']   : ''}}
                    <br>
                    
                    {{$data['blanket'] > 0 ? 'Blanket: ' . $data['blanket'] : ''}}
                </div>
                <br><br>
                <p class="display-4">

                    Don't forget to ask for additional payment of : P {{$data['added_costs']}}.00 
                </p>
            </p>

            <a href="{{route('home')}}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Proceed to Home
            </a>
        </div>
    </div>
</div>
@endsection