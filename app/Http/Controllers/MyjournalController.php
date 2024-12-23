<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\Userentries;
use App\Models\Userweeklyreflection;
use App\Models\Usermonthlyreflection;
use App\Models\Userdailyreflection;
use App\Models\Usergratitude;
use App\Models\Usergoal;
use App\Models\Useractionitem;

class MyjournalController extends Controller
{
    public function index(){		
		$userId = Auth::id();
		$entries = DB::table('user_entries')->where('user_id', '=', $userId)->where('is_deleted', '=', '0')->orderBy('id','DESC')->get();
		return view('myjournal')->with(array('enteriesArr'=> $entries));
	}
	
	public function getentries(Request $request) {
		$userId = Auth::id();
		$entries = DB::table('user_entries')->where('user_id', '=', $userId)->where('is_deleted', '=', '0')->orderBy('id','DESC')->get();
		
		$finalArr = array();
		if($entries) {
			
			// $finalArr 
			foreach($entries as $key => $entry) {
				$entryId 		= $entry->id;
				$entryOption 	= $entry->entry_option;
				$entryType 		= $entry->type_daily_weekly_monthly;
				$moodId 		= $entry->mood_id;
				$user_id 		= $entry->user_id;
				$created_at 	= $entry->created_at;
				$updated_at 	= $entry->updated_at;
				
				$finalArr[$key]['id'] 			= $entryId;
				$finalArr[$key]['user_id'] 		= $user_id;
				$finalArr[$key]['mood_id'] 		= $moodId;
				$finalArr[$key]['entry_option'] = $entryOption;
				$finalArr[$key]['type_daily_weekly_monthly'] = $entryType;
				$finalArr[$key]['created_at'] 	= $created_at;
				$finalArr[$key]['updated_at'] 	= $updated_at;
				
				if($entryOption == '1'){
					if($entryType == 'weekly'){
						$tableTofetch  = 'user_weekly_reflection';
						$entriesRec = DB::select("SELECT id, biggest_accomplishment_this_week as question1, obstacles_did_you_encounter as question2, reflect_on_a_moment_this_week as question3, learn_from_the_people_you_interacted as question4, rate_your_overall_week_and_why as question5 from user_weekly_reflection where entries_id ='$entryId'");
					} else if($entryType == 'monthly'){
						$tableTofetch  = 'user_monthly_reflection';
						$entriesRec = DB::select("SELECT id, key_achievements_this_month as question1, most_challenging_and_why as question2, personal_growth_this_month as question3, most_grateful_for_this_month as question4, balance_your_work_and_personal_life as question5 from user_monthly_reflection where entries_id ='$entryId'");
					} else {
						$tableTofetch  = 'user_daily_reflection';
						$entriesRec = DB::select("SELECT id, highlight_of_your_day as question1, challenges_did_you_face_today as question2, learn_about_yourself_today as question3, moment_made_you_smile_today as question4, feel_about_your_productivity_today as question5 from user_daily_reflection where entries_id ='$entryId'");
					}
				} else if($entryOption == '2'){
						$tableTofetch  = 'user_gratitude';
						$entriesRec = DB::select("SELECT id, three_things_you_are_grateful as question1, someone_that_made_a_positive_impact as question2, small_thing_that_brought_you_happiness as question3, recent_success_you_are_thankful_for as question4, reflect_on_a_kind_gesture as question5 from user_gratitude where entries_id ='$entryId'");
				} else if($entryOption == '3'){
					if($entryType == 'weekly'){
						$tableTofetch  = 'user_goal';
						$entriesRec = DB::select("SELECT id, your_primary_goal_for_today as question1, one_thing_you_want_to_accomplish as question2, you_do_today_to_make_progress as question3, positive_habit_do_you_want_to_focus as question4, ensure_you_stay_productive as question5 from user_goal where entries_id ='$entryId'");
					} else if($entryType == 'monthly'){
						$tableTofetch  = 'user_goal';
						$entriesRec = DB::select("SELECT id, top_three_goals_for_this_week as question1, new_skill_or_habit_you_want_to_develop as question2, measure_your_success_at_the_end as question3, one_challenge_you_want_to_tackle as question4, you_do_to_ensure_a_balanced_week as question5 from user_goal where entries_id ='$entryId'");
					} else {
						$tableTofetch  = 'user_goal';
						$entriesRec = DB::select("SELECT id, main_objectives_for_this_month as question1, personal_or_professional_milestones as question2, stay_motivated_throughout_the_month as question3, longterm_project as question4, strategies_will_you_implement as question5 from user_goal where entries_id ='$entryId'");
					}
				} else if($entryOption == '4'){
						$tableTofetch  = 'user_action_item';
						$entriesRec = DB::select("SELECT id, specific_task as question1, actionable_step as question2, improve_your_well_being as question3, next_step as question4, task_have_you_been_procrastinating as question5 from user_action_item where entries_id ='$entryId'");
				}
				if($entriesRec) {
					// echo '<pre>'; print_r($entriesRec); die;
					$finalArr[$key]['typeId'] 			= $entriesRec[0]->id;
					$finalArr[$key]['question1'] 		= $entriesRec[0]->question1;
					$finalArr[$key]['question2'] 		= $entriesRec[0]->question2;
					$finalArr[$key]['question3'] 		= $entriesRec[0]->question3;
					$finalArr[$key]['question4'] 		= $entriesRec[0]->question4;
					$finalArr[$key]['question5'] 		= $entriesRec[0]->question5;
				}
				// echo '<pre>'; print_r($entriesRec); die;
			}
			return view('filteruserentries',compact('finalArr'));
		}
	}
	
