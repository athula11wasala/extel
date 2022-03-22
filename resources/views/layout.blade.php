<!DOCTYPE html>
<html>
<head>
    <title>Extel</title>
   

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Extel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
          
            <div id="divlogin" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                  
                  
                  </div>

                  <div id="divcustomer-add" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addCustomer') }}">Customer Add</a>
                    </li>

                    
                  </div>
                  <div id="divcustomer-list" >
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('listCustomer') }}">Customer List</a>
                    </li>

                    
                  </div>

                  


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">User Register</a>
                    </li>
              
                  

              
              
         <div id="divlogout" >
                <li style="visibility: hidden;" class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
    </div>
              
            </ul>
  
        </div>
    </div>
</nav>
  
@yield('content')
     
</body>
</html>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  
$( document ).ready(function() {
  
 $('#divlogin').hide();
$('#divlogout').click(function(e) {
    
    var token =  window.localStorage.getItem("auth_token");

    $.ajax({
           url: "http://127.0.0.1:83/api/logout",
           headers: {   Authorization: 'Bearer '+token},
           type: 'POST' ,
           success: function(data) {
            $(location).attr('href', "/")
            },
            error: function(request, status, error) {
              err = JSON.parse(request.responseText);
          
            },
    })
   });

   $("#divcustomer-list").click(function(e){ 

    $(location).attr('href', "customer/list")

   });

   $("#divcustomer-add").click(function(e){

$(location).attr('href', "customer")

});


});

</script>