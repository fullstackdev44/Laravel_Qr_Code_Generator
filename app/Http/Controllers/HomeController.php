<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heat;
use App\Models\User;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        $getdate = DB::table('heats')->select('date as undate')->groupBy('date')->get();
        foreach ($getdate as $key => $datevalue) {
            $alldata = DB::table('heats')->where('date','=',$datevalue->undate)->get();
            $data[$datevalue->undate] = $alldata;
        }
       // return view('home',compact('data'));
        return view('home', [
            'data' =>$data,
            'users' => Heat::paginate(15)
        ]);
    }

    public function getUsers()
    {
        $customers = User::all();
        return view('users.index')->with('customers',$customers);
    }

}
