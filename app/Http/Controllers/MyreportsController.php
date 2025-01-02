<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DateTime;
use App\Models\Survey;

class MyreportsController extends Controller
{
    public function __construct() {
		$this->userId = Auth::id();
		$this->userEmail = auth()->user()->email;
	}
	
	public function eqreports() {
		$survey = new Survey;
		$eqProductId = 6;
		$sdynProductId = 5;
		$cpathProductId = 3;
		$typeelmtProductId = 2;
		$typediscProductId = 1;
		$eqResults = '';
		$firstPdfFullpath = 'javascript:void(0);';
		$eqResults = $survey->getEQReports($this->userEmail, $eqProductId);
		$resultsArr = array();
		if($eqResults) {
			// $resultsArr = $eqResults[0];
			foreach($eqResults as $key => $value) {			
				$completedDate	=	$value->completed_date;
				$createDate 	= 	new DateTime($completedDate);
				$strip 			= 	$createDate->format('F d, Y');
				$resultsArr['records'][$key]['id']				=	$value->id;
				$resultsArr['records'][$key]['survey_id']		=	$value->survey_Id;
				$resultsArr['records'][$key]['survey_pdf']		=	$value->PDF_path;
				$resultsArr['records'][$key]['completedDate']	=	$strip;
				if($key == 0) {
					$firstDate		=	$strip;	
					$firstSurveyid	=	$value->id;
					$firstPdf		=	$value->PDF_path;
					if($firstPdf) {
						$firstPdfFullpath = 'https://pro.corefactors.com/pro'.$firstPdf;
					}
				}
			}
			$resultsArr['firstDate']	=	$firstDate;
			$resultsArr['firstSurveyid']	=	$firstSurveyid;
			$resultsArr['firstPdfpath']	=	$firstPdfFullpath;
		}
		
		// echo '<pre>'; print_r($resultsArr); die;
		return view('eqreports')->with(array('resultsArr'=> $resultsArr));
	}
	
	public function careerpath() {
		$survey = new Survey;
		
		$cpathProductId = 3;
		$cpResults = '';
		$firstPdfFullpath = 'javascript:void(0);';
		$cpResults = $survey->getCPReports($this->userEmail, $cpathProductId);
		$resultsArr = array();
		if($cpResults) {
			// $resultsArr = $eqResults[0];
			foreach($cpResults as $key => $value) {			
				$completedDate	=	$value->completed_date;
				$createDate 	= 	new DateTime($completedDate);
				$strip 			= 	$createDate->format('F d, Y');
				$resultsArr['records'][$key]['id']				=	$value->id;
				$resultsArr['records'][$key]['survey_id']		=	$value->survey_Id;
				$resultsArr['records'][$key]['survey_pdf']		=	$value->PDF_path;
				$resultsArr['records'][$key]['completedDate']	=	$strip;
				if($key == 0) {
					$firstDate		=	$strip;	
					$firstSurveyid	=	$value->id;
					$firstPdf		=	$value->PDF_path;
					if($firstPdf) {
						$firstPdfFullpath = 'https://pro.corefactors.com/pro'.$firstPdf;
					}
				}
			}
			$resultsArr['firstDate']		=	$firstDate;
			$resultsArr['firstSurveyid']	=	$firstSurveyid;
			$resultsArr['firstPdfpath']		=	$firstPdfFullpath;
		}
		
		// echo '<pre>'; print_r($resultsArr); die;
		return view('cpreports')->with(array('resultsArr'=> $resultsArr));
	}
	
	public function typediscovery() {
		$survey = new Survey;
		
		$cpathProductId = 1;
		$cpResults = '';
		$firstPdfFullpath = 'javascript:void(0);';
		$cpResults = $survey->getTDReports($this->userEmail, $cpathProductId);
		$resultsArr = array();
		if($cpResults) {
			// $resultsArr = $eqResults[0];
			foreach($cpResults as $key => $value) {			
				$completedDate	=	$value->completed_date;
				$createDate 	= 	new DateTime($completedDate);
				$strip 			= 	$createDate->format('F d, Y');
				$resultsArr['records'][$key]['id']				=	$value->id;
				$resultsArr['records'][$key]['survey_id']		=	$value->survey_Id;
				$resultsArr['records'][$key]['survey_pdf']		=	$value->PDF_path;
				$resultsArr['records'][$key]['completedDate']	=	$strip;
				if($key == 0) {
					$firstDate		=	$strip;	
					$firstSurveyid	=	$value->id;
					$firstPdf		=	$value->PDF_path;
					if($firstPdf) {
						$firstPdfFullpath = 'https://pro.corefactors.com/pro'.$firstPdf;
					}
				}
			}
			$resultsArr['firstDate']		=	$firstDate;
			$resultsArr['firstSurveyid']	=	$firstSurveyid;
			$resultsArr['firstPdfpath']		=	$firstPdfFullpath;
		}
		
		return view('tdreports')->with(array('resultsArr'=> $resultsArr));
	}
		
