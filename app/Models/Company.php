<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function Compan_Branchs(){
        return $this->hasMany(Compan_Branch::class,'company_id','id');
    }

}
