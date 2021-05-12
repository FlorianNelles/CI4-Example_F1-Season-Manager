<?php

namespace App\Models;
use CodeIgniter\Model;

class Team_model extends Model {

    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'name', 'teamchef', 'motor', 'sitz'];



}