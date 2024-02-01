<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BbnPayout extends Model
{
    use HasFactory;
    protected $table = 'bbn_payouts';
    protected $fillable = [
        'bbn_id', 'payment_method', 'description','amount'
    ];

    protected $casts = [
        'bbn_id'     => 'integer',
        'amount'    => 'double',
    ];
    public function bbns(){
        return $this->belongsTo(User::class, 'bbn_id','id');
    }
    public function scopeMyPayout($query)
    {
        if(auth()->user()->hasRole('admin')) {
            return $query;
        }

        if(auth()->user()->hasRole('bbn')) {
            return $query->where('bbn_id', \Auth::id());
        }

        return $query;
    }
}
