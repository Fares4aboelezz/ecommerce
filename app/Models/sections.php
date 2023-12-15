<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    use HasFactory;
    protected $fillable=[
        'section_name',
        'description'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function invoices(){
        return $this->belongsTo(invoices::class);
    }
}
