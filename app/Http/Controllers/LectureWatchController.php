<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LectureWatchController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.dashboard.watch.index',[
            'watch' => DB::table('files')
            ->join('users', 'files.sender', '=', 'users.id')
            ->select('file_type', 'users.name as user_name','files.name as file_name','files.id as file_id')
            ->where('file_type','video')
            ->where('users.name',auth()->user()->name)
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.dashboard.watch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $watch = $request->validate([
            'file' => 'file'
        ]);
        $watch = $request->only('name','script','file','file_type','sender');
        
        if($request->file('file')){
            $watch['file'] =  $request->file('file')->store();
        }

        File::create($watch);

        return redirect('lecture-watch')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dosen.dashboard.watch.view',[
            'watch' => File::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dosen.dashboard.watch.edit',[
            'watch' => File::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $watch = $request->validate([
            'file' => 'file'
        ]);
        $watch = $request->only('name','script','file','file_type');
        
        if($request->file('file')){
            $watch['file'] =  $request->file('file')->store();
        }

        File::where('id', $id)
            ->update($watch);

        return redirect('lecture-watch')->with('success', 'Data edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        File::destroy($id);
        return redirect('lecture-watch')->with('success', 'Data deleted');
    }
}
