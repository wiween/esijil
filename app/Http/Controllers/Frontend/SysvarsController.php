<?php

namespace App\Http\Controllers\Frontend;

use App\Sysvars;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SysvarsController extends Controller
{
    public function index()
    {
        $sysVars = Sysvars::get();
        return view('setting.sysvar.home', compact('sysVars'));
    }

    public function show(Sysvars $var)
    {
        return view('setting.sysvar.edit', compact('var'));
    }

    public function update(Request $request, $id)
    {
        $var = Sysvars::findOrFail($id);
        $var->value = $request->input('value');

        if ($var->save()) {
            return redirect('/settings/sysvar')->with('successMessage', 'Role has been successfully edited');
        } else {
            return back()->with('errorMessage', 'Unable to edit role into database. Contact admin');
        }
    }
}
