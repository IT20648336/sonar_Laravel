<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table = 'form_data';
    protected $primaryKey = 'id';
    protected $fillable = ['name','email','address','contact_num','occupation','beaf','expect_soluation','photo','problem_level','suggestions',
    'district','city','postal_code','grama_name','gcontact_num','authorized_per_name','authorized_per_num','Status'];
}
