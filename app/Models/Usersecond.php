<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersecond extends Model
{
    use HasFactory;
	
	protected $connection = 'mysql_second';
	
	protected $table = 'user';
}
