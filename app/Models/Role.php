<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * one eto many data relaton ship role with parmission
     **/
    public function users()
    {
        return $this ->  HasMany(Admin::class, 'role_id', 'id' );
    }
}
