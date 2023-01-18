<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganga extends Model
{
    use HasFactory;

    protected $table = 'ganga';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'url', 'category_id', 'likes',
        'unlikes', 'price', 'price_sale', 'available', 'user_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
