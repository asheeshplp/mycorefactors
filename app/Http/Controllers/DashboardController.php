<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Usersecond;
use App\Models\Survey;

class DashboardController extends Controller
{
    public function __construct() {
		$this->userId = Auth::id();
		$this->userEmail = auth()->user()->email;
	}
	
	public function test(){
		return view('test');
	}
	
	public function index(){
		$eqresultCount = 0;
		// $userSecond = new Usersecond;
		// $userSecond->setConnection('mysql_second');
		// $userSeconddetail = Usersecond::where('user_email', '=', $this->userEmail)->firstOrFail();
		$survey = new Survey;
		$eqProductId = 6;
		$sdynProductId = 5;
		$cpathProductId = 3;
		$typeelmtProductId = 2;
		$typediscProductId = 1;
		
		//Get EQ Completed Report Count		
		$eqResult = $survey->getEQReportcount($this->userEmail, $eqProductId);
		$eqresultCount = $eqResult->total;
        //Get Career Path Completed Report Count		
		$careerResult = $survey->getCareerReportcount($this->userEmail, $cpathProductId);
		$cresultCount = $careerResult->total;
        
		
		// echo '<pre>'; print_r($eqresultCount); die;
		return view('dashboard')->with(array('eqresultCount'=> $eqresultCount, 'cresultCount'=> $cresultCount));
	}
}
