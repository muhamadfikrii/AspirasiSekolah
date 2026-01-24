<?php

namespace App\Models;

use App\Enums\AspirationStatus;
use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'judul',
        'isi',
        'description',
        'location',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => AspirationStatus::class,
    ];

    protected static function booted()
    {
        static::creating(function ($aspiration) {
            $aspiration->status = AspirationStatus::MENUNGGU;
        });
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasOne(Student::class, 'user_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
