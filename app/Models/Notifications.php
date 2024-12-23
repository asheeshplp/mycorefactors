<?php

namespace App\Models;
use DB;
use Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
	
	protected $table = 'notifications';
	
	public function getNotificationcount() {
		$userId = Auth::id();
		return DB::connection('mysql')->table('notifications')->selectRaw('COUNT(*) as total')->where('userid', '=', $userId)->where('status', '=', '0')->first();
    }
	
	public function getNotifications() {
		$userId = Auth::id();
		return DB::connection('mysql')->table('notifications')->selectRaw('*')->where('userid', '=', $userId)->where('status', '=', '0')->get();
    }
	
}
