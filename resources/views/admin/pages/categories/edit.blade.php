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

 
  
      <div class="container">
        <h2>Edit Category </h2>
      <form action="{{route('category.update', $category->id)}}" method='POST' enctype="multipart/form-data">
        @csrf
        
        @if(session()->has ('success'))
        <p class="alert alert-success">
          {{session()->get ('success')}}
        </p>
        @endif
    
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div class="row">
        <div class="col-25">
          <label for="cloth_name">Category Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="cloth_name" name="name" placeholder="Category Name" value="{{$category->name}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25"> 
          <label for="details">Details</label>
        </div>
        <div class="col-75">
          <textarea id="details" name="details" placeholder="Category Details" value="{{$category->details}}"  style="height:200px"></textarea>
        </div>
      </div>
      <div class="form-group">
                <div class="form-group">
                    <label for="cloth_image">Image:</label>
                    <input  type="file" class="form-control" id="image">
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