@extends('admin.master')
@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #428bca;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #1830b9;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding:20px;
}

.col-25 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top:6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
/* For choose file */
*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  margin: 0;
  padding: 2rem 1.5rem;
  color: #5a5a5a;
}
</style>
</head>
<body>
<div class="container">
    <h2>Add Sellers </h2>
  <form action="" method='POST' enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="form-group">
            <label for="image">Image:</label>
            <input required type="file" class="form-control" id="image">
        </div>
     </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_name">Seller Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="seller_name" name="seller_name" placeholder=" Enter Seller Name">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="email">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" placeholder="Enter Seller Email">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="address">Address</label>
    </div>
    <div class="col-75">
      <input type="text" id="address" name="address" placeholder="Enter Seller Address">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="contact">Contact</label>
    </div>
    <div class="col-75">
      <input type="text" id="contact" name="contact" placeholder="Enter Seller Contact">
    </div>
  </div>
  

  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>

</body>
</html>
@endsection