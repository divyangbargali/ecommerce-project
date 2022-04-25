

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    a{
        text-decoration:none;
        text-style:none;
    }

    h1{
        text-align:center;
    }
</style>

        <br>
        <h1 >Return Order</h1>
        <hr>
        <br>

       

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
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>

            @foreach($return_products as $r)

            <tr>
                <td>{{$r->product_name}}</td>
                <td>{{$r->color}}</td>
                <td>{{$r->size}}</td>
                <td>{{$r->quantity}}</td>
                <td>{{$r->total_price}}</td>
                <td>
                    <form method="POST" action="{{url('/order/return/request/')}}">
                        @csrf
                       <input type="hidden" name="product_id" value="{{$r->product_id}}">
                       <input type="hidden" name="order_details_id" value="{{$r->id}}">

                       @if($r->return_order == 0)
                       <input type="submit" name="return_order" value="Return Order" class="btn btn-primary">
                       @elseif($r->return_order == 1)
                       <input type="submit" name="return_order" value="Return Request is Pending" class="btn btn-danger" disabled>
                       @elseif($r->return_order == 2)
                       <input type="submit" name="return_order" value="Return Request Accepted" class="btn btn-primary" disabled>
                       @endif
                    </form>
                </td>
            </tr>

            @endforeach
    </table>
</div>