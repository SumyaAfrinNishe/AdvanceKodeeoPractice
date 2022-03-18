<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Module;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listRole()
    {
        $roles=Role::all();
        return view('admin.pages.Role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole()
    {
         return view('admin.pages.Role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function roleStore(Request $request)
    {
        role::create([
           'name'=>$request->role_name,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRole($role_id)
    {
        $roles=Role::find($role_id)->delete();
     return redirect()->back()->with('success','Role Deleted');
    }

    public function assignForm($role_id)
    {
    $modules=Module::with('permissions')->get();
//    dd($modules);
    return view('admin.pages.Role.assign_permission',compact('modules','role_id'));
    }

    public function assignStore(Request $request)
    {


        foreach ($request->permissions as $permission)
        {
            RolePermission::create([
               'role_id'=>$request->role_id,
               'permission_id'=>$permission,
            ]);
        }
         return redirect()->back();
    }
}
