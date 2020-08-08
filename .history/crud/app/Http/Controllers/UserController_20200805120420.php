<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use DataTables;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('app');
    }




   /* public function index()
    {
         // get all the nerds
         $users = User::all();

         // load the view and pass the nerds
         return View('user',['users'=> $users]);

       // return view('home');
      // return view('user');
       //return redirect()->route('user');
    }*/
}
