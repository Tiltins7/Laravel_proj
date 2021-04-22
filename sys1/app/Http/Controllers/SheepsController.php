<?php

namespace App\Http\Controllers;

use App\Models\Sheeps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sheepsController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()){
           $sheeps = Sheeps::all();
           return $sheeps;
        }
        $sheeps= Sheeps::all();

    return view('sheeps',['sheeps'=>$sheeps]);
    }

    public function destroy($id) {
        DB::delete('delete from sheeps where id = ?', [$id]);
        echo "Record deleted successfully.<br/>";
    }
}
