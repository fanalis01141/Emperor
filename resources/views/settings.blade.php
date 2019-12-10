@extends('layouts.app')

@section('content')
    
    <div class="container-fluid">
        <div class="float-left">
            <a href="{{route('home')}}" class="btn btn-primary button">
                <i class="fa fa-home fa-2x mr-4" aria-hidden="true"></i>Home
            </a>
        </div>

        
        <div class="text-center">
            <h1 class="mon font-weight-bold green" style="font-size:60px">
                <i class="fa fa-cogs green" aria-hidden="true"></i>
                    Settings Panel
            </h1>
        </div>
        
        <hr class="new4">
        @if (session('success'))
        <div class="col-md-4 offset-4">

            <div class="alert alert-success" role="alert">
                <div class="row text-center">
                    <i class="fa fa-check fa-2x ml-3 mt-1" aria-hidden="true"></i>
                    <h5 class="ml-3 mt-2">
                        {{ session('success') }}
                    </h5>
                </div>
            </div>
        </div>
        @endif

        <div class="row">

            {{-- table rooms --}}
            <div class="col-md-5">
                <div class="card text-center shadow-lg">
                    <div class="d-flex justify-content-between">
                        <i class="fas fa-door-open mt-1 ml-3 fa-2x green "></i>
                        <h3 class="green ml-3 mt-1 font-weight-bold ">Rooms:</h3>
                        <button class="btn btn-success float-right button" data-toggle="modal" data-target="#add_room">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Room # & Description</th>
                                <th>Amount / 3 hrs</th>
                                <th>Amount / 12 hrs</th>
                                <th>Amount / 24 hrs</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                
                            <tr>
                                <td scope="row" class="font-weight-bold">
                                    <u>{{$room->room_num}} — {{$room->desc}} </u>
                                </td>
                                <td>{{$room->amount3}}</td>
                                <td>{{$room->amount12}}</td>
                                <td>{{$room->amount24}}</td>


                                <td>
                                    <button class="btn btn-primary" data-number="{{$room->room_num}}" data-desc="{{$room->desc}}" 
                                        data-amount3="{{$room->amount3}}"  data-amount12="{{$room->amount12}}"  data-amount24="{{$room->amount24}}" 
                                       data-id="{{$room->id}}" data-toggle="modal" data-target="#edit_room">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" data-number="{{$room->room_num}}" data-desc="{{$room->desc}}" data-amount="{{$room->amount}}"
                                            data-id="{{$room->id}}" data-toggle="modal" data-target="#delete_room">
                                        <i class="fa fa-trash fa-sm" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- table assistants --}}
            <div class="col-md-3">
                <div class="card text-center shadow-lg">
                    <div class="d-flex justify-content-between">

                        <i class="fa fa-users fa-2x mt-1 ml-3 green" aria-hidden="true"></i>
                        <h3 class="green ml-3 mt-1 font-weight-bold">Assistants:</h3>
                        <button class="btn btn-success float-right"
                        data-toggle="modal" data-target="#add_assist"
                        ><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Assistant Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assists as $assist)
                                
                            <tr>
                                <td scope="row" class="font-weight-bold">
                                    <u>{{$assist->name}}</u>
                                </td>
                                <td>
                                <button class="btn btn-primary" data-target="#edit_assist" data-toggle="modal" data-id="{{$assist->id}}"
                                        data-name="{{$assist->name}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" data-target="#delete_assist" data-toggle="modal" data-id="{{$assist->id}}" data-name="{{$assist->name}}">
                                        <i class="fa fa-trash fa-sm" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            {{-- table room type --}}
            <div class="col-md-4">
                <div class="card text-center shadow-lg">
                    <div class="d-flex justify-content-between">

                        <i class="fas fa-couch fa-2x mt-1 ml-3 green"></i>
                        <h3 class="green ml-3 mt-1 font-weight-bold">Types of Room</h3>
                        <button class="btn btn-success float-right" aria-hidden="true" data-toggle="modal" data-target="#room_type"> 
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Room Type</th>
                                <th>3 Hours</th>
                                <th>12 Hours</th>
                                <th>24 Hours</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>       
                                    <td scope="row" class="font-weight-bold">
                                        <u>{{$type->type}}</u>
                                    </td>
                                    <td>{{$type->amount3}}</td>
                                    <td>{{$type->amount12}}</td>
                                    <td>{{$type->amount24}}</td>

                                    <td>
                                        <button class="btn btn-primary" data-type="{{$type->type}}" data-amount3="{{$type->amount3}}" 
                                            data-amount12="{{$type->amount12}}" data-amount24="{{$type->amount24}}"
                                            data-toggle="modal" data-target="#edit_type" data-id="{{$type->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" data-type="{{$type->type}}" data-amount="{{$type->amount}}" 
                                                data-toggle="modal" data-target="#delete_type" data-id="{{$type->id}}">
                                            <i class="fa fa-trash fa-sm" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>


    
    <!-- Modal add room_type-->
    <div class="modal fade" id="room_type" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Enter details of new room type:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('roomType.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                                <h4>
                                    <label for="type" class="mt-3">Type of room:</label>
                                    <input type="text" name="type" id="" class="form-control" placeholder="Enter type of room." required>
        
                                    <label for="type" class="mt-3">Amount for <strong>3 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount_3" id="" class="form-control" placeholder="Enter amount for 3 hours." required>

                                    <label for="type" class="mt-3">Amount for <strong>12 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount_12" id="" class="form-control" placeholder="Enter amount for 12 hours." required>

                                    <label for="type" class="mt-3">Amount for <strong>24 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount_24" id="" class="form-control" placeholder="Enter amount for 24 hours." required>
                                </h4>
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

    <!-- Modal edit room_type-->
    <div class="modal fade" id="edit_type" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Edit details of room type:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('roomType.editRoomType', '1')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                                <h4>
                                    <input type="text" name="id" id="id" hidden>
                                    <label for="type" class="mt-3">Type of room:</label>
                                    <input type="text" name="type" id="type" class="form-control" placeholder="Enter type of room." required>
        
                                    <label for="type" class="mt-3">Amount for <strong>3 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount3" id="amount3" class="form-control" placeholder="Enter amount for 3 hours." required>

                                    <label for="type" class="mt-3">Amount for <strong>12 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount12" id="amount12" class="form-control" placeholder="Enter amount for 12 hours." required>

                                    <label for="type" class="mt-3">Amount for <strong>24 HOURS</strong></label>
                                    <input type="number" min="1" max="999999" name="amount24" id="amount24" class="form-control" placeholder="Enter amount for 24 hours." required>
                                </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal delete room_type-->
    <div class="modal fade" id="delete_type" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-red text-white">
                        <h5 class="modal-title">Delete Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('roomType.destroy', '1')}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle mr-3 fa-1x" aria-hidden="true"></i>
                                Are you sure you want to delete this room type?
                            </div>
                                <h4>
                                    <input type="text" name="id" id="id" hidden>
                                    <label for="type" class="mt-3">Type of room:</label>
                                    <input type="text" name="type" id="type" class="form-control" placeholder="Enter type of room." readonly>
        
                                </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal add assistant-->
    <div class="modal fade" id="add_assist" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Enter details of assistant:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('assist.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4>
                                <label for="type" class="mt-3">Name of assistant:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter assistant's name." required>
                            </h4>
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
    
    <!-- Modal edit assistant-->
    <div class="modal fade" id="edit_assist" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Edit details of assistant:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form action="{{route('room.editAssist', '1')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4>
                                <input type="text" name="id" id="id" hidden>
                                <label for="type" class="mt-3">Assistant's name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter assistant's name." required>
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal delete assistant-->
    <div class="modal fade" id="delete_assist" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-red text-white">
                        <h5 class="modal-title">Delete Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('assist.destroy', '1')}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-triangle mr-3 fa-1x" aria-hidden="true"></i>
                                Are you sure you want to delete this room assistant?
                            </div>
                            <h4>
                                <input type="text" name="id" id="id" hidden>
                                <label for="type" class="mt-3">Assistant's name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter assistant's name." readonly>
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal add room-->
    <div class="modal fade" id="add_room" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Delete Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('room.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4>
                                <label for="type" class="mt-3">Room #:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter room number." required>
                                <label for="type" class="mt-3">Room Description:</label>
                                <select name="description" id="description" class="form-control" required>
                                    <option value="">— Select Room Description —</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                                <label for="type" class="mt-3">Room Amount for <strong>3 hours</strong></label>
                                <input type="text" name="amount3_ajax" id="amount3_ajax" class="form-control" placeholder="Enter amount for 3 hours." required>
                                <label for="type" class="mt-3">Room Amount for <strong>12 hours</strong></label>
                                <input type="text" name="amount12_ajax" id="amount12_ajax" class="form-control" placeholder="Enter amount for 12 hours." required><label for="type" class="mt-3">Room Amount:</label>
                                <label for="type" class="mt-3">Room Amount for <strong>24 hours</strong></label>
                                <input type="text" name="amount24_ajax" id="amount24_ajax" class="form-control" placeholder="Enter amount for 24 hours." required>
                                
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_room" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Delete Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('room.editRoom', '2')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h4>
                                <input type="text" name="id" id="id" hidden>
                                <label for="type" class="mt-3">Room #:</label>
                                <input type="text" name="number" id="number" class="form-control" placeholder="Enter room number." required>
                                <label for="type" class="mt-3">Old Room Description:</label>
                                <input type="text" name="description_old" id="description_old" class="form-control" placeholder="Enter room number." readonly>
                                <label for="type" class="mt-3">Old Room Amount for <strong>3 hours</strong></label>
                                <input type="text" name="description_old" id="amount3_old" class="form-control" placeholder="Enter room number." readonly>
                                <label for="type" class="mt-3">Old Room Amount for <strong>12 hours</strong>:</label>
                                <input type="text" name="description_old" id="amount12_old" class="form-control" placeholder="Enter room number." readonly>
                                <label for="type" class="mt-3">Old Room Amount for <strong>24 hours</strong>:</label>
                                <input type="text" name="description_old" id="amount24_old" class="form-control" placeholder="Enter room number." readonly>
                                <hr class="new4">
                                <label for="type" class="mt-3">New Room Description:</label>
                                <select name="new_description" id="new_description" class="form-control" required>
                                    <option value="">— Select New Room Description —</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                                <label for="type" class="mt-3">New Room Amount for <strong>3 hours</strong></label>
                                <input type="text" name="new_amount3_ajax" id="new_amount3_ajax" class="form-control" placeholder="Enter amount." required>
                                <label for="type" class="mt-3">New Room Amount for <strong>12 hours</strong></label>
                                <input type="text" name="new_amount12_ajax" id="new_amount12_ajax" class="form-control" placeholder="Enter amount." required>
                                <label for="type" class="mt-3">New Room Amount for <strong>24 hours</strong></label>
                                <input type="text" name="new_amount24_ajax" id="new_amount24_ajax" class="form-control" placeholder="Enter amount." required>
                            </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_room" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Delete Confirmation:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <form action="{{route('room.deleteRoom','1')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-triangle mr-3 fa-1x" aria-hidden="true"></i>
                                    Are you sure you want to delete this room record?
                                </div>
                                <h4>
                                    <div class="card" style="background-color:#d7d7d7">
                                        <input type="text" name="id" id="id" hidden>
                                        <p id="room_num" class="ml-3 mt-3"></p>
                                        <p id="description" class="ml-3 mt-1"></p>
                                        <p id="amount" class="ml-3 mt-1"></p>
                                    </div>

                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection