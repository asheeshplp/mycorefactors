<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ReportText extends Model
{
    use HasFactory;
	
	protected $table = 'report_text';
	
	public function getTextbytype($report_type = null) {		
		return DB::connection('mysql')->table('report_text')->selectRaw('*')->where('report_type', '=', $report_type)->where('status', '=', '1')->first();
    }
}
