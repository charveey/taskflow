<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'deadline',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id')->withPivot(['authority', 'created_at']);
    }

    public function usersCount() {
        return $this->users()->count();
    }

}
