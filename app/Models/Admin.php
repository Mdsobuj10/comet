<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    /**
     * one to one relationship
     **/
    public function role()
    {
        return $this -> belongsTo(Role::class, 'role_id', 'id');
    }
}
