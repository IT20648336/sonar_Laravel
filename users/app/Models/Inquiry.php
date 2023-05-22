<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table = 'inquiry';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'designation', 'inquiry', 'response'];
}