	public function updateentry(Request $request){
		$postData 	= $request->all();
		$userId = Auth::id();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$idtoedit 		= $searcharray['upentryid'];
		$uptypeid 		= $searcharray['uptypeid'];
		$tabletoupdate 	= $searcharray['tabletoupdate'];
		$question1 		= $searcharray['question1'];
		$question2 		= $searcharray['question2'];
		$question3 		= $searcharray['question3'];
		$question4 		= $searcharray['question4'];
		$question5 		= $searcharray['question5'];
		$entryFetched = DB::table('user_entries')->where('user_id', '=', $userId)->where('id', '=', $idtoedit)->first();
		$entryOption 	= $entryFetched->entry_option;
		$entryType 		= $entryFetched->type_daily_weekly_monthly;
		
		if($entryOption == '1'){
			if($entryType == 'weekly'){
				$tableTofetch  = 'user_weekly_reflection';
				$field1	=	'biggest_accomplishment_this_week';
				$field2	=	'obstacles_did_you_encounter';
				$field3	=	'reflect_on_a_moment_this_week';
				$field4	=	'learn_from_the_people_you_interacted';
				$field5	=	'rate_your_overall_week_and_why';				
			} else if($entryType == 'monthly'){
				$tableTofetch  = 'user_monthly_reflection';
				$field1	=	'key_achievements_this_month';
				$field2	=	'most_challenging_and_why';
				$field3	=	'personal_growth_this_month';
				$field4	=	'most_grateful_for_this_month';
				$field5	=	'balance_your_work_and_personal_life';				
			} else {
				$tableTofetch  = 'user_daily_reflection';
				$field1	=	'highlight_of_your_day';
				$field2	=	'challenges_did_you_face_today';
				$field3	=	'learn_about_yourself_today';
				$field4	=	'moment_made_you_smile_today';
				$field5	=	'feel_about_your_productivity_today';
			}
		} else if($entryOption == '2'){
				$tableTofetch  = 'user_gratitude';
				$field1	=	'three_things_you_are_grateful';
				$field2	=	'someone_that_made_a_positive_impact';
				$field3	=	'small_thing_that_brought_you_happiness';
				$field4	=	'recent_success_you_are_thankful_for';
				$field5	=	'reflect_on_a_kind_gesture';
		} else if($entryOption == '3'){
			if($entryType == 'weekly'){
				$tableTofetch  = 'user_goal';
				$field1	=	'your_primary_goal_for_today';
				$field2	=	'one_thing_you_want_to_accomplish';
				$field3	=	'you_do_today_to_make_progress';
				$field4	=	'positive_habit_do_you_want_to_focus';
				$field5	=	'ensure_you_stay_productive';
			} else if($entryType == 'monthly'){
				$tableTofetch  = 'user_goal';
				$field1	=	'top_three_goals_for_this_week';
				$field2	=	'new_skill_or_habit_you_want_to_develop';
				$field3	=	'measure_your_success_at_the_end';
				$field4	=	'one_challenge_you_want_to_tackle';
				$field5	=	'you_do_to_ensure_a_balanced_week';
			} else {
				$tableTofetch  = 'user_goal';
				$field1	=	'main_objectives_for_this_month';
				$field2	=	'personal_or_professional_milestones';
				$field3	=	'stay_motivated_throughout_the_month';
				$field4	=	'longterm_project';
				$field5	=	'strategies_will_you_implement';
			}
		} else if($entryOption == '4'){
				$tableTofetch  = 'user_action_item';
				$field1	=	'specific_task';
				$field2	=	'actionable_step';
				$field3	=	'improve_your_well_being';
				$field4	=	'next_step';
				$field5	=	'task_have_you_been_procrastinating';
		}
		
		DB::table($tabletoupdate)->where("id", "=", $uptypeid)->where("user_id", "=", $userId)->update([$field1 => $question1, $field2 => $question2, $field3 => $question3, $field4 => $question4, $field5 => $question5]);
		echo 'success'; 
		exit;
	}
	
