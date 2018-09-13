<?php

namespace App\Http\Controllers\Frontend;

use App\AuditTrail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = AuditTrail::orderBy('id', 'desc')->get();
        return view('audit_trail.index', compact('audits'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audit = AuditTrail::findOrFail($id);
        return view('audit_trail.show', compact('audit'));
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
        // get audit punya rekod (1 row) dari database (table Audit)
        // Model AuditTrail, bercakap dengan table audit_trails
        $audit = AuditTrail::findOrFail($id);
        // SELECT * from audit_trails WHERE id = $id

        $audit->note = $request->input('note');
        if($audit->save()) {
            return back()->with('successMessage', 'The trail has been successfully updated');
        } else {
            return back()->with('errorMessage', 'Unable to update the trail from database');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audit = AuditTrail::findOrFail($id);
        if($audit->delete()) {
            return back()->with('successMessage', 'The trail has been successfully deleted');
        } else {
            return back()->with('errorMessage', 'Unable to delete the trail from database');
        }

    }

    public function setFlag($flag, $id)
    {
        $audit = AuditTrail::findOrFail($id);
        $audit->flag = $flag;

        if ($audit->save()) {
            return redirect('audit-trail')->with('successMessage', 'Flag has been set.');
        } else {
            return back()->with('errorMessage', 'Unable to set flag. Contact admin');
        }
    }
}




















