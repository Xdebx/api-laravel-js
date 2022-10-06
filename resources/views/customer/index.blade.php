<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer CRUD</title>
    <link rel="shortcut icon" type="image/x-icon" href="/user.png">
    <!-- CSS only -->
    <!-- https://getbootstrap.com/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- https://getbootstrap.com/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Jquery Library -->
    <!-- https://cdnjs.com/libraries/jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- FONT ICONS only --> {{-- https://fontawesome.com/icons/user-pen?s=solid&f=classic --}}
    <!-- FONT LIBRARY --> {{-- https://cdnjs.com/libraries/font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add</button>
  
   {{-- <a href="{{Auth::logout()}}">Logout</a> --}}
 <div id="ctable" class="table-responsive">
 <table class="table table-striped table-hover">
     <thead>
       <tr>
         <th>Customer ID</th>
         <th>Title</th>
         <th>Lname</th>
         <th>Fname</th>
         <th>Address</th>
         <th>Phone</th>
         <th>Edit</th>
         <th>Delete</th>
         <th>Restore</th>
         </tr>
     </thead>
     <tbody id="cbody">
      </tbody>
   </table>
 </div>
 </div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="cform" method="post" action="#" >
                <input type="hidden">
                <div class="form-group">
                    <label for="title" class="control-label">Title</label>
                    <input type="text" class="form-control" id="titulo" name="title"  >
                </div>
                
                <div class="form-group">
                    <label for="lname" class="control-label">last name</label>
                    <input type="text" class="form-control " id="lname" name="lname" >
                </div>
                
                <div class="form-group">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" class="form-control " id="fname" name="fname" >
                </div>
                
                <div class="form-group"> 
                    <label for="address" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address" name="addressline" >
                </div>
                
                <div class="form-group"> 
                    <label for="town" class="control-label">Town</label>
                    <input type="text" class="form-control" id="town" name="town" >
                </div>
                
                <div class="form-group">
                    <label for="zipcode" class="control-label">Zip code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" >
                </div>
                
                <div class="form-group">
                    <label for="phone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" >
                </div>

                <div class="form-group">
                    <label for="creditlimit" class="control-label">creditlimit</label>
                    <input type="text" class="form-control" id="creditlimit" name="creditlimit" >
                </div>

                <div class="form-group">
                    <label for="level" class="control-label">level</label>
                    <input type="text" class="form-control" id="level" name="level" >
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="myFormSubmit" type="submit" class="btn btn-primary">Save</button>
        </div>

      </div>
    </div>
  </div>

 <script src="js/custom.js"></script>
</body>
</html>