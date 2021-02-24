<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Work;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache; 

use Inertia\Inertia;

// use Butschster\Head\MetaTags\MetaInterface;
use Butschster\Head\Facades\Meta;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(user $user)
    {
        $user = User::with('works:id,title,slug,status,cover','works.users:id,username,profile_photo_path')->select('id','username','profile_photo_path')->get()->find($user->id);
        Meta::setTitle($user['username']);

        return Inertia::render('User/Show',$user);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function api(User $user)
    {

    $id = $user->id;
    return Cache::remember('user.id-' . $id, 60 * 60 * 24, function () use ($id) { 
        return User::with('works:id,title,slug,status,cover','works.users:id,username,profile_photo_path')->select('id','username','profile_photo_path')->get()->find($id);
    }); 
    }
}
