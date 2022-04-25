
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<a href="{{url('/')}}" class="btn">Return Home</a>

<p style="text-align:center; font-size:28px;">Profile</p>

<hr>

<div class="container">
	<div class="row">

			<div class="col-sm-7" >

				<table class="table table-bordered">
					<tr>
						<th>Paying Amount</th>
						<th>Shipping</th>
						<th>Status</th>
						<th>Date</th>
						<th>Status Code</th>
						<th>Action</th>
					</tr>

		@php 
			$data = DB::table('orders')->where('user_id',Auth::id())->orderBy('date','DESC')->paginate(5);
		@endphp

		@foreach($data as $d)
					<tr>
						<td>{{$d->paying_amount}} </td>
						<td>{{$d->shipping}}</td>
						<td>
							@if($d->status == 0)
							<p>Pending</p>
							@elseif($d->status == 1)
							<p>Order Accepted</p>
							@elseif($d->status == 2)
							<p>Order is Delivered from shop</p>
							@elseif($d->status == 3)
							<p>Delivery is done</p>
							@elseif($d->status == 4)
							<p>Order is Cancel</p>
							@endif
						</td>
						<td>{{$d->date}}</td>
						<td>{{$d->status_code}}</td>
						<td><a href="{{url('/view/order/status/'.$d->status_code)}}">View</a></td>
					</tr>
		@endforeach
				</table>

				{{ $data->links('pagination::bootstrap-4') }}
			</div>


			<div class="col-sm-5" >

			<ul class="list-group">
				<li class="list-group-item"><b>Username</b> : {{Auth::user()->name}}</li>
				<li class="list-group-item"><b>Email</b> : {{Auth::user()->email}}</li>
				<li class="list-group-item">Change Password</li>
				<li class="list-group-item">Edit Profile</li>
				<li class="list-group-item"><a href="{{url('return/order/')}}">Return Order</a></li>

				<li class="list-group-item">
					<form method="POST" action="{{url('/userlogout')}}">
						@csrf
						<input type="submit" value="logout" name="submit"  class="btn btn-danger btn-block">
					</form>
				</li>
			</ul>

			

			</div>

	</div>

</div>
									
