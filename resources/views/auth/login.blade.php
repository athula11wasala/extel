@extends('layout')
@section('content')
<main class="login-form">
   <div class="cotainer">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Login</div>
               <div class="card-body">
                  <form >
                     <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                           <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                           <input type="password" id="password" class="form-control" name="password" required>
                           <span  id="errordiv" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                           <div class="checkbox">
                              <label>
                              <input type="checkbox" name="remember"> Remember Me
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 offset-md-4">
                        <button id="btnlogin" type="button" class="btn btn-primary">
                        Login
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   
   $( document ).ready(function() {
   
       $('#divlogout').hide();
       $('#divcustomer-add').hide();
       $('#divcustomer-list').hide();
     
   
   $('#btnlogin').click(function(e) {
       localStorage.clear();
        e.preventDefault();
    
       $.ajax({
              url: "http://127.0.0.1:83/api/login",
              data: {   email: $("#email_address").val(),password: $("#password").val()},
              type: 'POST' ,
              success: function(data) {
                  window.localStorage.setItem("auth_token", data.access_token);
                 
                  $(location).attr('href', "customer")
               },
               error: function(request, status, error) {
                 err = JSON.parse(request.responseText);
                  $("#errordiv").text(err.error);
               },
       })
      });
   
   
   });
   
</script>
