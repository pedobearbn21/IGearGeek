<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onleaves;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getonleavechart(Request $request){
        $users = DB::table('onleaves')
                ->whereMonth('start_date', $request->month)
                ->whereYear('start_date', $request->year)
                ->get();
        foreach ($users as $key => $value) {
            $parts = explode('-',$value->start_date);
            $value->length_date = $parts;
            // $kom = array(1,3,5,7,8,10,12);
            // $yon = array(4,6,9,11);
            // $pan = array(2);
            // if ( in_array($value->id,$os) ){
            //     return 'true'.$value->id.'wow';
            // }else{
            //     return 'fuck';
            // }
        }
        return $users;
    }
}
