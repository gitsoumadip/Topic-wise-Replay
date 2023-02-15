<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FouramModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'foruma';

    public function topic()
    {
        return $this->hasMany(Topic::class,'forum_id');
    }
}
