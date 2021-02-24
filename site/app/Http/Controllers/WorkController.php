<?php

namespace App\Http\Controllers;

<<<<<<< HEAD

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

=======
use App\Models\work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD

        Meta::setTitle('Work/Index');
        Meta::setDescription('Awesome page');
        Meta::addMeta('twitter:card', [
            'content' => 'butschster',
        ]);
        return Inertia::render('Work/Index');
=======
        //
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
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
<<<<<<< HEAD


        $work = Work::find($work->id);
        // dd( $work);
        $users = $work->users;
        // dd( $users);

        $work = Work::with('users')->get()->find($work->id);
        Meta::setTitle($work['title']);


        return Inertia::render('Work/Show',$work);
=======
        //
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
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
<<<<<<< HEAD

    public function api()
    {

    //    $currentPage = request()->get('page',1);
        // return Work::with('users')->paginate(21); 
       $currentPage = request()->get('page',1);
        return Cache::remember('works.all-' . $currentPage, 60 * 60 * 24, function () { 
            return Work::with('users:id,username,profile_photo_path')->select('id','title','slug','cover')->paginate(21); 
        }); 
    
    }

=======
>>>>>>> afe9d47c2fe91d6a745d190b7d7229ef32ff4741
}
