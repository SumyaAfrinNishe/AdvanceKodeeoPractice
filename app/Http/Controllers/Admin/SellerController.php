<?php

namespace App\Http\Controllers\Admin;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DataTables;


class SellerController extends Controller
{
  public function sellerlist ()
  {
     $seller=Seller::paginate(10);
      return view('admin.pages.sellers.list',compact('seller'));

  }

  public function sellercreate(){
    return view('admin.pages.sellers.form');
  }

  public function index(Request $request)
  {
      if ($request->ajax()) {
          $data = Seller::latest()->get();
          return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){
                  $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                  return $actionBtn;
              })
              ->rawColumns(['action'])
              ->make(true);
      }
  }

  public function sellerstore(Request $request){
    Seller::create([
   
        'name'=>$request->seller_name,
        'details'=>$request->seller_details,
   
    ]);
    return redirect()->route('seller.list');

  }
}
