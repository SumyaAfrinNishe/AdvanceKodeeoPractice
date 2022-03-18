<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
  public function sellerlist (){
      return view('admin.pages.sellers.list');

  }
  public function sellercreate(){
    return view('admin.pages.sellers.form');
  }
  public function sellerstore(Request $request){
    Seller::create([
         
        'image'=>$filename,
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'contact'=>$request->contact,
   
    ]);
    return redirect()->route('seller.list');

  }
}
