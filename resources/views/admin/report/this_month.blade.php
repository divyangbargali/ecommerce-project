@extends('admin.layouts.sidebar')

@section('admin')

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>

    table{
        margin-left:9.5%;
    }

    h1{
        text-align:center;
    }

</style>

<br><br><br><br>

<div class="container">

            <h1 >Today Order</h1>
        <table class="table table-bordered">

            <tr>
                <td>Paying Amount with Shipping</td>
                <td>Shipping</td>
                <td>Date</td>
                <td>Action</td>
            </tr>


            @foreach($this_month as $td)
            <tr>
                <td>{{$td->paying_amount}}</td>
                <td>{{$td->shipping}}</td>
                <td>{{$td->date}}</td>
                <td><a href="{{url('/monthly/order/details/'.$td->id)}}">View</a></td>
            </tr>
            @endforeach

        </table>
            
          <div style="float:right"> {{ $this_month->links('pagination::bootstrap-4') }} </div>    
</div>

@endsection