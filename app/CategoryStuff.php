<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StuffModel;

class CategoryStuff extends Model
{
    protected $table = 'stuff_category';

    protected $primaryKey = 'id_category';

    protected $guarded = [];

    public function stuff(){
        return $this->hasMany(StuffModel::class, 'category_id');
    }
}
