<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $guarded = ['id'];
    protected $primaryKey = 'supplier_id';
    public $timestamps = false;
}
