<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeSearch($query, $val){
        return $query
        ->where('firstname', 'like', '%' . $val . '%')
        ->Orwhere('lastname', 'like', '%' . $val . '%')
        ->Orwhere('id', 'like', '%' . $val . '%');
    }

    public function scopeStatusFilter($query, $val){
        return $query
        ->where('status_id', $val);
    }

    public function scopeTypeFilter($query, $val){
        return $query
        ->where('type_id', $val);
    }

    public function scopeWashWalkin($query){
        return $query
        ->where('status_id', 1)
        ->where('isOnline', 0);
    }

    public function scopeWashOnline($query){
        return $query
        ->where('status_id', 3)
        ->where('isOnline', 1);
    }

    public function scopeHasOrder($query, $val){
        return $query
        ->where('user_id', $val)
        ->where('status_id', '<', 5);
    }

    public function scopeOnline($query){
        return $query
        ->where('isOnline', 1);
    }

    public function scopePickup($query){
        return $query
        ->where('status_id', 1)
        ->orWhere('status_id', 2);
    }

    public function scopeDelivery($query){
        return $query
        ->where('status_id', 5)
        ->orWhere('status_id', 6);
    }
}
