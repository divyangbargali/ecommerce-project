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

    .leftmargin{
        margin-left:20%;
    }

</style>

<br><br><br>

<div class="container">

    <div class="row">

        <div class="col-sm-7 leftmargin">

        @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        @endif

@php 
             
          $shipping_price =   DB::table('shipping_details')->first();

@endphp 


        @if($shipping_price)
           <h1>Shipping Price is already Added Go to Edit Ship Price.</h1>
        @else
        <form method="POST" action="{{url('add/ship/price')}}">
                @csrf
                <label>Shipping Price</label>
                <input type="text" name="shipping_price" class="form-control">
                <br>
                <input type="submit" name="submit" value="submit" class="btn btn-success">
            </form>
        @endif
        
        </div>

    </div>
</div>

@endsection