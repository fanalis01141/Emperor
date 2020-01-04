@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle fa-2x mr-3" aria-hidden="true"></i>
            <p class="f20px">
                {{session('success')}}
            </p>
        </div>
    @endif
    <div class="text-left">
        <a href="{{route('home')}}" class="btn btn-secondary">Home</a>
    </div>
    <div class="text-center">
        <ul>
            <h1 class="display-3">TRANSFER ROOM</h1>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="card container bg-green">

                <label for="" class="font-weight-bold display-4">Choose a room to transfer:</label>
                <h5 class="font-weight-bold text-white">*Listed below are available rooms only.</h5>
            </div>
            <br>
            @foreach ($rooms as $r)
                <button class="btn btn-success transfer" style="height:70px; width:90px;font-size:30px" onclick="hey('{{$r->room_num}}')">{{$r->room_num}}</button>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="transferid" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form action="{{route('customer.confirmTransfer', $id )}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid text-center">
                        <p class="h3">Are you sure you want to transfer to room : <p id="roomz" class="display-3 font-weight-bolder"></p></p>
                        <input type="text"  name="transfer_room" id="transfer_room">
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
@endsection

<script>
    function hey(room){
        $("#transferid").modal();
        $("#roomz").text(room + '?');
        $("#transfer_room").val(room);
    }

</script>