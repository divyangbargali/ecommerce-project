@extends('admin.layouts.sidebar')

@section('admin')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
 table{
     text-align:center;
 }
</style>


<br><br><br><br>

<div class="container">
    <table class="table table-bordered">

        <tr>
            <td>Paying Amount with Shipping</td>
            <td>Shipping</td>
            <td>Date</td>
            <td>Action</td>
        </tr>

        @foreach($MonthlyOrders as $o)
        <tr>
            <td>{{$o->paying_amount}}</td>
            <td>{{$o->shipping}}</td>
            <td>{{$o->date}}</td>
            <td><a href="{{url('/show/orders/by/month/'.$o->id)}}">View</a></td>
        </tr>
        @endforeach
    </table>

   
</div>

@endsection