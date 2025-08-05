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
        $ids = $this->belongsToMany(User::class, 'project_user', 'project_id', 'user_id')->pluck('user_id');
        $users = User::whereIn('id', $ids)->get();

        return $users;
    }

    public function usersCount() {
        return $this->users()->count();
    }

}
