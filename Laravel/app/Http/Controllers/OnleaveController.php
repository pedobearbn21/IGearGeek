<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Onleaves;

class OnleaveController extends Controller
{
    public function savereport(Request $request){
        $onleaves = new Onleaves([
            'employee_id' => Auth::user()->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'status' => $request->status,
            'file' => $request->file,
            'description' => $request->description
        ]);
        $onleaves->save();
        return $onleaves;
    }

    public function getallreport() {
        $allreport = Onleaves::all();
        return $allreport;
    }

    public function getreportbyuser(){
        $report = Onleaves::find(Auth::user()->id);
        return $report;
    }
}
