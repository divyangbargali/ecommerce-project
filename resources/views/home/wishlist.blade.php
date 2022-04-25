@extends('home.layouts.product_layout')

@section('show_product')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .table{
        text-align:center;
    }
    
    th,td {
        font-size:16px;
    }

    .btn{
        font-size:14px;
    }
</style>

<br>
<div class="container">
    <table class="table">

            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Action</th>
            </tr>

            @foreach($wishlist as $w)
            <tr>
                <td><img src="{{ asset($w->image_one) }}" height="60px" width="60px"></td>
                <td>{{$w->product_name}}</td>
                <td>{{$w->product_color}}</td>
                <td>{{$w->product_size}}</td>
                <td>
                    <form method="POST" action="{{url('/wishlist/insert/cart/'.$w->product_id)}}">
                        @csrf 

                        <input type="hidden" name="product_quantity" value="1">
                        <input type="hidden" name="product_color" value="{{$w->product_color}}">
                        <input type="hidden" name="product_size" value="{{$w->product_size}}">
                        
                        <input type="submit" name="submit" value="Add to Cart" class="btn btn-success">
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</div>









@endsection