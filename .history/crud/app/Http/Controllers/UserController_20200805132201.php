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

            $data = User::select('*');

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->editColumn('created_at', function ($row) {

                       return [

                          'display' => e($row->created_at->format('d/m/Y')),

                          'timestamp' => $row->created_at->timestamp

                       ];

                    })

                    ->filterColumn('created_at', function ($query, $keyword) {

                       $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);

                    })

                    ->make(true);


        }



        return view('user');

    }

}
