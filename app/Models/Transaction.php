<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uid','name','users_id','email','phone','adress',
        'transaction_total','transaction_status'
    ];

    protected $hidden = [

    ];


    public function details()
    {
        return $this->hasMany(TransactionDetail::class,'transactions_id','id');
    }
     public function product()
    {
        return $this->belongsTo(Product::class,'products_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }

}
