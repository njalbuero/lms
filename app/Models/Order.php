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
}
