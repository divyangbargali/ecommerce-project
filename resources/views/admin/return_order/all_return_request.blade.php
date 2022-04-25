

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
            <h1 style="text-align:center;">Return Order Request</h1>
<hr>
<div class="container">

        <table class="table table-bordered">

                <tr>
                    <td>Product Name</td>
                    <td>Color</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>

                @foreach($all_request as $r)
                <tr>
                    <td>{{$r->product_name}}</td>
                    <td>{{$r->color}}</td>
                    <td>{{$r->size}}</td>
                    <td>{{$r->quantity}}</td>
                    <td>{{$r->total_price}}</td>
                    <td>Accepted
                    </td>
                </tr>
                @endforeach
        </table>

       <div style="float:right;"> {{ $all_request->links('pagination::bootstrap-4') }} </div> 
</div>




@endsection