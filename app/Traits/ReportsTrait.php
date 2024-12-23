<?php

namespace App\Traits;

use App\Models\Survey;
use Session;

trait ReportsTrait
{
    public static function checkreports($userEmail = null)
    {
        $survey = new Survey;
		$eqresultCount 	= 0;
		$cresultCount 	= 0;
		$sdresultCount 	= 0;
		$teresultCount 	= 0;
		$tdresultCount 	= 0;
		
		$resultArr = array();
		if(!$userEmail){
			$userEmail = auth()->user()->email;
		}
		$eqProductId = 6;
		$sdynProductId = 5;
		$cpathProductId = 3;
		$typeelmtProductId = 2;
		$typediscProductId = 1;
		//Get EQ Completed Report Count		
		$eqResult = $survey->getEQReportcount($userEmail, $eqProductId);
		$eqresultCount = $eqResult->total;
		//Get Career Path Completed Report Count		
		$careerResult = $survey->getCareerReportcount($userEmail, $cpathProductId);
		$cresultCount = $careerResult->total;
		
		
		Session::put('eqresultCount', $eqresultCount);
		Session::put('cresultCount', $cresultCount);
		Session::put('sdresultCount', $sdresultCount);
		Session::put('teresultCount', $teresultCount);
		Session::put('tdresultCount', $tdresultCount);		
    }
}