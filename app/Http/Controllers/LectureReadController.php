<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LectureReadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.dashboard.read.index',[
            'read' => DB::table('files')
            ->join('users', 'files.sender', '=', 'users.id')
            ->select('file_type', 'users.name as user_name','files.name as file_name','files.id as file_id')
            ->where('file_type','text')
            ->where('users.name',auth()->user()->name)
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.dashboard.read.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $read = $request->validate([
            'file' => 'file'
        ]);
        $read = $request->only('name','script','file','file_type','sender');
        
        if($request->file('file')){
            $read['file'] =  $request->file('file')->store('audio');
        }

        File::create($read);

        return redirect('lecture-read')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dosen.dashboard.read.view',[
            'read' => File::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dosen.dashboard.read.edit',[
            'read' => File::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $read = $request->validate([
            'file' => 'file'
        ]);
        $read = $request->only('name','script','file','file_type');
        
        if($request->file('file')){
            $read['file'] =  $request->file('file')->store('audio');
        }

        File::where('id', $id)
            ->update($read);

        return redirect('lecture-read')->with('success', 'Data edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        File::destroy($id);
        return redirect('lecture-read')->with('success', 'Data deleted');
    }
}
