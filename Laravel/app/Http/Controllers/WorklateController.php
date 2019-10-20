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

    public function getreportbyuser(){
        $report = Worklates::find(Auth::user()->id);
        return $report;
    }
}
