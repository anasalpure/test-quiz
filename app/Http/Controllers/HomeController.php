<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function nptifications()
    {
        return 'nptifications';
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
         * https://api.giphy.com/v1/gifs/search?
         * api_key=p5fGzls9RV4WMqAvibFIn0rR2GwsuNop&
         * q=tt&
         * limit=25&offset=0&rating=g&lang=en
         */

        $params = [
            'limit' => request()->query('perpage',25),
            'offset' => request()->query('page',0),
            'rating' => 'g',
            'lang'=>'en'
        ];

        $gifsData = app('giphy')->gif()->search('tt',$params);
        $gifs =collect(json_decode($gifsData, true));

        /*
         * $gifs
         * data[[id,embed_url]],
         * meta,
         * pagination[total_count,count,offset]
         */
        //return response()->json();
        $pagesCount = ceil($gifs['pagination']['total_count'] / $params['limit']);

        $paginator = new LengthAwarePaginator(
            null,
            $gifs['pagination']['total_count'],
            $params['limit'],
            $params['offset'],
            ['path' => 'home']
        );

        return view('home',compact('gifs','paginator'));
    }
}
