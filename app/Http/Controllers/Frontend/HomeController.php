<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Frontend\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        // $id=Auth::user()->id;
        // $profileData = User::find($id);
        // $listTokens = ApiToken::latest()->paginate(5);

        $eventData = DB::table('events')->get();
        $roles = DB::table('roles')->lists('title', 'name');
        // $eventData = Event::all();
        return view('frontend.home', with(compact('eventData')));
        // return view('frontend.home');
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
    public function show(Home $homes)
    {
        // $eventData = DB::table('events')->get();
        //
        // return $homes;
        // return view('frontend.home',compact('events'));
        // $id=Auth::user()->id;
        // $eventData = Event::all();
        // $listTokens = ApiToken::latest()->paginate(5);
        // return view('admin.index', compact('listTokens'));

        // return view('admin.index',compact('profileData'));
        // return view('admin.index',compact(['profileData','listTokens' => $listTokens]));
        // return view('frontend.home', [
        //     'eventData'=>$eventData,
        // ]);

        // return view('frontend.home', with(compact('eventData')));
        return view('frontend.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $homes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $homes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $homes)
    {
        //
    }
}
