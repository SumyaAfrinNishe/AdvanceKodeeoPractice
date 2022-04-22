<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Cache;

class ClothController extends Controller
{
    public function clothlist()
    {
        // throw new \Exception("Hello Nishe");
        Log::channel('custom')->info("Hello Nishe");
         $clothlists=Cloth::all();
        return view('admin.pages.Cloth.cloth-list',compact('clothlists'));
    }


    public function addCloth()
    {
        return view('admin.pages.Cloth.cloth-form');
    }
    public function clothCreate(Request $request)
    {
        $filename='';
      if($request->hasfile('cloth_image'))
      {
          $file=$request->file('cloth_image');
          $filename=date('hs').'.'.$file->getclientOriginalExtension();
          $file->storeAs('/uploads',$filename);

      }

      Cloth::create([
            
        'cloth_name'=>$request->cloth_name,
        'cloth_code'=>$request->cloth_code,
        'cloth_type'=>$request->cloth_type,
        'cloth_color'=>$request->cloth_color,
        'cloth_size'=>$request->cloth_size,
        'details'=>$request->details,
        'cloth_price'=>$request->cloth_price,
        'cloth_image'=>$filename,
     ]);
     Toastr::success('Cloth added successfully','success');
     return redirect()->route('cloth.list');
}
public function viewCloth($cloth_id)
 {
     $cloth=Cloth::find($cloth_id);
    
    return view('admin.pages.Cloth.cloth-view',compact('cloth'));
 }
 public function editCloth($cloth_id)
 {
     $cloth=Cloth::find($cloth_id);
    
    return view('admin.pages.Cloth.cloth-edit',compact('cloth'));
 }
 public function updateCloth(Request $request,$cloth_id)
 {
     $cloth=Cloth::find($cloth_id);
     $filename=$cloth->cloth_image;
      if($request->hasfile('cloth_image'))
      {
          $file=$request->file('cloth_image');
          $filename=date('Ymdhms').'.'.$file->getclientOriginalExtension();
          $file->storeAs('/uploads',$filename);

      }
      if($cloth)
     {
      $cloth->update([
            
        'cloth_image'=>$filename,
        'cloth_name'=>$request->cloth_name,
        'cloth_code'=>$request->cloth_code,
        'cloth_type'=>$request->cloth_type,
        'cloth_color'=>$request->cloth_color,
        'cloth_size'=>$request->cloth_size,
        'details'=>$request->details,
        'cloth_price'=>$request->cloth_price,
     ]);
     return redirect()->back()->with('success', 'Cloth Information Updated Successfully.');
    }

 }
 public function deleteCloth($cloth_id)
 {
     $cloth=Cloth::find($cloth_id)->delete();
     return redirect()->back()->with('success','Cloth Deleted');
    // dd("$cloth_id");
   
 }
 
}