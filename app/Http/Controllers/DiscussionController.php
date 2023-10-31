<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;

class DiscussionController extends Controller
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
        return view('dashboard.Discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscussionRequest $request)
    {
        ddd($request);
        $discuss = $request->only('title','content','maker');

        Discussion::create($discuss);

        return redirect('discuss')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        return view('dashboard.Discussion.view',[
            'discuss' => Discussion::find($discussion)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        return view('dashboard.Discussion.edit',[
            'discuss' => Discussion::find($discussion)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscussionRequest $request, Discussion $discussion)
    {
        $Discussion = $request->validate([
            'discuss' => 'Discussion'
        ]);
        $Discussion = $request->only('name','script','Discussion','Discussion_type');
        
        if($request->Discussion('Discussion')){
            $Discussion['Discussion'] =  $request->Discussion('Discussion')->store('audio');
        }

        Discussion::where('id', $discussion)
            ->update($Discussion);

        return redirect('discuss')->with('success', 'Data edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $discussion)
    {
        Discussion::destroy($discussion);
        return redirect('discuss')->with('success', 'Data deleted');
    }
}
