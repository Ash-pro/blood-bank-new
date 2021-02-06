<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations
    public function donations  (){
        return $this->hasMany(Donation::class);
    }//end of

    // Attribute ------------------------------------------------------------
    public function getNameAttribute ($value){
        return ucfirst($value);
    }//end of getNameAttribute

    public function getEmailAttribute ($value){
        return ucfirst($value);
    }//end of getNameAttribute


    //Scopes -----------------------------------------------------------------
    public function scopeWhenSearch($query , $search){
        return $query->when($search ,function ($q) use ($search){
            return $q->where('name','like',"%$search%");
        });
    }//end of scopeWhenSearch

    public function scopeWhereRole($query , $role_name){
        return $query->whereHas('roles',function ($q) use($role_name){
            return $q->whereIN('name',(array)$role_name)
                    ->orWhereIn('id',(array)$role_name);
        });
    }//end of scopeWhereRole

    public function scopeWhenRole($query , $role_id){
        return $query->when($role_id , function ($q) use($role_id){
            $this->scopeWhereRole($q,$role_id);
        });

    }//end of scopeWhenRole

    public function scopeWhereRoleNot ($query , $role_name){
        return $query->whereNotIn('name' , (array)$role_name )
            ->WhereNotIn('id',(array)$role_name);;
    }//end of scopeWhereRoleNot

}
