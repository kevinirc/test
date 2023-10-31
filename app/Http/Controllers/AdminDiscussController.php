<?php

namespace App\Http\Controllers;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDiscussController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.discussion.index',[
            'discuss' => DB::table('discussions')
            ->join('users', 'discussions.maker', '=', 'users.id')
            ->select('title','content','users.name as user_name','discussions.id as discussion_id')
            ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $discuss = $request->only('content','maker');

        Discussion::create($discuss);

        return redirect('discuss')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discuss = DB::table('discussions')
            ->join('users', 'discussions.maker', '=', 'users.id')
            ->select('title','content','users.name as user_name','discussions.id as discussion_id')
            ->where('discussions.id',$id)
            ->get();

        return view('dashboard.discussion.view', compact('discuss'));
        
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
