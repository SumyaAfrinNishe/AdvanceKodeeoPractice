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
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
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

<h2>Edit Cloth Details</h2>

<div class="container">
  <form action="{{route('cloth.update',$cloth->id)}}" method='POST' enctype="multipart/form-data">
  @method('PUT')
    @csrf
  <div class="row">
    <div class="col-25">
      <label for="cloth_name">Cloth Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="cloth_name" value="{{$cloth->cloth_name}}" name="cloth_name" placeholder="Cloth Name">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_code">Code</label>
    </div>
    <div class="col-75">
      <input type="text" id="cloth_code" value="{{$cloth->cloth_code}}" name="cloth_code" placeholder="Code">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_type">Type</label>
    </div>
    <div class="col-75">
    <input type="text" id="cloth_type" value="{{$cloth->cloth_type}}" name="cloth_type" placeholder="Type">
      <!-- <select id="cloth_type" name="cloth_type">
        <option value="australia">Australia</option>
        <option value="canada">Canada</option>
        <option value="usa">USA</option>
      </select> -->
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_color">Color</label>
    </div>
    <div class="col-75">
      <input type="text" id="cloth_color" value="{{$cloth->cloth_color}}" name="cloth_color" placeholder="Color">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_size">Size</label>
    </div>
    <div class="col-75">
       <select id="cloth_size" value="{{$cloth->cloth_size}}" name="cloth_size">
        <option value="S">Small</option>
        <option value="M">Medium</option>
        <option value="L">Large</option>
        <option value="XL">Extra Large</option>
        <option value="XXL">Double Extra Large</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="cloth_price">Price</label>
    </div>
    <div class="col-75">
      <input type="number" id="cloth_price" value="{{$cloth->cloth_price}}" name="cloth_price" placeholder="Price">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="details">Details</label>
    </div>
    <div class="col-75">
      <textarea id="details" value="{{$cloth->details}}" name="details" placeholder="Cloth Details" style="height:200px"></textarea>
    </div>
  </div>
  <div class="form-group">
            <div class="form-group">
                <label for="cloth_image">Image:</label>
                <input required type="file" value="{{$cloth->cloth_image}}" class="form-control" id="cloth_image">
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
