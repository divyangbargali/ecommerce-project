@extends('admin.layouts.sidebar')

@section('admin')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .center{
        margin:0 auto;
       
    }
</style>

<br><br><br><br>
<div class="container">

    <div class="row">
            
            <div class="col-sm-6 center">
                <label>Search By Date</label>
                
                <form method="POST" action="{{url('search/by/date/')}}">
                    @csrf
                    <input type="date" name="date" class="form-control"><br>
                    <input type="submit" name="submit" value="submit" class="form-control">
                </form>
            </div>

    </div>

<br><br>

    <div class="row">

            <div class="col-sm-6 center">
                    <label>Search By Month</label>
                        
                        <form method="POST" action="{{url('search/by/month/')}}">
                            @csrf
                        <select class="form-control" name="month">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                        </select><br>
                        
                            <input type="submit" name="submit" value="submit" class="form-control">
                        </form>
                </div>
    </div>
</div>

@endsection