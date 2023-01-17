<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heat;
use DB;
use File;

class HeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('heat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'number' => 'required|unique:heats,number',
            'date' => 'required',
            'filename' => 'required'
        ],
        );

        $file = $request->file('filename');
        $filename = $file->getClientOriginalName();
        $filenamestring = str_replace(' ', '', $filename);

        $query = new Heat;
        $query->filename = 'images/'.time().$filenamestring;
        $query->number = $request->number;
        $query->date  = $request->date;
        $query->title = 'images/'.time().$filenamestring.'.png';
        if($request->file('filename')){
            $file= $request->file('filename');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('images'), time().$filenamestring);
            $data['filename']= $filename;
            $url = $_SERVER['APP_URL'];
            \QrCode::size(500)
            ->format('png')
            ->generate($url.'images/'.$request->number.$filenamestring, public_path('images/'.time().$filenamestring.'.png'));
        }
        if ($file->getClientMimeType() !== 'application/pdf')
        {
            return back()->withErrors(['msg' => 'Please Select PDF Files.']);
        }
        $query->save();
        return redirect('qr/generate')->with('status', 'Record Saved!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function previous()
    {
        $getdate = DB::table('heats')->select('date')->groupBy('date')->paginate(10);
        return view('heat.previous',compact('getdate'));
    }


    public function getBydate(Request $request)
    {
        $alldata = DB::table('heats')->where('date','=',$request->bydate)->get();
        return json_encode($alldata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getdata = Heat::where('id',$id)->first();
        if (file_exists(public_path($getdata['title']))){
            unlink($getdata['title']);
        }
        if (file_exists(public_path($getdata['filename']))){
            unlink($getdata['filename']);
        }
        $heat=Heat::find($id);
        $delete = $heat->delete();
        if($delete){
            return redirect('/home')->with('status', 'Record Deleted');
        }else {
            return redirect('/home')->with('error', 'Try again');
        }
    }
}
