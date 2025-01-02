<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Survey extends Model
{
    use HasFactory;
	
	protected $connection = 'mysql_second';
	
	protected $table = 'survey';
	
	public function getCareerReportcount($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('COUNT(*) as total')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->first();
    }
	
	public function getSocialReportcount($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('COUNT(*) as total')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->first();
    }
	
	public function getDiscoveryReportcount($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('COUNT(*) as total')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->first();
    }
	
	public function getEQReportcount($userEmail = null, $eqProductId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('COUNT(*) as total')->where('email_id', '=', $userEmail)->where('product_id', '=', $eqProductId)->where('status', '=', '1')->first();
    }
	
	public function getCPReports($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('*')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->orderBy('completed_date', 'DESC')->get();
    }
	
	public function getSDReports($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('*')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->orderBy('completed_date', 'DESC')->get();
    }
	
	public function getTDReports($userEmail = null, $productId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('*')->where('email_id', '=', $userEmail)->where('product_id', '=', $productId)->where('status', '=', '1')->orderBy('completed_date', 'DESC')->get();
    }
	
	public function getEQReports($userEmail = null, $eqProductId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('*')->where('email_id', '=', $userEmail)->where('product_id', '=', $eqProductId)->where('status', '=', '1')->orderBy('completed_date', 'DESC')->get();
    }
	
	public function getSurveybyid($surveyId = null) {
		return DB::connection('mysql_second')->table('survey_results')->selectRaw('results')->leftJoin('survey', 'survey_results.survey_id', '=', 'survey.id')->where('survey_results.survey_id', '=', $surveyId)->where('survey.status', '=', '1')->first();
    }
	
	public function getSurveyanswersbyid($surveyId = null) {
		return DB::connection('mysql_second')->table('survey_answer')->selectRaw('*')->where('survey_answer.survey_id', '=', $surveyId)->get();
    }
	
	public function getActiontipbykey($key = null) {
		return DB::connection('mysql_second')->table('survey_eq_actiontips')->selectRaw('*')->where('key', '=', $key)->where('is_active', '=', '1')->first();
    }
	
	public function getPdfpathbyid($reportid = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('PDF_path')->where('id', '=', $reportid)->where('status', '=', '1')->first();
    }
	
	public function getProjectid($surveyId = null) {
		return DB::connection('mysql_second')->table('survey')->selectRaw('project_id')->where('id', '=', $surveyId)->first();
    }
	
	public function getProjectdetailbyid($projectId = null) {
		return DB::connection('mysql_second')->table('projects')->selectRaw('*')->where('id', '=', $projectId)->first();
    }	
}
