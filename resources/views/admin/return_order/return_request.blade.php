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

    @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
    @endif
    
        <table class="table table-bordered">

                <tr>
                    <td>Product Name</td>
                    <td>Color</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>

                @foreach($return_request as $r)
                <tr>
                    <td>{{$r->product_name}}</td>
                    <td>{{$r->color}}</td>
                    <td>{{$r->size}}</td>
                    <td>{{$r->quantity}}</td>
                    <td>{{$r->total_price}}</td>
                    <td>
                   
                
                  <form method="POST" action="{{url('view/return/order/')}}">

                    @csrf
                      <input type="hidden" name="order_id" value="{{$r->order_id}}">
                      <input type="hidden" name="product_id" value="{{$r->product_id}}">
                      <input type="submit" name="submit" value="View" class="btn btn-primary">

                  </form>

            
                    </td>
                </tr>
                @endforeach
        </table>

        <div style="float:right;"> {{ $return_request->links('pagination::bootstrap-4') }} </div> 
</div>






@endsection