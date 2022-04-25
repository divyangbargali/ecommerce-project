<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<br><br>

<h1 style="text-align:center;">Admin Login Page</h1>


<div class="container">

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
    </ul>
</div>


@endif

        <form method="POST" action="{{url('/admin/login')}}">
        @csrf 

          <div class="form-group">
            <label>Email</label><br>
            <input type="email" id="email" name="email" class="form-control" autocomplete="new-password"><br>
          </div>

          <div class="form-group">
            <label>Password</label><br>
            <input type="password" id="password" name="password" class="form-control" autocomplete="new-password"><br>
          </div>
           
            <input type="submit" name="submit" value="submit" class="btn btn-primary" >
            

        </form>
</div>