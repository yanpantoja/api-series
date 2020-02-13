<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'email',
    ];

    protected $hidden = [
        'password',
    ];
}
