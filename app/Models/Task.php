<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_on',
        'completed',
        'completed_on',
        'user_id'
    ];

    protected $appends = [
        'due_on_for_humans'
    ];

    public function getDueOnForHumansAttribute(): string
    {
        return Carbon::parse($this->due_on)->diffForHumans();
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
