<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'title', 'body', 'user_id', 'is_read'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function getIsReadAttribute()
    {
        return $this->attributes['is_read'] == 0 ? 'New' : 'Read';
    }
}
