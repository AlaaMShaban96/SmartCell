<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        /**
         * Service Account demo.
         */
        $sheets = Sheets::spreadsheet('13yIzeYkaacCdcFICbPGWlf3jVH1-aoWeG-9rdr70FMA')
                        ->sheet('Orders')
                        ->get();
        dd( $sheets);
        //$header = $sheets->pull(0);
        $header = [
            'name',
            'message',
            'created_at',
        ];

        $posts = Sheets::collection($header, $sheets);
        $posts = $posts->reverse()->take(10);

        return view('welcome')->with(compact('posts'));
    }
}
