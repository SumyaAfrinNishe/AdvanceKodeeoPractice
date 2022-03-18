@extends('admin.master')
@section('content')
<style>
	body{
	 
	   background: linear-gradient(to left, #ccccff 45%, #ccffff 95%);
   
	}
	 #customers {
	   font-family: Arial, Helvetica, sans-serif;
	   border-collapse: collapse;
	   width: 100%;
	 }
	 .heading h2{
	   text-align: center;
	 }
	 #customers td, #customers th {
	   border: 1px solid #ddd;
	   padding: 8px;
	 }
	 
	 #customers tr:nth-child(even){background-color: #ccccff;}
	 
	 #customers tr:hover {background-color: #ddd;}
	 
	
	 #customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #001313;
		color: white;
	  }
	 </style>

     <div class="heading">
		<h2>Sellers List</h2>
	  </div>
	  
	  <br>
	  {{-- <a class="btn btn-primary" href="{{route('admin.user.create')}}" role="button">Add</a> --}}
	  <table id="customers">
		<tr>
		  <th>ID</th>
		  <th>Image</th>
		  <th>Name</th>
		  <th>Email</th>
		  <th>Address</th>
		  <th>Contact</th>
		  <th>Action</th>
	  
		</tr>
	
		  <td>abcd</td>
		  <td>abcd</td>
		  <td>abcd</td>
		  <td>abcd</td>
		  <td>abcd</td>
		  <td>abcd</td>
		  <td>abcd</td>
	
	  </table>

	  <br>
	  <a href="{{route('seller.create')}}" class="btn btn-primary">Add New Seller</a>
@endsection