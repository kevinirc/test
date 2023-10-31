<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LectureSpeakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.dashboard.speak.index',[
            'speak' => DB::table('files')
            ->join('users', 'files.sender', '=', 'users.id')
            ->select('file_type', 'users.name as user_name','files.name as file_name','files.id as file_id')
            ->where('file_type','record')
            ->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dosen.dashboard.speak.view',[
            'speak' => File::find($id)
        ]);
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
