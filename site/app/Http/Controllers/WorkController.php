<?php

namespace App\Http\Controllers;


use App\Models\Work;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache; 

use Inertia\Inertia;

// use Butschster\Head\MetaTags\MetaInterface;
use Butschster\Head\Facades\Meta;



class WorkController extends Controller
{

    // protected $meta;

    // public function __contruct(MetaInterface $meta)
    // {
    //     $this->meta = $meta;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Meta::setTitle('Work/Index');
        Meta::setDescription('Awesome page');
        Meta::addMeta('twitter:card', [
            'content' => 'butschster',
        ]);
        return Inertia::render('Work/Index');
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
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(work $work)
    {


        $work = Work::find($work->id);
        // dd( $work);
        $users = $work->users;
        // dd( $users);

        $work = Work::with('users')->get()->find($work->id);

        Meta::setTitleSeparator(' | ')
            ->setTitle(config('app.name'))
            ->prependTitle($work['title']);
        Meta::setDescription($work['description']);
        Meta::addMeta('og:site_name', ['content' => config('app.name')]);
        Meta::addMeta('og:title', ['content' => $work['title']]);
        Meta::addMeta('og:description', ['content' => $work['description']]);
        Meta::addMeta('og:type', ['content' => 'article']);
        Meta::addMeta('og:image', ['content' => $work['profile_photo_path']]);


        return Inertia::render('Work/Show',$work);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(work $work)
    {
        //
    }

    public function api()
    {

    //    $currentPage = request()->get('page',1);
        // return Work::with('users')->paginate(21); 
       $currentPage = request()->get('page',1);
        return Cache::remember('works.all-' . $currentPage, 60 * 60 * 24, function () { 
            return Work::with('users:id,username,profile_photo_path')->select('id','title','slug','status','cover')->paginate(21); 
        }); 
    
    }

}
