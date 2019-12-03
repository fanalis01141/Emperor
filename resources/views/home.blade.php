@extends('layouts.app')

@section('content')
<div class="container-fluid mon">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-10">
            <div class="text-center">
                <h1 class="font-weight-bold" style="font-size:60px;color:#295f2d">Welcome to your dashboard, 
                    {{Auth::user()->name}}
                </h1>
            </div>
        </div>
    </div>
</div>
<hr class="new4">
<div class="container-fluid">
    <div class="row">
        
    <div class="col-lg-2 ml-5">

        <div class="row mt-2">
            <div class="col-md-10">
                <a class="btn bg-lblue m-0 shadow btn-block" style="color:#ffbe00" href="{{route('customer.create')}}">
                    {{-- <a class="btn bg-lblue m-0 shadow btn-block" style="color:#ffbe00" data-toggle="modal" data-target="#new_customer" href="#"> --}}

                    <i class="fa fa-user-plus fa-5x mt-3" aria-hidden="true"></i>
                    <h3 class="mon">Add New Customer</h3>
                </a>
            </div>
        </div>


        <div class="row  mt-3">
            <div class="col-md-10">
                <a class="btn bg-greyzz m-0 shadow btn-block" style="color:#ffbe00" href="{{route('settings.index')}}">
                    <i class="fa fa-cogs fa-5x mt-3" aria-hidden="true"></i>
                    <h3 class="mon">Settings</h3>
                </a>
            </div>
        </div>

        @if (Auth::user()->priority == 'HI')
            <div class="row  mt-3">
                <div class="col-md-10">
                    <button class="btn m-0 shadow btn-block pink" style="color:#ffbe00">
                        <i class="fas fa-file-invoice fa-5x mt-3 "></i>
                        <h3 class="mon">Reports</h3>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="col-lg-9 mt-2">
        <table class="table table-bordered table-light table-striped text-center shadow" id="table">
            <thead class="thead-dark">
                <tr>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Occupant</th>
                    <th>Check-in hours</th>
                    <th>Time Out</th>
                    <th>Time Left</th>
                    <th>Assistant</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $c)
                    <tr class="item">
                        <td hidden class="row_id" id="row_id">{{$c->id}}</td>
                        <td scope="row" class="font-weight-bold">{{$c->room}}</td>
                        <td>{{$c->room_type}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->check_in_hrs}}</td>
                        <td id="time">
                            {{ $ymd = DateTime::createFromFormat('d F Y H:i:s', $c->time_out)->format('F d Y, h:i A') }}
                        </td>
                        <td id="tss" class="tss"> Please wait...
                            {{-- <div id="timer" class="timer">
                                <div class="days timer" id="days">-</div>
                                <div class="hours timer" id="hours">-</div>
                                <div class="minutes timer" id="minutes">-</div>
                                <div class="seconds timer" id="seconds">-</div>
                            </div> --}}
                        </td>
                        <td>{{$c->assistant}}</td>
                        <td>
                            <i class="fa fa-plus-circle lblue fa-2x" aria-hidden="true"></i>
                            <i class="fa fa-times red fa-2x" aria-hidden="true"></i>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>
</div>


</div>

<!-- Modal -->
<div class="modal fade" id="timeout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header  bg-danger ">
                        <i class="fa fa-hourglass-end fa-2x text-white" aria-hidden="true"></i>
                        <h5 class="modal-title text-white ml-3">NOTIFICATION!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid text-center">
                    <img src="{{asset('img/out.svg')}}" alt="">
                    <p  id="contenttt" style="font-size:40px">
                        Please be notified that there is a room that has timed out. Thank you!
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection


