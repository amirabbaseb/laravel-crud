<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'price',
        'sub_name',
        'brand_id',
        'color_id'
    ];

    public function label(){
        return $this->belongsTo(Label::class);
    }
}
