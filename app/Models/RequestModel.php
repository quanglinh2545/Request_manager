<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description','status','priority',
        'category_id','user_id','manager','start_date','due_date'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
  
}
