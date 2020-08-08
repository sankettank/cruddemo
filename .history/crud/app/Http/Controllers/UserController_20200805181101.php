<?php



namespace App\Http\Controllers;



use App\User;

use Illuminate\Http\Request;

use DataTables;

use Carbon\Carbon;

use Hash;



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
            ->make(true);
        }
        return view('user');
    }

    public function destroy($id){
        User::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:nerds|max:255',
            'email' => 'required',
        ]);

        if($request->user_id){
            User::updateOrCreate(['id' => $request->user_id],['name' => $request->name, 'email' => $request->email]);
        }else{
            User::updateOrCreate(['id' => $request->user_id],['name' => $request->name, 'email' => $request->email,'password' => Hash::make('123456789')]);
        }
        return response()->json(['success'=>'Product saved successfully.']);
    }

}
