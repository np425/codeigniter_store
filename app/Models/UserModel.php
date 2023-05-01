<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'money'];
    protected $returnType = 'object';
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required',
        'money' => 'required'
    ];
}