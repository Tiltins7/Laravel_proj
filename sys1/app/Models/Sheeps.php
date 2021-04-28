<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheeps extends Model
{
    protected $table = 'sheeps';
    protected $fillable = [
        'sheep_id', 'dzimums', 'vecums'
    ];

    public function Treatment_info(){
        return $this->hasMany("App\Treatment_info");
    }
}
