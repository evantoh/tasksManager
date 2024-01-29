<?php

namespace App\Models; // specifies the namespace where the Task model belongs.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fillable attributes for mass assignment
    protected $fillable = ['title', 'description', 'duedate', 'status', 'deadline', 'reminder'];

    // Use the HasFactory trait for model factories
    use HasFactory;

    //create a relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
