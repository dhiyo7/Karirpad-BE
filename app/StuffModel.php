<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryStuff;

class StuffModel extends Model
{
    protected $table = 'stuff';

    protected $primaryKey = 'stuff_code';
    
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(CategoryStuff::class, 'category_id');
    }
}
