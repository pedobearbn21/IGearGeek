<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Onleaves;

class OnleaveController extends Controller
{
    public function savereport(Request $request){
        // $onleaves = new Onleaves([
        //     'employee_id' => $request->id,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'type' => $request->type,
        //     'status' => $request->status,
        //     'file' => $request->file,
        //     'description' => $request->description
        // ]);
        // dd($request);

        // $imageName = time().'.'.$request->file->getClientOriginalExtension();
        // $request->file->move(public_path('upload/user'), $imageName);
        $original_filename = $request->file->getClientOriginalName();
        $original_filename_arr = explode('.', $original_filename);
        $file_ext = end($original_filename_arr);
        $image = 'U-' . time() . '.' . $file_ext;
        $destination_path = './upload/user/';
        $request->file->move($destination_path, $image);
    	return response()->json(['path'=> '/upload/user/'.$image]);
        $res = $this->uploadImage($request);
        // $onleaves->save();
        // return $onleaves;
        return $res;
    }

    public function uploadImage(Request $request)
    {

        $response = null;
        $user = (object) ['file' => ""];
        if ($request->hasFile('file')) {
            $original_filename = $request->file('file')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/user/';
            $image = 'U-' . time() . '.' . $file_ext;
            if ($request->file('file')->move($destination_path, $image)) {
                $user->image = '/upload/user/' . $image;
                return $user;
            } else {
                return 'Cannot upload file';
            }
        } else {
            return 'File not found';
        }
    }


    public function getallreport() {
        $allreport = Onleaves::all();
        return $allreport;
    }

    public function getreportbyuser(){
        $report = Onleave::find(Auth::user()->id);
        return $report;
    }
}
