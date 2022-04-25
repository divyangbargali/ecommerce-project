@extends('admin.layouts.sidebar')

@section('admin')
<br><br><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    table{
        margin-left:9.5%;
    }

    h1{
        text-align:center;
    }
</style>

<div class="container">

            <h1>Shipping Details</h1>
            <table class="table table-bordered">

                <tr>
                    <td>Name:</td>
                    <td>Email:</td>
                    <td>Total:</td>
                    <td>Address:</td>
                    <td>Date:</td>
                </tr>

            
                <tr>
                    <td>{{$today_shipping_details->ship_name}}</td>
                    <td>{{$today_shipping_details->ship_email}}</td>
                    <td>{{$today_shipping_details->paying_amount}}</td>
                    <td>{{$today_shipping_details->ship_address}}</td>
                    <td>{{$today_shipping_details->date}}</td>
                </tr>
            
            </table>
<br><hr><br>

                <h1>Product Details</h1>
            <table class="table table-bordered">

                    <tr>
                        <td>Product Name:</td>
                        <td>Image:</td>
                        <td>Color:</td>
                        <td>Size:</td>
                        <td>Quantity:</td>
                    </tr>


                    <tr>
                        <td>{{$today_order_details->product_name}}</td>
                        <td><img src="{{ asset($today_order_details->image_one) }}" height="60px" width="60px"></td>
                        <td>{{$today_order_details->product_color}}</td>
                        <td>{{$today_order_details->product_size}}</td>
                        <td>{{$today_order_details->product_quantity}}</td>
                    </tr>

            </table>

</div>
@endsection