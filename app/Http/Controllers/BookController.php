<?php

namespace App\Http\Controllers;
use App\Models\UserTask;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $UserTask = new usertask();
        $request->validate([
            'task_name'      => 'required',
            'status'         =>  'required',
            'description'    =>  'required',
            'deadline'       =>  'required|date',
        ]);
        $UserTask->task_name = $request['task_name'];
        $UserTask->status = $request['status'];
        $UserTask->description = $request['description'];
        $UserTask->deadline = $request['deadline'];
        $UserTask->save();


        return back()->with('success', 'Data saved successfully');
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
