<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;
    protected $table = 'alimentos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'precio', 'cantidad'];
    protected $guarded = [];
    public $timestamps = false;

}