	public function socialdynamics() {
		$survey = new Survey;
		
		$cpathProductId = 5;
		$cpResults = '';
		$firstPdfFullpath = 'javascript:void(0);';
		$cpResults = $survey->getSDReports($this->userEmail, $cpathProductId);
		$resultsArr = array();
		if($cpResults) {
			// $resultsArr = $eqResults[0];
			foreach($cpResults as $key => $value) {			
				$completedDate	=	$value->completed_date;
				$createDate 	= 	new DateTime($completedDate);
				$strip 			= 	$createDate->format('F d, Y');
				$resultsArr['records'][$key]['id']				=	$value->id;
				$resultsArr['records'][$key]['survey_id']		=	$value->survey_Id;
				$resultsArr['records'][$key]['survey_pdf']		=	$value->PDF_path;
				$resultsArr['records'][$key]['completedDate']	=	$strip;
				if($key == 0) {
					$firstDate		=	$strip;	
					$firstSurveyid	=	$value->id;
					$firstPdf		=	$value->PDF_path;
					if($firstPdf) {
						$firstPdfFullpath = 'https://pro.corefactors.com/pro'.$firstPdf;
					}
				}
			}
			$resultsArr['firstDate']		=	$firstDate;
			$resultsArr['firstSurveyid']	=	$firstSurveyid;
			$resultsArr['firstPdfpath']		=	$firstPdfFullpath;
		}
		
		// echo '<pre>'; print_r($resultsArr); die;
		return view('sdreports')->with(array('resultsArr'=> $resultsArr));
	}
	
	
	public function exploreeq(){
		return view('exploreeq');
	}
	
	public function watchvideoseq(){
		return view('watchvideoseq');
	}
	
	public function externalresourceseq(){
		return view('externalresourceseq');
	}
	
	public function getreportpdffile(Request $request) {
		$survey = new Survey;
		$postData 	= $request->all();
		$reportid 	= $postData['reportid'];
		$result 	= $survey->getPdfpathbyid($reportid);
		$pdfPath = 'javascript:void(0);';
		if($result){
			$pdfPath = 'https://pro.corefactors.com/pro'.$result->PDF_path;
		}
		echo $pdfPath;
		exit;
	}
	
