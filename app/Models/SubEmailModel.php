<?php

namespace App\Models;

use CodeIgniter\Model;

class SubEmailModel extends Model
{
    protected $table = 'email_sub';
    protected $primaryKey = 'id_email';
    protected $allowedFields = ['email'];
}
