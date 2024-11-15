<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date', 'user_id'];

    
    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    public function scopeOverdue($query)
    {
    return $query->where('due_date', '<', now())->where('status', '!=', 'completed');
    }

}
