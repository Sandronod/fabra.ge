<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_site_users extends Model
{
    protected $table = 'nn_site_users';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'personal_id',
        'user_type',
        'first_login',
        'address',
        'age',
        'work_experience',
        'min_hour_remuneration',
        'description',
        'profile_photo',
        'cover',
        'iban',
        'rating',
        'rating_count',
        'new_message',
        'package_id',
        'package_valid',
        'add_projects_count',
        'request_projects_count',
        'tasks_count',
        'show_chat',
    ];

    public function categories()
    {
        return $this->hasMany(nn_user_category::class, 'user_id');
    }
}
