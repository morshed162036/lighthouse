<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AdmissionQuery;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admission_queries = AdmissionQuery::all();
        return view('backend.admission_query.index', compact('admission_queries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $admission_queries = new AdmissionQuery();
        $admission_queries->grade_id = $request['grade_id'];
        $admission_queries->parent_name = $request['parent_name'];
        $admission_queries->student_name = $request['student_name'];
        $admission_queries->student_birth = $request['student_birth'];
        $admission_queries->phone_number = $request['phone_number'];
        $admission_queries->email = $request['email'];
        $admission_queries->help_query = $request['help_query'];

        $admission_queries->save();
        // return redirect()->back()->with('success', 'Admission query submitted successfully!');
        return redirect()->route('home.index')->with('success', 'Admission query submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
