<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable =['scientific_name','commercial_name','category','manufacture_company','quantity_available','expiration_date','price'];
    protected $hidden = [ 'created_at','updated_at'];
}
