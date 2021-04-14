<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodDonation extends Model
{
    protected $guarded =[];

    //Relation -----------------------------------------
    public function category(){
        return $this->hasOne(Category::class);
    }//end of service

    //Attribute -----------------------------------------
    /* To make any value in name column as UpperCase  */
    public function getNameAttribute ($value){
        return ucfirst($value);
    }//end of getAttribute

    //Scope ----------------------------------------------
    /* I use scope for i can call it easy from controller == so I can use it in controller as WhenSearch without scope */
    public function scopeWhenSearch($query , $search){
//        dd( $search);
        return $query->when($search ,function ($q) use ($search){
                return $q->where('blood_type','like',"%$search%" );

        });

    }//end of scopeWhenSearch
   /* I use scope for i can call it easy from controller == so I can use it in controller as WhenSearch without scope */
   public function scopeWhenSearch2($query , $search2){
//       dd(1);
       return $query->when($search2 ,function ($q) use ($search2){
           return $q->where( 'province_name','like',"%$search2%");

       });

   }//end of scopeWhenSearch

}
