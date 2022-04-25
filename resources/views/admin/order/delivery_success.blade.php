@extends('admin.layouts.sidebar')


@section('admin')

<style>

.center-message
{

text-align:center;
}

h1{
    text-align:center;
}
 table{
      margin-left:10%; 
 }

 th{
        border:1px solid black;
        border-collapse: collapse;
    }

    td{
        border:1px solid black;
        border-collapse: collapse;

    }


 @media only screen and (max-width: 1000px) {
    table{
        margin-left:12%;
    }

    th{
        border:1px solid black;
    }

    td{
        border:1px solid black;
    }
}
</style>
<br><br><br><br><br>

<div class="center-message">
    
@if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

</div>

    <h1>Products Which are Successfully Delivered</h1>
<br>

<div class="container">
    <table class="table table-striped table-bordered">
        <tr class="table-bordered">
            <th >Paying Amount with Shipping</th>
            <th >Shipping</th>
            <th >Date</th>
            <th >Action</th>
           
        </tr>    
    
      
        @foreach($orders as $row)
        <tr class="table-bordered">
            <td >{{$row->paying_amount}}</td>
            <td >{{$row->shipping}}</td>
            <td >{{$row->date}}</td>
            <td><a href="{{url('/view/order/'.$row->id)}}">View Order</a></td>
        </tr>
        @endforeach
    </table>

</div>

<div style="float:right">
    {{ $orders->links('pagination::bootstrap-4') }}
</div>
   
        
@endsection