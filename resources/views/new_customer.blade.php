@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h3 class="mon font-weight-bold green" style="font-size:60px">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                    New Customer Panel
            </h3>
        </div>
        <hr class="new4">
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm text-center">
                @foreach ($errors->all() as $error)
                    <i class="fa fa-exclamation-circle fa-2x mr-3" aria-hidden="true"></i>
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <div class="row">
            
            <div class="col-md-3 text-center">
                <h3 for="" class="text-center">
                    <i class="fas fa-person-booth mr-3 lblue"></i>
                    List of Rooms</h3>
                <div class="card shadow-lg bg-dark">

                    @foreach ($rooms as $room)

                        <div class="text-center">
                            <button class="btn-room mt-2 mb-2 {{$room->avail == 'YES' ? 'btn  btn-success' : 'btn btn-danger disabled-btn'}}"
                                data-id="{{$room->id}}" data-number="{{$room->room_num}}" style="width:180px">
                                    Room Number: <strong>{{$room->room_num}}</strong>
                            </button>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="col-md-8 offset-1">
                <div class="card shadow-lg">
                    <div class="col-md-10 offset-1 text-center">
                        <form action="{{route('customer.store')}}" method="post">
                            @csrf
                            <h3 class="mt-3 text-left">
                                <i class="fa fa-user lblue" aria-hidden="true"></i>
                                Customer Name:
                            </h3>
                            
                            <input type="text" class="form-control bl" name="name" placeholder="Enter customer's name." required value="{{old('name')}}">
                            <input type="text" value="" id="roomid" name="roomid" hidden>
                            <input type="text" value="" id="roomz" name="roomz" hidden>
                            <input type="text" value="" id="check_in_hours" name="check_in_hours" placeholder="hours check in" hidden>
                            <input type="text" value="" id="amount" name="amount" placeholder="amount" hidden>
                            <h3 class="mt-3 text-left">
                                <i class="fas fa-hands-helping    "></i>
                                Select Assistant
                            </h3>
                            <div class="text-center">

                                <select name="assistant" id="" class="form-control bl text-center">
                                    @foreach ($assists as $assist)
                                        <option value="{{$assist->name}}">{{$assist->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="alert alert-success mt-3" id="div-picked" style="display:none">
                                    <span style="font-size:20px">
                                            You have selected room number: <u><span id="room_numberrr" class="font-weight-bolder" style="font-size:25px">333</span></u>
                                        </span>
                                        <i class="fas fa-door-open fa-2x mr-3"></i>
                                <hr>
                                <p class="mt-3">Number of hours of check-in:</p>
                                <div class="text-center d-flex justify-content-center">
                                    <select name="hours" id="hours" class="form-control" style="width:250px">
                                        <option value="NONE" disabled selected>— Select Hours of Check-in —</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="new4 mt-3">
                            <h3 class="text-left display-5" style="font-size:30px">Extras:</h3>
                            <div class="ml-5 text-left" style="font-size:25px">
                                <div class="row ">
                                    <div class="col-md-12 ">

                                        <span><i class="fa fa-bed" aria-hidden="true"></i> Foam:
                                        </span>
                                        <input type="number" min="0" max="999" name="foam" class=" ml-3 form-control bl2"
                                         placeholder="Enter additional foam" required value="{{old('foam', 0)}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <span><i class="fas fa-users    "></i> Pax:
                                        </span>
                                        <input type="number" min="0" max="999" name="pax" class="ml-3 form-control bl2"
                                         placeholder="Enter additional pax" required value="{{old('pax', 0)}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">

                                        <span><i class="fas fa-scroll    "></i> Towel:
                                        </span>
                                        <input type="number" min="0" max="999" name="towel" class="ml-3 form-control bl2"
                                         placeholder="Enter additional towel" required value="{{old('towel', 0)}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 ">

                                        <span><i class="fab fa-firstdraft    "></i></i> Blanket:
                                        </span>
                                        <input type="number" min="0" max="999" name="blanket" class="ml-3 form-control bl2" 
                                        placeholder="Enter additional blanket" required value="{{old('blanket', 0)}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 btn-block mb-3" id="savecustomer">Save Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection