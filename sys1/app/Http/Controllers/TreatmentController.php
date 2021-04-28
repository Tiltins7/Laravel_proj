<?php

namespace App\Http\Controllers;

use App\Models\Treatment_info;
use App\Models\Sheeps;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $treatment = Treatment_info::all();
            return $treatment;
         }
         $treatment= Treatment_info::all();
 
     return view('treatmentinfo',['treatmentinfo'=>$treatment]);
    }

    public function animalid($id){
        $idsheep = (int)$id;
        $animal_id = Sheeps::find($idsheep);
        
        return view('treatmentinfo', compact('animal_id'));
    }
}
