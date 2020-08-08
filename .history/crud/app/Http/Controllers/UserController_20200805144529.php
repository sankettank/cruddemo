<?php



namespace App\Http\Controllers;



use App\User;

use Illuminate\Http\Request;

use DataTables;

use Carbon\Carbon;



class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {
        //$current = Carbon::now();
        //$trialExpires = $current->addDays(30);
        //echo $trialExpires;exit;

        if ($request->ajax()) {

            $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at'])->get();

        return Datatables::of($users)
            ->editColumn('created_at', '{!! $created_at !!}')
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('Y/m/d');
            })
            ->make(true);

        }



        return view('user');

    }

}
