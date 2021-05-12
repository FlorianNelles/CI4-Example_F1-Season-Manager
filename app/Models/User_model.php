<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model {

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'name', 'email', 'username', 'password', 'register_date'];



}