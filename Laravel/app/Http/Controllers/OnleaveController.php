<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Onleaves;
use App\Models\Worklates;

class OnleaveController extends Controller
{
    public function savereport(Request $request){
        // $imageName = time().'.'.$request->file->getClientOriginalExtension();
        // $request->file->move(public_path('upload/user'), $imageName);
        $request->id = intval($request->id);
        $onleaves = new Onleaves([
            'employee_id' => $request->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'file' => '',
            'description' => $request->description,
        ]);
        $path = '';
        if ($request->hasFile('file')){
            $original_filename = $request->file->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $image = 'U-' . time() . '.' . $file_ext;
            $destination_path = './upload/user/';
            $request->file->move($destination_path, $image);
            $path = '/upload/user/'.$image;
            $onleaves->file = $path;
        }
        if($onleaves->save()){
            return 'savesuccess';
        }else{
            return 'fail';
        }
    }

    public function savelate(Request $request){
        $workslate = new Worklates([
            'employee_id' => $request->employee_id,
            'latedate' => $request->latedate,
            'timeselect' => $request->timeselect,
            'description' => $request->description
        ]);
        $workslate->save();
        return 'success';
    }

    public function getallreport() {
        $allreport = Onleaves::all();
        return $allreport;
    }

    public function getreportbyuser($id){
        $report = Onleaves::where('employee_id',$id)->get();
        return $report;
    }

    public function getreportonleaves($id){
        $update = Onleaves::find($id)
                    ->update(['status' => 'success']);
        return 'success' ;
    }
}
