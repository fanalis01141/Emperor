@extends('layouts.app')

@section('content')
<div class="container-fluid cfluid" id="cfluid">
    <div class="row">
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px" class="roomT" id="roomT">A1</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed  "></i>
                    <span style="font-size:30px" class="roomT" id="roomT">A2</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px" class="roomT" id="roomT">A3</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg  shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px" class="roomT"id="roomT">A4</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px" class="roomT"id="roomT">A5</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px" class="roomT"id="roomT">A6</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 ">
            <div class="card bg-lblue">
                <div class="card-body text-white cardbg shadow-lg">    
                    <h4 class="card-title">Quarters</h4>
                    <i class="fas fa-hotel text-white fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px "class="roomT"id="roomT">A7</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px"class="roomT"id="roomT">A8</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px"class="roomT"id="roomT">A9</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px"class="roomT"id="roomT">F8</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
        <div class="col-md-1 colmd1">
            <div class="card bg-success text-white cardbg shadow-lg">
                <div class="card-body">
                    <i class="fa-2x fas fa-door-closed    "></i>
                    <span style="font-size:30px"class="roomT"id="roomT">F7</span>
                    <small class="smalltime">Available</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-11">
                <div class="row">
                        <div class="col-lg-2 ml-5">
                            <div class="row mt-2">
                                <a class="btn bg-lblue m-0 shadow btn-block" style="color:#ffbe00" href="{{route('customer.create')}}">
                
                                    <i class="fa fa-user-plus fa-5x mt-3" aria-hidden="true"></i>
                                    <h3 class="mon">New Customer</h3>
                                </a>
                            </div>
                            <div class="row  mt-3">
                                <a class="btn bg-greyzz m-0 shadow btn-block" style="color:#ffbe00" href="{{route('settings.index')}}">
                                    <i class="fa fa-cogs fa-5x mt-3" aria-hidden="true"></i>
                                    <h3 class="mon">Settings</h3>
                                </a>
                            </div>
                            @if (Auth::user()->priority == 'HI')
                                <div class="row  mt-3">
                                    <a class="btn m-0 shadow btn-block pink" style="color:#ffbe00" href="{{route('admin.index')}}">
                                        <i class="fas fa-file-invoice fa-5x mt-3 "></i>
                                        <h3 class="mon">Admin Panel</h3>
                                    </a>
                                </div>
                            @endif
                        </div>
                
                        <div class="col-lg-9 mt-2 ml-5">
                            <table class="table table-bordered table-light table-striped text-center shadow text-light" id="table">
                                <thead class="bg-rain">
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Room Type</th>
                                        <th>Occupant</th>
                                        <th>Check-in hours</th>
                                        <th>Check-out Day & Time</th>
                                        <th>Time Left</th>
                                        <th>Assistant</th>
                                        <th>Actions</th>
                
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
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
                                            </td>
                                            <td>{{$c->assistant}}</td>
                                            <td>
                                                <a href="#" data-target="#extend" class="btn" data-toggle="modal" data-id="{{$c->id}}" data-room={{$c->room}}>
                                                    <i class="fa fa-plus-circle lblue fa-2x" aria-hidden="true" href="#"></i>
                                                </a>
                                                {{-- work here --}}
                                                <a class="checkout btn" href="{{route('customer.transfer', $c->id)}}">
                                                    <i class="fas fa-exchange-alt fa-2x" style="color:blueviolet"></i>
                                                </a>  
                                                {{-- end --}}
                                                <a href="#" class="checkout btn" data-target="#checkout" data-toggle="modal" data-id="{{$c->id}}" data-room={{$c->room}}>
                                                    <i class="fas fa-sign-out-alt red fa-2x     "></i>    
                                                </a>                                        
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                
                        </div>
                
                    </div>
        </div>
        <div class="col-md-1">
            <div class="row mt-3">
                <div class="col-md-12 colmd1 ">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed    "></i>
                            <span style="font-size:30px"class="roomT"id="roomT">F6</span>
                            <small class="smalltime">Available</small>

                        </div>
                    </div>
                </div>     
            </div>
            <div class="row mt-3 ">
                <div class="col-md-12 colmd1">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed    "></i>
                            <span style="font-size:30px"class="roomT"id="roomT">F5</span>
                            <small class="smalltime">Available</small>

                        </div>
                    </div>
                </div>     
            </div>
            <div class="row mt-3 ">
                <div class="col-md-12 colmd1">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed    "></i>
                            <span style="font-size:30px"class="roomT"id="roomT">F4</span>
                            <small class="smalltime">Available</small>
                        </div>
                    </div>
                </div>     
            </div>
            <div class="row mt-3 ">
                <div class="col-md-12 colmd1">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed    "></i>
                            <span style="font-size:30px"class="roomT"id="roomT">F3</span>
                            <small class="smalltime">Available</small>

                        </div>
                    </div>
                </div>     
            </div>
            <div class="row mt-3">
                <div class="col-md-12 colmd1">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed    "></i>
                            <span style="font-size:30px"class="roomT"id="roomT">F2</span>
                            <small class="smalltime">Available</small>

                        </div>
                    </div>
                </div>     
            </div>
            <div class="row mt-3">
                <div class="col-md-12 colmd1">
                    <div class="card bg-success text-white cardbg shadow-lg">
                        <div class="card-body">
                            <i class="fa-2x fas fa-door-closed"></i>
                            <span style="font-size:30px"class="roomT" id="roomT" >F1</span>
                            <small class="smalltime">Available</small>
                        </div>
                    </div>
                </div>     
            </div>

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

