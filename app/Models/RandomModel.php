<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomModel extends Model
{
    use HasFactory;

    protected $table = "random";

    protected $guarded = [];

    public $timestamps = false;



    public function random()
    {
        return $this->hasMany(BreakdownModel::class,'random_id','id');
    }
}
