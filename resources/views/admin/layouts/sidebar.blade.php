<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> 
    $(document).ready(function(){

      $("#flip").click(function(){
        $("#panel1").slideToggle("slow");
        $("#panel2").slideToggle("slow");
        $("#panel3").slideToggle("slow");
      });
    
      $("#flip1").click(function(){
        $("#panel4").slideToggle("slow");
        $("#panel5").slideToggle("slow");
        $("#panel6").slideToggle("slow");
      });
    
      $("#flip2").click(function(){
        $("#panel7").slideToggle("slow");
        $("#panel8").slideToggle("slow");
        $("#panel9").slideToggle("slow");
      });
    
      $("#flip3").click(function(){
        $("#panel10").slideToggle("slow");
        $("#panel11").slideToggle("slow");
        $("#panel12").slideToggle("slow");
        $("#panel13").slideToggle("slow");
        $("#panel14").slideToggle("slow");
      
      });

      $("#flip4").click(function(){
        $("#panel15").slideToggle("slow");
        $("#panel16").slideToggle("slow");
      });

      $("#flip5").click(function(){
        $("#panel17").slideToggle("slow");
        $("#panel18").slideToggle("slow");
      });

      $("#flip6").click(function(){
        $("#panel19").slideToggle("slow");
        $("#panel20").slideToggle("slow");
        $("#panel21").slideToggle("slow");
        $("#panel22").slideToggle("slow");

      });
    });
    </script>
    
    
    <style> 
    #panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9,#panel10,#panel11,#panel12,#panel13,#panel14,#panel15,#panel16,#panel17,#panel18,#panel19,#panel20,#panel21,#panel22 {
      display: none;
      text-align:center;
    }
    
    </style>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
              <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Dashboard</a>
            
              <ul class="navbar-nav flex-column mt-4">

<li id="flip" class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 "><i class="fa fa-address-card mr-3" aria-hidden="true" ></i>Category  &nbsp;<i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>
   <span id="panel1"><a href="{{url('/category')}}" class="nav-link text-white p-3 mb-2 ">Category</a></span>
   <span id="panel2"><a href="{{url('/subcategory')}}" class="nav-link text-white p-3 mb-2 ">Sub Category</a></span>
   <span id="panel3"><a href="{{url('/brand')}}" class="nav-link text-white p-3 mb-2 ">Brand</a></span>


  <li class="nav-item" id="flip1"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>Products &nbsp;<i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>
  <span id="panel4"><a href="{{url('/add/product/')}}" class="nav-link text-white p-3 mb-2 ">Add Product</a></span>
<span id="panel5"><a href="{{url('/all/product/')}}" class="nav-link text-white p-3 mb-2 ">All Product</a></span>
  <li class="nav-item" id="flip2"><a href="{{url('/discount/code/')}}" class="nav-link text-white sidebar-link" style="padding-left:6px;"><i class="fas fa-envelope text-light fa-lg mr-3"></i>Coupon Code &nbsp;</a></li>

  <li class="nav-item" id="flip3"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i>Orders &nbsp;<i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>
  <span id="panel10"><a href="{{url('new/order/')}}" class="nav-link text-white p-3 mb-2 ">New Order</a></span>
   <span id="panel11"><a href="{{url('accept/payment/')}}" class="nav-link text-white p-3 mb-2 ">Accept Payment</a></span>
   <span id="panel12"><a href="{{url('cancel/orders/')}}" class="nav-link text-white p-3 mb-2 ">Cancel Order</a></span>
   <span id="panel13"><a href="{{url('process/delivery')}}" class="nav-link text-white p-3 mb-2 ">Process Delivery</a></span>
   <span id="panel14"><a href="{{url('delivery/success')}}" class="nav-link text-white p-3 mb-2 ">Delivery Success</a></span>


   <li class="nav-item" id="flip4"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">Return Order <i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>

<span id="panel15"><a href="{{url('return/request/')}}" class="nav-link text-white p-3 mb-2 ">Return Request</a></span>
   <span id="panel16"><a href="{{url('all/request/')}}" class="nav-link text-white p-3 mb-2 ">All Request</a></span>

    
   <li class="nav-item" id="flip5"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">Shipping Price <i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>

<span id="panel17"><a href="{{url('shipping/price/')}}" class="nav-link text-white p-3 mb-2 ">Add Shipping Price</a></span>
   <span id="panel18"><a href="{{url('edit/shipping/price/')}}" class="nav-link text-white p-3 mb-2 ">Edit Shipping Price</a></span>


   <li class="nav-item" id="flip6"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link">Reports <i class="fa fa-angle-down fa-sm" aria-hidden="true"></i></a></li>

<span id="panel19"><a href="{{url('today/order/')}}" class="nav-link text-white p-3 mb-2 ">Today Order</a></span>
   <span id="panel20"><a href="{{url('today/deliver/')}}" class="nav-link text-white p-3 mb-2 ">Today Delivery</a></span>
   <span id="panel21"><a href="{{url('this/month/')}}" class="nav-link text-white p-3 mb-2 ">This Month</a></span>
   <span id="panel22"><a href="{{url('search/report/')}}" class="nav-link text-white p-3 mb-2 ">Search Report</a></span>


   

</ul>


            </div>
            <!-- end of sidebar -->

            <!-- top-nav -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-items-center">
                <div class="col-md-4">
                  <h4 class="text-light text-uppercase mb-0"></h4>
                </div>
                <div class="col-md-5">
             
                </div>
                <div class="col-md-3">
                  <ul class="navbar-nav">
                   
                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Want to leave?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            Press logout to leave
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>

          <form method="POST" action="{{url('/logout')}}">
            @csrf
            <input type="submit" name="submit" value="logout" class="btn btn-danger" >

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of modal -->

    @yield('admin')

    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   
  </body>
</html>