<div class="modal fade" id="extend" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header  bg-primary ">
                        <i class="fas fa-user-clock fa-2x text-white" aria-hidden="true"></i>
                        <h5 class="modal-title text-white ml-3">MODIFICATION PANEL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <form action="{{route('customer.edits')}}" method="post">
            @csrf
                
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ml-3 shadow">
                                <div class="card-header">Extend Time</div>
                                <div class="mt-3 ml-3 mr-3 mb-3">
                                    <i class="fas fa-user-clock lblue fa-3x mr-3"></i>
                                    <label for="hours" class="f20px">Hours to extend:</label>
                                    <input type="number" min="0" max="999" class="form-control" name="hours" required placeholder="Enter hours" value="1">
                                    <small>50 pesos per 1 hour</small>
                                    
                                </div>
                            </div>

                            <img src="{{asset('img/door.svg')}}" alt="">
                            <span id="roomspan" style="font-size:80px" class="ml-5"></span>
                            <input type="text" name="room" id="room" hidden>
                            <input type="text" name="id" id="id" hidden>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="card ml-3 shadow">
                                <div class="card-header">
                                    Additionals
                                </div>
                                <div class="row ml-3 mr-3">
                                    <i class="fa fa-bed fa-2x lblue mr-3" aria-hidden="true"></i>                                    
                                    <label for="hours" class="f20px">Foam:</label>
                                    <input type="number" min="0" max="999" class="form-control" required placeholder="Add'l Foam" value="0" name="foam">
                                    <small class="mb-3">* 50 pesos per extra foam</small>
                                </div>

                                <div class="row ml-3 mr-3">
                                
                                    <i class="fa fa-users fa-2x lblue mr-3" aria-hidden="true"></i>
                                    <label for="hours" class="f20px">Pax:</label>
                                    <input type="number" min="0" max="999" class="form-control" required placeholder="Add'l Foam" value="0" name="pax">
                                    <small class="mb-3">* 50 pesos per pax</small>
                                </div>

                                <div class="row ml-3 mr-3">
                                
                                    <i class="fas fa-scroll   fa-2x lblue mr-3 "></i>
                                    <label for="hours" class="f20px">Towel:</label>
                                    <input type="number" min="0" max="999" class="form-control" required placeholder="Add'l Foam" value="0" name="towel">
                                    <small class="mb-3">* 10 pesos per towel</small>
                                </div>

                                <div class="row ml-3 mr-3">
                                    <i class="fab fa-firstdraft fa-2x lblue mr-3"></i>
                                    <label for="hours" class="f20px">Blanket:</label>
                                    <input type="number" min="0" max="999" class="form-control" required placeholder="Add'l Foam" value="0" name="blanket">
                                    <small class="mb-3">* 20 pesos per blanket</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>



<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header  bg-danger ">
                        <i class="fas fa-user-clock fa-2x text-white" aria-hidden="true"></i>
                        <h5 class="modal-title text-white ml-3">CHECKOUT PANEL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            <form action="{{route('customer.checkout')}}" method="post">
            @csrf
                
            <div class="modal-body">
                <div class="container-fluid text-center" style="font-size:40px">
                    <div class="jumbotron p-3">

                        <div class="row d-flex justify-content-center">
    
                            <p class="">Are you sure you want to check-out room: </p>
                            <u>
                                <p id="roomc" class="ml-3" style="font-size:50px"></p>
                            </u>
                            <br>
                        </div>
                        <strong>
                            <p type="text" id="timeleft"><p>
                        </strong>
                    </div>
                    <img src="{{asset('img/happy.svg')}}" alt="">

                    <input type="text" id="room_checkout" hidden name="room_checkout">
                    <input type="text" id="id_checkout" hidden name="id_checkout">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm Checkout</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection


