@extends('layout')
@section('content')
<main class="login-form">
   <div class="cotainer">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Add Customer</div>
               <div class="card-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputfname" class="form-control" required autofocus>
                           <span id="errorfname" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputlname" class="form-control" required autofocus>
                           <span id="errorlname" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputemail" class="form-control" required autofocus>
                           <span id="erroremail" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Age</label>
                        <div class="col-md-6">
                           <input type="number"     id="Inputage" class="form-control" required autofocus>
                           <span id="errorage" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Dob</label>
                        <div class="col-md-6">
                           <input type="date"     id="Inputdob" class="form-control" required autofocus>
                           <span id="errordob" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-6 offset-md-4">
                        <button type="button" id="btnAdd" class="btn btn-primary">
                        Add Customer
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
   
   
   $('#btnAdd').click(function(e) {
       clear();
       var token =   window.localStorage.getItem("auth_token");
      
       e.preventDefault();
   
       $.ajax({
              url: "http://127.0.0.1:83/api/customer/add",
              data: {  first_name:$("#Inputfname").val(),email: $("#Inputemail").val(),
                       last_name:$("#Inputlname").val(),age: $("#Inputage").val(),dob: $("#Inputdob").val()
           
                     },
              type: 'POST' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data);
               window.location.href =  "http://127.0.0.1:83/customer/list";
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                  $("#errorfname").text(err.errors.first_name);
                  $("#errorlname").text(err.errors.last_name);
                  $("#erroremail").text(err.errors.email);
                  $("#errorage").text(err.errors.age);
                  $("#errordob").text(err.errors.dob);
               },
       })
      });
   
   
   });
   function clear() {
       $("#errorpassword").text('');
       $("#errorfname").text('');
      $("#errorlname").text('');
      $("#erroremail").text('');
      $("#errorage").text('');
      $("#errordob").text('');
   }
   
   
   
</script>
