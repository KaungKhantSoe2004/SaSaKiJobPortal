<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListedJob extends Model
{
    use HasFactory;
    protected $fillable = [
        "companyName", "position",'salary', 'vacancy', 'experience', 'deadline', 'location','gender', "type", "CompanyLogo","Description"
    ];
}
