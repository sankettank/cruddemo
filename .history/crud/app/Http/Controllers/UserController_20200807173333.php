<?php



namespace App\Http\Controllers;



use App\User;

use Illuminate\Http\Request;

use DataTables;

use Carbon\Carbon;

use Hash;

use Illuminate\Support\Facades\Validator;

use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

use App\Jobs\SendEmailJob;



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
        //return view('user')->with('user', $data);
        //return view('user', compact('user'));

        return view('user');
    }

    public function destroy($id,Request $request){
        //$user = User::find($id);

        /*$data = array(
            'name' => $user['name'],
            'email' => $user['email'],
            'detail' => '',
        );*/

        /*$delete = User::find($id)->delete();
        if($delete){
            Mail::to($user['email'])->send(new DemoEmail($data));
        }*/

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
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);

        }else{
            if($request->user_id){
                User::updateOrCreate(['name' => $request->name, 'email' => $request->email]);
            }else{
                User::updateOrCreate(['name' => $request->name, 'email' => $request->email,'password' => Hash::make('123456789')]);
            }
        }

        dispatch(new SendEmailJob($details));

        return response()->json(['success'=>'Product saved successfully.']);
    }

    public function mutator(Request $request)
    {
        echo $now = Carbon::now();

        echo"<br>".$now->copy()->addDays(10);

        echo '<br/><br/>';

        echo "<br>". Str::random(6);
        echo "<br>". mt_rand(100000, 999999);

        echo '<br/><br/>';

        $user = new User;
        echo 'Add Subscription Day : '.$user->addSubsriptionDays(6);

        echo '<br/><br/>';

        echo $user->getFullNameAttribute('sanket').'<br/><br/>';
        echo $user->setFullNameAttribute('SANKET').'<br/><br/>';
        echo $user->setFullNameAttributefull('sanket', 'tank');

    }


}
