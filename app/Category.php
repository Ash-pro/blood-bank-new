<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

//    //Relation -----------------------------------------
//    public function serviceItem(){
//        return $this->hasMany(ServiceItem::class);
//    }//end of service
//

    //Attribute -----------------------------------------
        /* To make any value in name column as UpperCase  */
    public function getNameAttribute ($value){
        return ucfirst($value);
    }//end of getAttribute

    //Scope ----------------------------------------------
        /* I use scope for i can call it easy from controller == so I can use it in controller as WhenSearch without scope */
    public function scopeWhenSearch($query , $search){
        return $query->when($search ,function ($q) use ($search){
            return $q->where('category_name','like',"%$search%");
        });

    }//end of scopeWhenSearch


}
