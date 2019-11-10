<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worklates;

class WorklateController extends Controller
{
    public function work(Request $request){
        $work = new Worklates([
            'employee_id' => Auth::user()->id,
            'latedate' => $request->latedate,
            'timeselect' => $request->timeselect,
            'description' => $request->description
        ]);
        $work->save();
        return response()->json([ 'success' => $work ]);
    }

    public function getreport(){
        $reportwork = Worklates::all();
        return $reportwork;
    }

    public function getreportworklate($id){
        $report = Worklates::where('employee_id',$id)->get();
        return $report;
    }
}
