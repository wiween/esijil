<?php

namespace App\Http\Controllers\Frontend;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lookup;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('lookups.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SELECT * FROM users WHERE id = 1 LIMIT 1
        $role = Role::findOrFail($id);
        return view('lookups.showrole', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->where('status', 'active')->orderBy('value', 'asc')->get();
        return view('lookups.editrole', compact('role', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findOrFail($id);
        //$role->status = $request->input('status');
        // Untuk upload gambar avatar

        if ($role->save()) {
            return redirect('/lookups/role/')->with('successMessage', 'Role has been successfully edited');
        } else {
            return back()->with('errorMessage', 'Unable to edit role into database. Contact admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if($role->delete()) {
            return back()->with('successMessage', 'The role has been successfully deleted');
        } else {
            return back()->with('errorMessage', 'Unable to delete the role from database');
        }

    }
}
