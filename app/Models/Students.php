<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'city', 'state', 'country', 'status'
    ];

    public function subjects()
    {
        // return $this->belongsTo(Subjects::class,'student_id');
        return $this->hasMany(Subjects::class,'student_id');
    }
}
