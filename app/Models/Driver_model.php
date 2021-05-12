<?php

namespace App\Models;
use CodeIgniter\Model;

class Driver_model extends Model {

    protected $table = 'drivers';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'name', 'startnr', 'team_id', 'user_id', 'points', 'drivers_image'];



}