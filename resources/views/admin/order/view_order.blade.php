@extends('admin.layouts.sidebar')


@section('admin')
<style>

#container{
    text-align:center;
}

#container .btn a{
    color:white;
    text-decoration:none;
}

h1{
    text-align:center;
}

.shorten{
    width:900px;
    margin-left:20%;
}

.table{
     /* margin-left:25%; */
    
     width:960px;
     margin-left:20%;
 }

 @media only screen and (max-width: 1000px) {
    table{
        margin-left:12%;
    }

 
}

</style>

<br><br><br><br>
    <div class="row shorten">
        <div class="col-sm-6">
        <h1>Order Details</h1>

@foreach($order as $row1)
<ul class="list-group">
  <li class="list-group-item">Paying amount with Shipping Charge : <b>{{$row1->paying_amount}}</b></li>
  <li class="list-group-item">Month : <b>{{$row1->month}}</b></li>
  <li class="list-group-item">Date : <b>{{$row1->date}}</b></li>
</ul>
@endforeach

        </div>

        <div class="col-sm-6">
        <h1>Shipping Details</h1>

@foreach($shipping_details as $row2)
<ul class="list-group">
  <li class="list-group-item">Ship Name : <b>{{$row2->ship_name}}</b></li>
  <li class="list-group-item">Ship Email: <b>{{$row2->ship_email}}</b></li>
  <li class="list-group-item">Ship Address : <b>{{$row2->ship_address}}</b></li>
  <li class="list-group-item">Ship City : <b>{{$row2->ship_city}}</b></li>
</ul>
@endforeach

        </div>
    </div>


<br><br><br>
 <h1>Product Details</h1>


<table class="table table-striped table-bordered table-hover">

    <tr class="table-bordered">
        <td>Product Id</td>
        <td>Product Name</td>
        <td>Image</td>
        <td>Color</td>
        <td>Size</td>
        <td>Quantity</td>
       
    </tr>


@foreach($order_details as $row3)

    <tr class="table-bordered">
        <td>{{$row3->product_id}}</td>
        <td>{{$row3->product_name}}</td>
        <td></td>
        <td>{{$row3->color}}</td>
        <td>{{$row3->size}}</td>
        <td>{{$row3->quantity}}</td>
       
    </tr>
    

@endforeach

</table>

<br>


@if($row1->status == 0)

<div id="container">
<button class="btn btn-success"><a href="{{url('/accept/order/'.$row1->id)}}">Accept Order</a></button>
<button class="btn btn-danger"><a href="{{url('/cancel/order/'.$row1->id)}}">Cancel Order</a></button>
</div>

@elseif($row1->status == 1)

<div id="container">
<button class="btn btn-success"><a href="{{url('/process/delivery/'.$row1->id)}}">Process Delivery</a></button>
</div>

@elseif($row1->status == 2)
<div id="container">
<button class="btn btn-success"><a href="{{url('/delivery/done/'.$row1->id)}}"> Delivery Done</a></button>
</div>

@elseif($row1->status == 3)
<div id="container">
This Product is successfully delivered.
</div>

@elseif($row1->status == 4)
<div id="container">
This Order is not Valid
</div>

@endif

<br><br>
@endsection

