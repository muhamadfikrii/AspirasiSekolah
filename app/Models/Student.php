<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'nis',
        'class',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