	public function editentry(Request $request){
		$postData 	= $request->all();
		$finalArr	= array();
		$userId = Auth::id();
		$idtoedit 	= $postData['idtoedit'];
		$entryFetched = DB::table('user_entries')->where('user_id', '=', $userId)->where('id', '=', $idtoedit)->first();
		$entryId 		= $entryFetched->id;
		$entryOption 	= $entryFetched->entry_option;
		$entryType 		= $entryFetched->type_daily_weekly_monthly;
		$moodId 		= $entryFetched->mood_id;
		$user_id 		= $entryFetched->user_id;
		$created_at 	= $entryFetched->created_at;
		
		$finalArr['id'] 			= $entryId;
		$finalArr['user_id'] 		= $user_id;
		$finalArr['mood_id'] 		= $moodId;
		$finalArr['entry_option'] = $entryOption;
		$finalArr['type_daily_weekly_monthly'] = $entryType;
		$finalArr['created_at'] 	= $created_at;
				
		if($entryOption == '1'){
			if($entryType == 'weekly'){
				$tableTofetch  = 'user_weekly_reflection';
				$entriesRec = DB::select("SELECT id, biggest_accomplishment_this_week as question1, obstacles_did_you_encounter as question2, reflect_on_a_moment_this_week as question3, learn_from_the_people_you_interacted as question4, rate_your_overall_week_and_why as question5 from user_weekly_reflection where entries_id ='$entryId'");
			} else if($entryType == 'monthly'){
				$tableTofetch  = 'user_monthly_reflection';
				$entriesRec = DB::select("SELECT id, key_achievements_this_month as question1, most_challenging_and_why as question2, personal_growth_this_month as question3, most_grateful_for_this_month as question4, balance_your_work_and_personal_life as question5 from user_monthly_reflection where entries_id ='$entryId'");
			} else {
				$tableTofetch  = 'user_daily_reflection';
				$entriesRec = DB::select("SELECT id, highlight_of_your_day as question1, challenges_did_you_face_today as question2, learn_about_yourself_today as question3, moment_made_you_smile_today as question4, feel_about_your_productivity_today as question5 from user_daily_reflection where entries_id ='$entryId'");
			}
		} else if($entryOption == '2'){
				$tableTofetch  = 'user_gratitude';
				$entriesRec = DB::select("SELECT id, three_things_you_are_grateful as question1, someone_that_made_a_positive_impact as question2, small_thing_that_brought_you_happiness as question3, recent_success_you_are_thankful_for as question4, reflect_on_a_kind_gesture as question5 from user_gratitude where entries_id ='$entryId'");
		} else if($entryOption == '3'){
			if($entryType == 'weekly'){
				$tableTofetch  = 'user_goal';
				$entriesRec = DB::select("SELECT id, your_primary_goal_for_today as question1, one_thing_you_want_to_accomplish as question2, you_do_today_to_make_progress as question3, positive_habit_do_you_want_to_focus as question4, ensure_you_stay_productive as question5 from user_goal where entries_id ='$entryId'");
			} else if($entryType == 'monthly'){
				$tableTofetch  = 'user_goal';
				$entriesRec = DB::select("SELECT id, top_three_goals_for_this_week as question1, new_skill_or_habit_you_want_to_develop as question2, measure_your_success_at_the_end as question3, one_challenge_you_want_to_tackle as question4, you_do_to_ensure_a_balanced_week as question5 from user_goal where entries_id ='$entryId'");
			} else {
				$tableTofetch  = 'user_goal';
				$entriesRec = DB::select("SELECT id, main_objectives_for_this_month as question1, personal_or_professional_milestones as question2, stay_motivated_throughout_the_month as question3, longterm_project as question4, strategies_will_you_implement as question5 from user_goal where entries_id ='$entryId'");
			}
		} else if($entryOption == '4'){
				$tableTofetch  = 'user_action_item';
				$entriesRec = DB::select("SELECT id, specific_task as question1, actionable_step as question2, improve_your_well_being as question3, next_step as question4, task_have_you_been_procrastinating as question5 from user_action_item where entries_id ='$entryId'");
		} else {
			echo 'error';
			exit;
		}
		if($entriesRec) {
			$finalArr['typeId'] 		= $entriesRec[0]->id;
			$finalArr['tableToupdate'] 	= $tableTofetch;
			$finalArr['question1'] 		= $entriesRec[0]->question1;
			$finalArr['question2'] 		= $entriesRec[0]->question2;
			$finalArr['question3'] 		= $entriesRec[0]->question3;
			$finalArr['question4'] 		= $entriesRec[0]->question4;
			$finalArr['question5'] 		= $entriesRec[0]->question5;
			
			// echo '<pre>'; print_r($finalArr); die;
			
			echo json_encode($finalArr);
			exit;
			
		} else {
			echo 'error';
			exit;
		}
	}
	
