<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentSpeakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.dashboard.speak.index',[
            'speak' => DB::table('files')
            ->join('users', 'files.sender', '=', 'users.id')
            ->select('file_type', 'users.name as user_name','files.name as file_name','files.id as file_id')
            ->where('file_type','record')
            ->where('users.name',auth()->user()->name)
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.dashboard.speak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $speak = $request->validate([
            'file' => 'file'
        ]);
        $speak = $request->only('name','script','file','file_type','sender');
        
        if($request->file('file')){
            $speak['file'] =  $request->file('file')->store('audio');
        }

        File::create($speak);

        return redirect('student-speak')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('mahasiswa.dashboard.speak.view',[
            'speak' => File::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('mahasiswa.dashboard.speak.edit',[
            'speak' => File::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $speak = $request->validate([
            'file' => 'file'
        ]);
        $speak = $request->only('name','script','file','file_type');
        
        if($request->file('file')){
            $speak['file'] =  $request->file('file')->store('audio');
        }

        File::where('id', $id)
            ->update($speak);

        return redirect('student-speak')->with('success', 'Data edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        File::destroy($id);
        return redirect('student-speak')->with('success', 'Data deleted');
    }
}
