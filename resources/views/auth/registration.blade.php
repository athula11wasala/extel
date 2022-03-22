@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
  
                      <form >
                      
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                             
                                  <span id="errorname" class="text-danger"></span>
                               
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                               
                                  <span id="erroremail" class="text-danger"></span>
                            
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                            
                                      <span id="errorpassword" class="text-danger"></span>
                  
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
                              <button type="button" id="btnlogin" class="btn btn-primary">
                                  Register
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


$('#btnlogin').click(function(e) {
   
    e.preventDefault();
clear();
    $.ajax({
           url: "http://127.0.0.1:83/api/register",
           data: {  name:$("#name").val(),email: $("#email_address").val(),password: $("#password").val()},
           type: 'POST' ,
           success: function(data) {
            
               $(location).attr('href', "http://127.0.0.1:83/")
            },
            error: function(request, status, error) {
              err = JSON.parse(request.responseText);
               $("#errorpassword").text(err.errors.password);
               $("#errorname").text(err.errors.name);
               $("#erroremail").text(err.errors.email);
            },
    })
   });


});



function clear() {
    $("#errorpassword").text('');
        $("#errorname").text('');
        $("#erroremail").text('');
}
</script>



