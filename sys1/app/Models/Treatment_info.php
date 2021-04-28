<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment_info extends Model
{
    protected $table = 'treatment_info';
    protected $fillable = [
        'treatment_start_date', 'diagnosis', 'sanemtsMed_id', 'deva', 'treatment_end_date', 'med_free_date', 'user_id'
    ];

    public function Sheeps(){
        return $this->belongsTo("App\Sheeps");
    }
}
