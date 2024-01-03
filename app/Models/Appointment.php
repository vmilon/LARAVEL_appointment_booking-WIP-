<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'fullname', 'phone', 'email', 'user_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}