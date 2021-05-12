<?php

namespace App\Models;
use CodeIgniter\Model;

class Post_model extends Model {

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'title', 'slug', 'team_id', 'body', 'created_at', 'user_id'];



}