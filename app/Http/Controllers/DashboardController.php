<?php

namespace App\Http\Controllers;

use App\Traits\ReportsTrait;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Usersecond;
use App\Models\Survey;

class DashboardController extends Controller
{
    use ReportsTrait;
	
	public function __construct() {
		$this->userId = Auth::id();
		$this->userEmail = auth()->user()->email;
	}
	
	public function test(){
		return view('test');
	}
	
	public function index(){				
		$eqresultCount 	= Session::get('eqresultCount');
		$cresultCount 	= Session::get('cresultCount');
		$sdresultCount 	= Session::get('sdresultCount');
		$teresultCount 	= Session::get('teresultCount');
		$tdresultCount 	= Session::get('tdresultCount');
		
		return view('dashboard')->with(array('eqresultCount'=> $eqresultCount, 'cresultCount'=> $cresultCount));
	}
	
	public function careerexplorer(Request $request) {
		$firstVal = '';
		$secondVal = '';
		$thirdVal = '';
		$initialSearch = 0;
		if(isset($_GET['search']) && $_GET['search']){
			$initialSearch = 1;
			$firstVal = substr($_GET['search'], 0, 1);
			$secondVal = substr($_GET['search'], 1, 1);
			$thirdVal = substr($_GET['search'], 2, 1);		
		}
		return view('careerexplorer',compact('firstVal', 'secondVal', 'thirdVal', 'initialSearch'));
		// echo '<pre>'; print_r($firstVal); die;
	}
	
	public function searchcareer(Request $request) {
		$postData 	= $request->all();
		$firstVal 	= $postData['firstSelect'];
		$secondVal 	= $postData['secondSelect'];
		$thirdVal 	= $postData['thirdSelect'];
		$valueArray = array();
		$valueArray['R'] = 1;
		$valueArray['I'] = 2;
		$valueArray['A'] = 3;
		$valueArray['S'] = 4;
		$valueArray['E'] = 5;
		$valueArray['C'] = 6;
		$data = DB::connection('mysql')->select('SELECT DISTINCT onetsoc_code FROM interests i Where Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$firstVal].') And Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$secondVal].') AND Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$thirdVal].')');
		$occupationResult = [];
		$count=0;
		foreach($data as  $code){
			$cde =	$code->onetsoc_code;
			$sqlQueryForOccupationTitle = DB::connection('')->select('select title from  occupation_data where onetsoc_code="'.$cde.'"');
			$sqlQueryForJobZone = DB::connection('mysql')->select('select job_zone from  job_zones where onetsoc_code="'.$cde.'"');
			$sqlQueryForInterstCode = DB::connection('mysql')->select('select data_value from  interests where scale_id="IH" AND onetsoc_code="'.$cde.'"');
			$intrstRslt = json_decode(json_encode($sqlQueryForInterstCode), true);                        
			$intrstStrng = '';
			foreach($intrstRslt as $intrstVal){ 
				$intrstStrng .= array_search($intrstVal['data_value'],$valueArray);
			}
			$occupationResult[$count]['interest_code'] = $intrstStrng;
			$occupationResult[$count]['title'] = $sqlQueryForOccupationTitle[0]->title;
			$occupationResult[$count]['title_link'] = 'https://www.onetonline.org/link/summary/'.$cde;
			$occupationResult[$count]['job_zone'] = $sqlQueryForJobZone[0]->job_zone;
			$occupationResult[$count]['onetsoc_code'] = $cde;
			$count++;			
		} 
		return view('searchcareer',compact('occupationResult'));
	}
}
