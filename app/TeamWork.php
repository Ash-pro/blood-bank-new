<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamWork extends Model
{
    protected $guarded = [];


    //Attribute -----------------------------------------
    /* To make any value in name column as UpperCase  */
    public function getNameAttribute ($value){
        return ucfirst($value);
    }//end of getAttribute

    //Scope ----------------------------------------------
    /* I use scope for i can call it easy from controller == so I can use it in controller as WhenSearch without scope */
    public function scopeWhenSearch($query , $search){
        return $query->when($search ,function ($q) use ($search){
            return $q->where('name','like',"%$search%");
        });

    }//end of scopeWhenSearch
}
