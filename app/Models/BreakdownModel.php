<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakdownModel extends Model
{
    use HasFactory;
    protected $table = "breakdown";

    protected $guarded = [];

    public $timestamps = false;

    public function breakdown()
    {
        return $this->belongsTo(RandomModel::class,'random_id','id');
    }
}
