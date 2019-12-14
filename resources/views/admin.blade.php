@extends('layouts.app')

@section('content')
    <div class="container-fluid text-center">
        <div class="text-left">
            <div class="text-left">
                <a href="{{route('home')}}" class="btn btn-outline-secondary text-dark">Home</a>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm text-center">
                @foreach ($errors->all() as $error)
                    <i class="fa fa-exclamation-circle fa-2x mr-3" aria-hidden="true"></i>
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fa fa-check-circle fa-2x mr-3" aria-hidden="true"></i>
                <p class="f20px">
                    {{session('success')}}
                </p>
            </div>
        @endif
        {{-- <img src="{{asset('img/office.svg')}}" alt="" style="z-index:"> --}}
            <p class="display-3">Admin Panel</p>
            <p style="font-size:30px">Today is {{now()->format("F d, Y")}}</p>
        <div class="row">

    
            <div class="col-md-6">
                <form action="{{route('admin.saveGross')}}" method="POST">

                <div class="text-center">

                    <label for="date" class="f20px">Select Date:</label>
                    <input type="date" name="date_search" id="date_search" class="inputzzz" value="{{date('Y-m-d')}}"> 
                    <button onclick="search()" class="btn btn-primary" id="searchdate">Search</button>
                

                    <hr>
                    <table class="table table-striped table-bordered text-center table-light">
                        <thead class="thead-dark">
                            <tr>
                                <th>Room</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="bodysearch">

                        </tbody>
                    </table>

                        @csrf
                        <div class="card text-center" id="calculator" style="display:none">
                            <div class="card-header">Calculate Net Income:</div>
                            <div class="row">
                                <div class="col-md-5">
        
                                    <label for="totalamt" style="font-size:35px">Gross income: </label>
                                </div>
        
                                <div class="col-md-5 text-left">
    
                                    <u>
                                        <span id="totalamt" style="font-size:35px"></span>
                                        <input type="text" name="total" id="total" hidden>
                                    </u>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-5">
        
                                    <label for="totalamt" style="font-size:35px">Deductions: </label>
                                </div>
        
                                <div class="col-md-5 text-left mt-2">
                                    <input type="number" min="0" max="9999999" id="amt_ded" name="amt_ded" class="form-control" onchange="calculate()" value="0">
                                    <small class="mt-1">* Please press 'ENTER' key to calculate for NET INCOME.</small>
                                </div>
                            </div>
                            <label for="net_inc" style="font-size:35px">Total Net Income: </label>
                            <input type="text" name="net" id="net" value="0" hidden>
                            <p id="net_inc" style="font-size:35px"></p>

                            <button type="submit" class="btn btn-primary">Save Record</button>
    
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form action="">
                    <label for="date" class="f20px">Here are your list of incomes</label>
                    {{-- <input type="date" name="date_search" id="date_search" class="inputzzz" value="{{date('Y-m-d')}}">  --}}
                    {{-- <button onclick="search()" class="btn btn-primary" id="searchdate">Search</button> --}}

                    <hr>
                    <table class="table table-striped table-bordered text-center table-light">
                        <thead class="thead-dark">
                            <tr>
                                <th>Gross</th>
                                <th>Deduction</th>
                                <th>Net</th>
                                <th>Date of Record</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($income as $i)
                                <tr>
                                    <td>{{$i->gross}}</td>
                                    <td>{{$i->deductions}}</td>
                                    <td>{{$i->net}}</td>
                                    <td>{{
                                        date('F d, Y', strtotime($i->date))
                                        }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </form>
            </div>

        </div>
    </div>

    <a href="#" class="float" data-toggle="modal" data-target="#new_emp">
        <i class="fa fa-user-plus fa-3x mt-3" aria-hidden="true"></i>
    </a>

    <div class="modal fade" id="new_emp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-primary">
                            <h5 class="modal-title">New Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <form action="{{route('admin.store')}}" method="POST">
                    <div class="modal-body">
                        @csrf

                        <div class="container-fluid text-center">
                            <p style="font-size:35px">Enter details of new user</p>
                            <small style="color:red">*You are adding users that cannot access the admin panel</small>
                            <hr class="new4">
                            
                            <label for="">Enter name of employee:</label>
                            <br>
                            <input type="text" placeholder="User's name" required name="name"  class="form-control">
                            
                            <br>
                            <br>
                            <label for="">Enter email of employee:</label><br>
                            <input type="email" placeholder="User's email" required name="email"  class="form-control">
                            
                            <br>
                            <br>
                            <label for="">Enter password of employee:</label><br>
                            <input type="password" placeholder="User's password" required name="password" class="form-control" min="3">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save New User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
function search(){
    event.preventDefault()
    var div = document.getElementById('calculator');
    var date = $("#date_search").val();
    $("#bodysearch").html("");
    var total = 0;
    
    $.get('/search?date=' + date, function(data){
        for(var i = 0; i < data.length; i++) {
            var obj = data[i];
            total = total + obj.total;
    
            $("#bodysearch").append(
                '<tr> <th>' + obj.room + '</th> <th>' + obj.name + '</th> <th>' + obj.total + '</th> </tr>'
            )
        }
        console.log(total);
        
        div.style.display = 'block';
        $("#totalamt").text(total)
        $("#total").val(total);
    });

}


function calculate(){
    var total = $("#totalamt").text();
    var deduction = $("#amt_ded").val();

    var net = total - deduction;
    console.log(net);
    $("#net_inc").text(net)
    $("#net").val(net)

}
</script>