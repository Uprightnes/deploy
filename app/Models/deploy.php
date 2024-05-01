<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deploy extends Model
{
    use HasFactory;

    protected $table = 'deploy';

    protected $fillable =[
        'surname',
        'othername',
        'gender',
        'currentrole',
    ];
}
