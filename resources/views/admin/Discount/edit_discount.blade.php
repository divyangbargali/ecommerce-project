


@extends('admin.layouts.sidebar')


@section('admin')

<style>
    input[type=text]{
       width:90%;
       
    }
    input{
      margin:auto;
    }

     .mrleft{
      margin-left:15%;
    } 

    @media only screen and (max-width: 600px) {
  .mrleft{
      margin-left:0.1%;
    } }
</style>


<div class="container text-center mrleft" >
    <br><br>
    <h1 class="text-center">Coupon Code</h1>


    
    @if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif


    @if(session('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

   
  
  <br>
            <form method="post" action="{{url('/coupon/update/'.$coupon->id)}}">
                @csrf
                <div class="container">
                   

                            <label>Coupon Code</label><br>
                            <input type="text" name="coupon_code" value="{{$coupon->coupon_code}}" class="form-control"><br><br>

                            <label>Coupon Percentage</label><br>
                            <input type="text" name="coupon_percentage" value="{{$coupon->coupon_percentage}}" class="form-control"><br>

                            <input type="submit" name="submit" value="update" class="btn btn-success" >
                  
                </div>
            </form>
  
  <br>
<div style="float:right;"> </div>  
 

</div>




 



@endsection


