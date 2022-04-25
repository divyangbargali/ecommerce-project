
@extends('admin.layouts.sidebar')


@section('admin')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
      a{ 
          text-decoration:none;
      }

      a:hover{
          text-decoration:none;
      }

      .container{
         text-align:center;
         margin-left:12.8%;
      }
  </style>

    <br><br>


<div class="container">
        
                @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

        
    <div class="row">

        <div class="col-md-6">
            <h1>Product Details</h1>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Product Name: {{$data->product_name}} </li>
                <li class="list-group-item">Product Color: {{
                    $data->color}}</li>
                <li class="list-group-item">Product Size: {{$data->size}}</li>
                <li class="list-group-item">Product Quantity : {{$data->quantity}}</li>
                <li class="list-group-item">Total Price: {{
                    $data->total_price}}</li>
                <li class="list-group-item">Purchasing Date: {{$data->date}}</li>
            </ul>
          

        </div>

        <div class="col-md-6">

            <h1>Shipping Details</h1>

           <br>
            <ul class="list-group">
                <li class="list-group-item">Ship Name: {{$data->ship_name}} </li>
                <li class="list-group-item">Ship Email: {{$data->ship_email}}</li>
                <li class="list-group-item">Ship Address: {{$data->ship_address}}</li>
                <li class="list-group-item">Ship City: {{$data->ship_city}}</li>
            </ul>
           
        </div>

    </div>

    <br><br>

    <form method="POST" action="{{url('accept/return/order/')}}">
    @csrf
        <input type="hidden" name="order_id" value="{{$data->order_id}}" >
        <input type="hidden" name="product_id" value="{{$data->product_id}}">
        <input type="submit" name="submit" value="Accept Return Order" class="btn btn-success">

    </form>

    
</div>


@endsection