<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<a href="{{url('/')}}" class="btn">Return Home</a>
<br><br><br><br>

<div class="container">

        <div class="row">
                <div class="col-sm-6">
                    <h1 style="text-align:center;">Order Status</h1>
                @if($order->status == 0)

                <div class="progress">
                      <div class="progress-bar bg-success" style="width:2%"></div>
                </div><br>
                    
				<p>Pending</p>
				
                @elseif($order->status == 1)

                <div class="progress">
                      <div class="progress-bar bg-success" style="width:30%"></div>
                </div><br>

				<p>Order Accepted</p>

				@elseif($order->status == 2)

                <div class="progress">
                      <div class="progress-bar bg-success" style="width:70%"></div>
                </div><br>

				<p>Order is Delivered from shop</p>

				@elseif($order->status == 3)

                <div class="progress">
                      <div class="progress-bar bg-success" style="width:100%"></div>
                </div><br>

				<p>Delivery is done</p>

				@elseif($order->status == 4)

                <div class="progress">
                     <div class="progress-bar bg-danger" style="width:100%"></div>
                </div><br>
				
                <p>Order is Cancel</p>
				
                @endif

                </div>

                <div class="col-sm-6">
                            <h1 style="text-align:center;">Order Details</h1>
                <div class="container">
                  
                        <ul class="list-group">
                            <li class="list-group-item"><b>Paying Amount : </b>{{$order->paying_amount}}</li>
                            <li class="list-group-item"><b>Shipping : </b>{{$order->shipping}}</li>
                            <li class="list-group-item"><b>Date : </b>{{$order->month}}</li>
                            <li class="list-group-item"><b>Date : </b>{{$order->date}}</li>
                            <li class="list-group-item"><b> Year : </b>{{$order->year}}</li>
                        </ul>

                </div>

                </div>

        </div>
<hr>

        <h1 style="text-align:center;">Product Details</h1>
<hr>
        <table class="table table-bordered">

            <tr>
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Single Price</th>
                <th>Total Price</th>
            </tr>

            @foreach($order_details as $d)
            <tr>
                <td>{{$d->product_name}}</td>
                <td>{{$d->color}}</td>
                <td>{{$d->size}}</td>
                <td>{{$d->quantity}}</td>
                <td>{{$d->single_price}}</td>
                <td>{{$d->total_price}}</td>
            </tr>
            @endforeach
        </table>

</div>

</body>
</html>