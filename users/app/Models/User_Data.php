<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Data extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table = 'user_data';
    protected $primaryKey = 'ID';
    protected $fillable = ['Created_Date', 'ID', 'User_Name', 'Email', 'Address', 'Contact_Num','occupation', 'BEAP', 
    'Expect_Soluation', 'Photo', 'Problem_Level', 'Suggestions', 'Province', 'District', 'City', 'Postal_Code', 
    'Grama_Name', 'GContact_Num', 'Authorized_Per_ConNum', 'Updated_Date'];
}