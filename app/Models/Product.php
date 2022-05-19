<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'class_id',
        'stream',
        'subject',
        'book_name',
        'publisher',
        'hsn',
        'gst',
        'price',
    ];
}