	public function deleteentry(Request $request){
		$postData 	= $request->all();
		$idtoDelete = $postData['idtodelete'];
		if($idtoDelete) {
			Userentries::where('id',$idtoDelete)->update(['is_deleted'=>'1']);
			echo 'success';
			// exit;
		} else {
			echo 'error';
			exit;
		}
	}
	
	public function addmyjournal(Request $request){
		$postData 	= $request->all();
		$dataString = $postData['dataString'];
		parse_str($dataString, $searcharray);
		$selectedMood 	= $searcharray['selectedmood'];
		$entryOption 	= $searcharray['entryoption'];
		$dailyRef 		= $searcharray['dailyRef'];
		$userId = Auth::id();
		$explodedMood = explode('_', $selectedMood);
		$moodId 	= 	$explodedMood[0];
		$moodName 	= 	$explodedMood[1];
		$createdAt 	= 	Carbon::now();
		
		
		if($entryOption == 'reflection') {
			$optionId = '1';
		} else if($entryOption == 'gratitude') {
			$optionId = '2';
		} else if($entryOption == 'goal') {
			$optionId = '3';
		} else {
			$optionId = '4';
		}
		$question1 		= 	$searcharray['question1'];
		$question2 		= 	$searcharray['question2'];
		$question3		= 	$searcharray['question3'];
		$question4 		= 	$searcharray['question4'];
		$question5 		= 	$searcharray['question5'];
		// echo '<pre>'; print_r($searcharray); die;
		//check if $entryOption
		if($entryOption == 'reflection'){
			if($dailyRef == 'weeklyReflection'){
				$type = 'weekly';
			} else if($dailyRef == 'monthlyReflection'){
				$type = 'monthly';
			} else {
				$dailyRef 	= 'dailyReflection';
				$type = 'daily';
			}
			
			DB::beginTransaction();
			try{
				$userEntries = new Userentries;
				//insert
				$userEntries->user_id 						= 	$userId;
				$userEntries->mood_id 						= 	$moodId;
				$userEntries->entry_option 					= 	$optionId;
				$userEntries->type_daily_weekly_monthly 	= 	$type;
				$userEntries->created_at 					= 	$createdAt;
				$userEntries->save();
				$lastInsertedId		=	$userEntries->id;
				
				if($lastInsertedId) {
					if($entryOption == 'reflection' && $type == 'weekly') {
						//insert to user_weekly_reflection
						$userReflection = new Userweeklyreflection;
						$userReflection->user_id 	= 	$userId;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->biggest_accomplishment_this_week 	= 	$question1;
						$userReflection->obstacles_did_you_encounter 	= 	$question2;
						$userReflection->reflect_on_a_moment_this_week 	= 	$question3;
						$userReflection->learn_from_the_people_you_interacted 	= 	$question4;
						$userReflection->rate_your_overall_week_and_why  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
						
					} else if($entryOption == 'reflection' && $type == 'monthly') {
						//insert to user_weekly_reflection
						$userReflection = new Usermonthlyreflection;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->key_achievements_this_month 	= 	$question1;
						$userReflection->most_challenging_and_why 	= 	$question2;
						$userReflection->personal_growth_this_month 	= 	$question3;
						$userReflection->most_grateful_for_this_month 	= 	$question4;
						$userReflection->balance_your_work_and_personal_life  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
					} else {
						//insert to user_daily_reflection
						$userReflection = new Userdailyreflection;
						$userReflection->user_id 				= 	$userId;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->highlight_of_your_day 	= 	$question1;
						$userReflection->challenges_did_you_face_today 	= 	$question2;
						$userReflection->learn_about_yourself_today 	= 	$question3;
						$userReflection->moment_made_you_smile_today 	= 	$question4;
						$userReflection->feel_about_your_productivity_today  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
					}
				}
				DB::commit();
			}catch(\Exception $e){
				// echo $e->getMessage();
				DB::rollBack();
				echo 'error'; 
				exit;
			}
		}
		//for Gratitude
		if($entryOption == 'gratitude'){
			$type	=	'daily';
			DB::beginTransaction();
			try{
				$userEntries = new Userentries;
				//insert
				$userEntries->user_id 						= 	$userId;
				$userEntries->mood_id 						= 	$moodId;
				$userEntries->entry_option 					= 	$optionId;
				$userEntries->type_daily_weekly_monthly 	= 	$type;
				$userEntries->created_at 					= 	$createdAt;
				$userEntries->save();
				$lastInsertedId		=	$userEntries->id;
				
				if($lastInsertedId) {					
					//insert to user_gratitude
					$userReflection = new Usergratitude;
					$userReflection->user_id 	= 	$userId;
					$userReflection->entries_id 			= 	$lastInsertedId;
					$userReflection->three_things_you_are_grateful 	= 	$question1;
					$userReflection->someone_that_made_a_positive_impact 	= 	$question2;
					$userReflection->small_thing_that_brought_you_happiness 	= 	$question3;
					$userReflection->recent_success_you_are_thankful_for 	= 	$question4;
					$userReflection->reflect_on_a_kind_gesture  	= 	$question5;
					$userReflection->created_at 					= 	$createdAt;
					$userReflection->save();
				}
				DB::commit();
			}catch(\Exception $e){
				echo $e->getMessage();
				DB::rollBack();
				echo 'error'; 
				exit;
			}
		}
		if($entryOption == 'goal'){
			if($dailyRef == 'weeklyGoal'){
				$type = 'weekly';
			} else if($dailyRef == 'monthlyGoal'){
				$type = 'monthly';
			} else {
				$dailyRef 	= 'dailyGoal';
				$type = 'daily';
			}
			
			DB::beginTransaction();
			try{
				$userEntries = new Userentries;
				//insert
				$userEntries->user_id 						= 	$userId;
				$userEntries->mood_id 						= 	$moodId;
				$userEntries->entry_option 					= 	$optionId;
				$userEntries->type_daily_weekly_monthly 	= 	$type;
				$userEntries->created_at 					= 	$createdAt;
				$userEntries->save();
				$lastInsertedId		=	$userEntries->id;
				
				if($lastInsertedId) {
					if($entryOption == 'goal' && $type == 'weekly') {
						//insert to user_weekly_reflection
						$userReflection = new Usergoal;
						$userReflection->user_id 	= 	$userId;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->top_three_goals_for_this_week 	= 	$question1;
						$userReflection->new_skill_or_habit_you_want_to_develop 	= 	$question2;
						$userReflection->measure_your_success_at_the_end 	= 	$question3;
						$userReflection->one_challenge_you_want_to_tackle 	= 	$question4;
						$userReflection->you_do_to_ensure_a_balanced_week  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
						
					} else if($entryOption == 'goal' && $type == 'monthly') {
						//insert to user_weekly_reflection
						$userReflection = new Usergoal;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->main_objectives_for_this_month 	= 	$question1;
						$userReflection->personal_or_professional_milestones 	= 	$question2;
						$userReflection->stay_motivated_throughout_the_month 	= 	$question3;
						$userReflection->longterm_project 	= 	$question4;
						$userReflection->strategies_will_you_implement  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
					} else {
						//insert to user_daily_reflection
						$userReflection = new Usergoal;
						$userReflection->user_id 				= 	$userId;
						$userReflection->entries_id 			= 	$lastInsertedId;
						$userReflection->your_primary_goal_for_today 	= 	$question1;
						$userReflection->one_thing_you_want_to_accomplish 	= 	$question2;
						$userReflection->you_do_today_to_make_progress 	= 	$question3;
						$userReflection->positive_habit_do_you_want_to_focus 	= 	$question4;
						$userReflection->ensure_you_stay_productive  	= 	$question5;
						$userReflection->created_at 					= 	$createdAt;
						$userReflection->save();
					}
				}
				DB::commit();
			}catch(\Exception $e){
				echo $e->getMessage();
				DB::rollBack();
				echo 'error'; 
				exit;
			}
		}
		if($entryOption == 'action-item'){
			$type	=	'daily';
			DB::beginTransaction();
			try{
				$userEntries = new Userentries;
				//insert
				$userEntries->user_id 						= 	$userId;
				$userEntries->mood_id 						= 	$moodId;
				$userEntries->entry_option 					= 	$optionId;
				$userEntries->type_daily_weekly_monthly 	= 	$type;
				$userEntries->created_at 					= 	$createdAt;
				$userEntries->save();
				$lastInsertedId		=	$userEntries->id;
				
				if($lastInsertedId) {					
					//insert to user_gratitude
					$userReflection = new Useractionitem;
					$userReflection->user_id 	= 	$userId;
					$userReflection->entries_id 			= 	$lastInsertedId;
					$userReflection->specific_task 	= 	$question1;
					$userReflection->actionable_step 	= 	$question2;
					$userReflection->improve_your_well_being 	= 	$question3;
					$userReflection->next_step 	= 	$question4;
					$userReflection->task_have_you_been_procrastinating  	= 	$question5;
					$userReflection->created_at 					= 	$createdAt;
					$userReflection->save();
				}
				DB::commit();
			}catch(\Exception $e){
				echo $e->getMessage();
				DB::rollBack();
				echo 'error'; 
				exit;
			}
		}
		echo 'success'; 
		exit;
	}
}
