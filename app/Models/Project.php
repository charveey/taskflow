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

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function completedAvg() {
        $tasks = $this->tasks()->count() !== 0 ? $this->tasks()->count() : 1;
        $doneTasks = $this->tasks()->where('status', 'done')->count();

        return round( $doneTasks * 100 / $tasks );
    }

}
