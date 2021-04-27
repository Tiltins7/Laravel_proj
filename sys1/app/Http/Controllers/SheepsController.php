<?php

namespace App\Http\Controllers;

 use App\Models\Company; 

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

    public function save(Request $req)
    {
        $animals = new Sheeps;
        $animals->sheep_id=$req->id_nr;
        $animals->dzimums=$req->dzimums;
        $animals->vecums=$req->vecums;
        $animals->save();
        return redirect()->route('sheeps');
    }

    public function destroy($sheep_id)
    {
        Sheeps::where('id', $sheep_id)->delete();
        return redirect()->route('sheeps');
    }


    public function update(Request $req, $id)
    {
        $animals = Sheeps::findorFail($id);
        $animals->sheep_id=$req->eid_nr;
        $animals->dzimums=$req->edzimums;
        $animals->vecums=$req->evecums;
        $animals->save();
        return redirect()->route('sheeps');
    }
    
}
