<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table="name";

    protected $primaryKey = "name_id";

    public $timestamps = false;

    use HasFactory;

    protected $fillable=[
                            'name'
    ];
}
