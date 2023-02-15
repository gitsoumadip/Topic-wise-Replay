<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'topics';


    public function forum()
    {
        return $this->belongsTo(FouramModel::class, 'forum_id');
    }
    public function comment(){
        return  $this->hasMany(Comments::class, 'topic_id');
    }
}
