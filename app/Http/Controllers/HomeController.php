<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
//    redirect to home page after login
    public function index(): Renderable
    {
        return view('home');
    }

//    public function search(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = "";
//            $products = DB::table('systems_lists')
//                ->where('developer', 'LIKE', '%' . $request->search . "%")->get();
//            if ($products) {
//                foreach ($products as $key => $product) {
//                    $output .= '<tr>' .
//                        '<td>' . $product->id . '</td>' .
//                        '<td>' . $product->name . '</td>' .
//                        '<td>' . $product->url . '</td>' .
//                        '<td>' . $product->database . '</td>' .
//                        '<td>' . $product->status . '</td>' .
//                        '<td>' . $product->developer . '</td>' .
//                        '</tr>';
//                }
//                return Response($output);
//            }
//        }
//    }
}