	public function gettdreportcontent(Request $request) {
		$survey = new Survey;
		$finalArr = array();
		$postData 	= $request->all();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$selectedtab 		= $searcharray['selectedtab'];
		if($selectedtab == 'introductiontd') {
			return view('tdreport/introduction',compact('finalArr'));
		} else if($selectedtab == 'wholetyperesults') {
			return view('tdreport/wholetyperesults',compact('finalArr'));
		} else if($selectedtab == 'typetable') {
			return view('tdreport/typetable',compact('finalArr'));
		} else if($selectedtab == 'typedimensionresults') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			return view('tdreport/typedimensionresults',compact('surveyId', 'isResultreleased', 'surveyResults'));			
		} else if($selectedtab == 'fourdichotomies') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			return view('tdreport/fourdichotomies',compact('surveyId', 'isResultreleased', 'surveyResults'));
		}
	}
	
	public function getsdreportcontent(Request $request) {
		$survey = new Survey;
		$finalArr = array();
		$postData 	= $request->all();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$selectedtab 		= $searcharray['selectedtab'];
		if($selectedtab == 'introductionsd') {
			return view('sdreport/introduction',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsstyles') {
			return view('sdreport/socialdynamicsstyles',compact('finalArr'));
		} else if($selectedtab == 'understandyourselves') {
			return view('sdreport/understandyourselves',compact('finalArr'));
		} else if($selectedtab == 'naturalsocialdynamics') {
			return view('sdreport/naturalsocialdynamics',compact('finalArr'));
		} else if($selectedtab == 'snapshotsfourstyles') {
			return view('sdreport/snapshotsfourstyles',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsmover') {
			return view('sdreport/socialdynamicsmover',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsmapper') {
			return view('sdreport/socialdynamicsmapper',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsinvolver') {
			return view('sdreport/socialdynamicsinvolver',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsintegrator') {
			return view('sdreport/socialdynamicsintegrator',compact('finalArr'));
		} else if($selectedtab == 'socialdynamicsthings') {
			return view('sdreport/socialdynamicsthings',compact('finalArr'));
		} else if($selectedtab == 'promptingotheract') {
			return view('sdreport/promptingotheract',compact('finalArr'));
		} else if($selectedtab == 'focusattentioninteraction') {
			return view('sdreport/focusattentioninteraction',compact('finalArr'));
		} else if($selectedtab == 'summarizingthingsincommon') {
			return view('sdreport/summarizingthingsincommon',compact('finalArr'));
		} else if($selectedtab == 'applicationssocialdynamics') {
			return view('sdreport/applicationssocialdynamics',compact('finalArr'));
		} else if($selectedtab == 'yourAssessmentresults') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			return view('sdreport/assessmentresults',compact('surveyId', 'isResultreleased', 'surveyResults'));		
		}
	}
	
	public function getcpreportcontent(Request $request) {
		$survey = new Survey;
		$finalArr = array();
		$postData 	= $request->all();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$selectedtab 		= $searcharray['selectedtab'];
		if($selectedtab == 'introduction') {
			return view('cpreport/introduction',compact('finalArr'));
		} else if($selectedtab == 'introductioncp') {
			return view('cpreport/introduction',compact('finalArr'));
		} else if($selectedtab == 'careerbasics') {
			return view('cpreport/careerbasics',compact('finalArr'));
		} else if($selectedtab == 'careeroccupation') {
			return view('cpreport/careeroccupation',compact('finalArr'));
		} else if($selectedtab == 'gia-tab') {
			return view('cpreport/giatab',compact('finalArr'));
		} else if($selectedtab == 'careerexploration') {
			return view('cpreport/careerexploration',compact('finalArr'));
		} else if($selectedtab == 'occupationalcodes') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			return view('cpreport/occupationalcodes',compact('surveyId', 'isResultreleased', 'surveyResults'));
		} else if($selectedtab == 'globalinterestarea') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			return view('cpreport/globalinterestarea',compact('surveyId', 'isResultreleased', 'surveyResults'));
		} else if($selectedtab == 'eqskillstab') {
			$survey = new Survey;
			$surveyId = $searcharray['reportid'];
			$releaseResult = 1;
			$isResultreleased = 1;
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			
			return view('cpreport/oagprofile',compact('surveyId', 'isResultreleased', 'surveyResults'));
		}
	}
	
	public function getreportcontent(Request $request) {
		$survey = new Survey;
		$finalArr = array();
		$postData 	= $request->all();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$selectedtab 		= $searcharray['selectedtab'];
		if($selectedtab == 'introduction') {
			return view('eqreport/introduction',compact('finalArr'));
		} else if($selectedtab == 'references') {
			return view('eqreport/references',compact('finalArr'));
		} else if($selectedtab == 'understanding-self-report') {
			return view('eqreport/understanding-self-report',compact('finalArr'));
		} else if($selectedtab == 'eqskills') {
			return view('eqreport/eqskills',compact('finalArr'));
		} else if($selectedtab == 'interpretingtab') {
			return view('eqreport/interpretingreport',compact('finalArr'));
		} else if($selectedtab == 'eqdimensioncompetencies') {
			$releaseResult = 1;
			$isResultreleased = 1;
			
			$surveyId = $searcharray['reportid'];
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			// $surveyResults 		= $survey->getSurveybyid($surveyId);	
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			$surveyAnswers = $survey->getSurveyanswersbyid($surveyId);
			$answersArr = array();
			foreach($surveyAnswers as $key => $value) {				
				array_push($answersArr, (array)[
						'id' => $value->id,
						'survey_id' => $value->survey_id,
						'question_id' => $value->question_id,
						'answer' => $value->answer,
				]);
			}
			unset($answersArr[0]);
			$answersArr = array_values($answersArr);			
			return view('eqreport/eqdimensioncompetencies',compact('answersArr', 'isResultreleased'));
		} else if($selectedtab == 'actiontips') {
			$releaseResult = 1;
			$isResultreleased = 1;
			
			$surveyId = $searcharray['reportid'];
			
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			// $surveyResults 		= $survey->getSurveybyid($surveyId);	
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			$actionText1 = '';
			$actionText2 = '';
			$actionText3 = '';
			$actionText4 = '';
			$content = '0';
			$surveyAnswers = $survey->getSurveyanswersbyid($surveyId);
			
			$answersArr = array();
			if(count($surveyAnswers) > 0) {
				$content = '1';
				foreach($surveyAnswers as $key => $value) {				
					array_push($answersArr, (array)[
							'id' => $value->id,
							'survey_id' => $value->survey_id,
							'question_id' => $value->question_id,
							'answer' => $value->answer,
					]);
				}
				unset($answersArr[0]);
				$answersArr = array_values($answersArr);
				$SelfactualizationGap = $answersArr[1]['answer'] - $answersArr[0]['answer'];
				$SelfconfidenceGap = $answersArr[3]['answer'] - $answersArr[2]['answer'];
				$AuthenticityGap = $answersArr[5]['answer'] - $answersArr[4]['answer'];
				$AccurateSelfassessmentGap = $answersArr[7]['answer'] - $answersArr[6]['answer'];
				$CongruenceGap = $answersArr[9]['answer'] - $answersArr[8]['answer'];
				$MindfulnessGap = $answersArr[11]['answer'] - $answersArr[10]['answer'];
				$IndependenceGap = $answersArr[13]['answer'] - $answersArr[12]['answer'];
				$IntegrityGap = $answersArr[15]['answer'] - $answersArr[14]['answer'];
				$ResilienceGap = $answersArr[17]['answer'] - $answersArr[16]['answer'];
				$StaminaGap = $answersArr[19]['answer'] - $answersArr[18]['answer'];
				$firstArr = ['SelfactualizationGap' => $SelfactualizationGap, 'SelfconfidenceGap' => $SelfconfidenceGap, 'AuthenticityGap' => $AuthenticityGap, 'AccurateSelfassessmentGap' => $AccurateSelfassessmentGap, 'CongruenceGap' => $CongruenceGap, 'MindfulnessGap' => $MindfulnessGap, 'IndependenceGap' => $IndependenceGap, 'IntegrityGap' => $IntegrityGap, 'ResilienceGap' => $ResilienceGap, 'StaminaGap' => $StaminaGap];
				$allValuesAreTheSame = (count(array_unique($firstArr, SORT_REGULAR)) === 1);
				if($allValuesAreTheSame) {
					$firstKey = 'SelfactualizationGap';
				} else {
					$firstKey = array_search(max($firstArr), $firstArr);
				}
				$actionText1 = (array)$survey->getActiontipbykey($firstKey);
				
				$ImpulseControlGap = $answersArr[21]['answer'] - $answersArr[20]['answer'];
				$EmotionalselfcontrolGap = $answersArr[23]['answer'] - $answersArr[22]['answer'];
				$IntentionalityGap = $answersArr[25]['answer'] - $answersArr[24]['answer'];
				$SelfDisclosureGap = $answersArr[27]['answer'] - $answersArr[26]['answer'];
				$AdaptabilityGap = $answersArr[29]['answer'] - $answersArr[28]['answer'];
				$OpennessGap = $answersArr[31]['answer'] - $answersArr[30]['answer'];
				$ToleranceGap = $answersArr[33]['answer'] - $answersArr[32]['answer'];
				$PerspectiveTakingGap = $answersArr[35]['answer'] - $answersArr[34]['answer'];
				$OptimismGap = $answersArr[37]['answer'] - $answersArr[36]['answer'];
				$RealityTestingGap = $answersArr[39]['answer'] - $answersArr[38]['answer'];

				$secondArr = ['ImpulseControlGap' => $ImpulseControlGap, 'EmotionalselfcontrolGap' => $EmotionalselfcontrolGap, 'IntentionalityGap' => $IntentionalityGap, 'SelfDisclosureGap' => $SelfDisclosureGap, 'AdaptabilityGap' => $AdaptabilityGap, 'OpennessGap' => $OpennessGap, 'ToleranceGap' => $ToleranceGap, 'PerspectiveTakingGap' => $PerspectiveTakingGap, 'OptimismGap' => $OptimismGap, 'RealityTestingGap' => $RealityTestingGap];

				$allValuesAreTheSame = (count(array_unique($secondArr, SORT_REGULAR)) === 1);
				if($allValuesAreTheSame) {
					$secondKey = 'ImpulseControlGap';
				} else {
					$secondKey = array_search(max($secondArr), $secondArr);
				}
				$actionText2 = (array)$survey->getActiontipbykey($secondKey);
				
				$IntuitionGap  = $answersArr[41]['answer'] - $answersArr[40]['answer'];
				$CompassionGap = $answersArr[43]['answer'] - $answersArr[42]['answer'];
				$ReadingNonVerbalBehaviorGap = $answersArr[45]['answer'] - $answersArr[44]['answer'];
				$InsightfulnessGap  = $answersArr[47]['answer'] - $answersArr[46]['answer'];
				$ReframingGap  = $answersArr[49]['answer'] - $answersArr[48]['answer'];
				$FlexibilityGap = $answersArr[51]['answer'] - $answersArr[50]['answer'];
				$SocialIntelligenceGap  = $answersArr[53]['answer'] - $answersArr[52]['answer'];
				$UnderstandingOthersGap  = $answersArr[55]['answer'] - $answersArr[54]['answer'];
				$SituationalAwarenessGap = $answersArr[57]['answer'] - $answersArr[56]['answer'];
				$GroupSavvyGap = $answersArr[59]['answer'] - $answersArr[58]['answer'];

				$thirdArr = ['IntuitionGap' => $IntuitionGap, 'CompassionGap' => $CompassionGap, 'ReadingNonVerbalBehaviorGap' => $ReadingNonVerbalBehaviorGap, 'InsightfulnessGap' => $InsightfulnessGap, 'ReframingGap' => $ReframingGap, 'FlexibilityGap' => $FlexibilityGap, 'SocialIntelligenceGap' => $SocialIntelligenceGap, 'UnderstandingOthersGap' => $UnderstandingOthersGap, 'SituationalAwarenessGap' => $SituationalAwarenessGap, 'GroupSavvyGap' => $GroupSavvyGap];


				$allValuesAreTheSame = (count(array_unique($thirdArr, SORT_REGULAR)) === 1);
				if($allValuesAreTheSame) {
					$thirdKey = 'IntuitionGap';
				} else {
					$thirdKey = array_search(max($thirdArr), $thirdArr);
				}			
				$actionText3 = (array)$survey->getActiontipbykey($thirdKey);
				
				$ConflictManagementGap  = $answersArr[61]['answer'] - $answersArr[60]['answer'];
				$ActiveEmpathyGap = $answersArr[63]['answer'] - $answersArr[62]['answer'];
				$ListeningGenerouslyGap = $answersArr[65]['answer'] - $answersArr[64]['answer'];
				$PatienceGap = $answersArr[67]['answer'] - $answersArr[66]['answer'];
				$InfluencingothersGap = $answersArr[69]['answer'] - $answersArr[68]['answer'];
				$AssertivenessGap = $answersArr[71]['answer'] - $answersArr[70]['answer'];
				$RelationshipSavvyGap = $answersArr[73]['answer'] - $answersArr[72]['answer'];
				$CollaborationGap = $answersArr[75]['answer'] - $answersArr[74]['answer'];
				$TrustingGap = $answersArr[77]['answer'] - $answersArr[76]['answer'];
				$ManagingSocialSpaceGap = $answersArr[79]['answer'] - $answersArr[78]['answer'];

				$fourthArr = ['ConflictManagementGap' => $ConflictManagementGap, 'ActiveEmpathyGap' => $ActiveEmpathyGap, 'ListeningGenerouslyGap' => $ListeningGenerouslyGap, 'PatienceGap' => $PatienceGap, 'InfluencingothersGap' => $InfluencingothersGap, 'AssertivenessGap' => $AssertivenessGap, 'RelationshipSavvyGap' => $RelationshipSavvyGap, 'CollaborationGap' => $CollaborationGap, 'TrustingGap' => $TrustingGap, 'ManagingSocialSpaceGap' => $ManagingSocialSpaceGap];

				$allValuesAreTheSame = (count(array_unique($fourthArr, SORT_REGULAR)) === 1);
				if($allValuesAreTheSame) {
					$fourthKey = 'ConflictManagementGap';
				} else {
					$fourthKey = array_search(max($fourthArr), $fourthArr);
				}
				$actionText4 = (array)$survey->getActiontipbykey($fourthKey);
			}		
			return view('eqreport/actiontips',compact('actionText1','actionText2','actionText3','actionText4','content', 'isResultreleased'));
		} else if($selectedtab == 'your-report-result') {
			$releaseResult = 1;
			$isResultreleased = 1;
			$surveyId = $searcharray['reportid'];
			//check if this project has release result on completion or not.
			$projectObj = $survey->getProjectid($surveyId);
			$projectId = $projectObj->project_id;
			//get project details from Id
			
			$projectDetailsObj	=	$survey->getProjectdetailbyid($projectId);
			
			$surveyResults 		= $survey->getSurveybyid($surveyId);	
			$releaseResult 		= $projectDetailsObj->release_results;
			
			if($releaseResult == 0) {
				$isResultreleased 	= $projectDetailsObj->is_result_released;				
			}
			
			return view('eqreport/yourreportresult',compact('surveyResults', 'isResultreleased'));
		}
		// echo '<pre>'; print_r($searcharray); die;
	}
	
}
