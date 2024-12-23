<?php 
if($isResultreleased == 0) {
?>
<div class="tab-pane fade show active" id="eq-skills-content" role="tabpanel" aria-labelledby="reported-results-tab">
	<div class="tab-content py-4 px-4">
		<div class="alert alert-warning">
		  <strong>Sorry!</strong> Result for this report is not yet released.
		</div>
	</div>
</div>

<?php 
die;
}
if(!$surveyResults) {
?>
<div class="tab-pane fade show active" id="eq-skills-content" role="tabpanel" aria-labelledby="reported-results-tab">
                          <div class="tab-content py-4 px-4">
<div class="alert alert-warning">
  <strong>Sorry!</strong> No Content to display.
</div>

<div class="btn-info d-flex justify-content-center gap-3" style="margin-top: 20px;">
                                <a class=" btn-info-comman btn-previous" onclick="showContent('interpretingtab');" href="javascript:void(0);">Previous</a>
                                <a class="btn-info-comman btn-next" onclick="showContent('eqdimensioncompetencies');" href="javascript:void(0);">Next</a>
                            </div>
                            </div>
                            </div>
<?php
} else {
$data = $surveyResults->results;
$survey_score = json_decode($data);
$contaner1ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container1.png";
// echo '<pre>'; print_r($survey_score); die; 
?>

<div class="tab-content tabs-vertical" id="eq-skills-content">
<div class="tab-content py-4 px-4">
	<h1>Your Occupational Activity Groupings (OAG) Profile</h1> 
	<p>The bar chart below shows your results for the eleven OAG areas. Keep in mind it is based on your responses to the Core
	  Factors Career Path instrument. It is important that you read the descriptions presented in the previous section in order to
	  understand the specifics of each of the OAG areas.</p>
	
	  <div class="row-colum">
		<div class="text-center p-2 title-bg-modified">Your Occupational Activity Groupings (OAG) Profile</div>
		<div class="colum_box_wrap wight_bg colum_box_wrap_1 flex modified-report modified-report-global">
		  <div class="left-text">
			<ul>
			  <li>Business/Management</li>
			  <li>Business/Financial</li>
			  <li>Digital Data</li>
			  <li>Mechanical</li>
			  <li>Scientific</li>
			  <li>Artistic</li>
			  <li>Social/Group Involvement</li>
			  <li>Home and Nature</li>
			  <li>Individual/Personal Service</li>
			  <li>Governmental Service</li>
			  <li>Health and Medical</li>
			</ul>
		  </div>
		  <div class="colum_chart">
			<div class="flex top-text">
			  <h5>Avoid</h5>
			  <h5>Prefer</h5>
			</div>
			<div class="top-bottom">
			  <ul class="flex">
				<li>High</li>
				<li>Mid</li>
				<li>Low</li>
				<li>Mid</li>
				<li>High</li>
			  </ul>
			</div>
			<div class="chart_row_colum">

			  <div class="row__column_bg top-img-1">
				<div class="management">
				  <img src="<?php echo $contaner1ImageCareerPath; ?>" alt="container1">
				</div>
			  </div>

			</div>
		  </div>
		</div>
	  </div>
	
	  <div id="interpreting-oag-profile" class="mt-4 pt-3">
		  <h2 class="heading-inner-comman">Interpreting Your OAG Profile</h2>
		  <p>When trying to learn what your OAG Profile means, it is important for you to keep in mind the following guidelines:
		  </p>
		  <ul class="tab-list-dot">
			<li>It is essential to recognize that the results of your assessment do not indicate any value or worth about you as an
			  individual. The results are a way of assisting you to categorize your results across the eleven OAG areas</li>
			<li>Your results can and will vary over time. Remember, these are based on natural preference and learned experiences.
				Retaking the Core Factors Career Path assessment after a few years in a new occupation or after continuing education
				could result in differences that have been developed over time.
			</li>
			<li>This profile does not present all of the statistical and mathematical information required to make meaningful
			  comparisons of “how much” of a difference exists between people. What can be compared are the differences in the
			  OAG areas, such as Avoid or Prefer (e.g., You report High Avoid in one area, and others report High Prefer).</li>
		  </ul>
	  </div>

	  <div id="your-prefer-oag-1" class="mt-4 pt-2">
		<h3 class="heading-inner-comman sub-title">Your Prefer OAG Results</h4>
		<ul class="tab-list-dot">
		  <li>The Prefer results that are in the Low-range (your shorter bars or ones that don’t show up at all) indicate that you either
			have had little experience with this area or the experience that you had has left you with little or no preference for
			these particular OAG (again, little or no Prefer does not mean little or no ability).</li>
		  <li>Bars that fall into your Mid-range of Prefer indicate a level of preference or interest in those particular OAG areas, to
			the extent that you know about the areas.
		  </li>                                 
		</ul>
	  <h4 class="heading-inner-comman sub-title pt-2">Your Avoid OAG Results</h4>
	  <ul class="tab-list-dot">
		<li>The Avoid results that fall into the Low-range (short bars or no Avoid) do not mean that you have a preference for that
		  area, but merely the absence of, or very little need to, Avoid and disapproval.</li>
		<li>Having a Low Avoid score can indicate that you have had little to no experience in that OAG area and have not had the
		  opportunity to learn that you dislike it or that you have had experience and only dislike a small portion of the activities
		  in that OAG area.                                  
		</li>              
		<li>Avoid results that fall into the Mid-range indicate that there are some parts of that OAG area that you have experienced
		  and would prefer to avoid (this is not an indication of ability or value).
		  </li>                   
	  </ul>  
	</div>

	<div id="area-by-area" class="mt-4">
	  <h5 class="heading-inner-comman">Area-by-Area Evaluation</h5>
	  <p>When reviewing your OAG results, take some time to examine the level of Avoid and Prefer for each OAG area one at a time.
		Review your results for Prefer and Avoid for each OAG area. If needed, return to the OAG descriptions and review. On some of
		your OAG results, the Prefer will be High (bar to the right) with little or no Avoid. In others, the Avoid will be High (bar to the left)
		with little or no Prefer indicated. This indicates that you know this OAG area enough to have a strong opinion or belief about
		that area. You are either attracted to it (Prefer) or dislike it and wish to Avoid it. Some bars may be of equal length in both
		directions, indicating that there are similar amounts of the OAG area that you prefer and avoid. This typically reveals that you
		have had some personal experience in the OAG area, resulting in differing experiences. When your results are Low or are
		missing on both sides, this can indicate no direct experience for that OAG or simply a neutral response (no real opinion) to the
		questions on the assessment.
		</p>
  </div>

  <div id="understanding-your-prefer" class="mt-4">
	<h6 class="heading-inner-comman">Understanding your Prefer and Avoid Pattern</h6>
	<p>Have you ever wondered why some days in your life seem more satisfying than others? Why is it that some individuals go to
	  college or complete a training program and then begin working in a career that they are very excited about and believe they will
	  enjoy for the rest of their lives, only to find their satisfaction level with their choice changing from day-to-day or disappearing
	  altogether? All jobs contain a collection of differing tasks and activities that are commonly performed in one or more work
	  environments or work settings. No one will find the “perfect” job, free from tasks and activities they wish to avoid. It is important
	  to realize that true satisfaction with your chosen career and occupation will come when you are able to structure and balance
	  the tasks and activities that are part of your daily work experience based on your personality and preferences.
	  </p>

	  <div class="understand-pref table-responsive">
		  <table class="table-striped-custom  mt-3" style="width:100%">
			<thead>
			  <th>Avoid Percentage </th>
			  <th>Occupational Activity Groupings (OAGs)</th>
			  <th>Prefer Percentage</th>
			</thead>
			<tbody>
			  <tr>
				<td><?php echo $survey_score->finalscalscoreA1; ?>%</td>
				<td>Business/Management</td>
				<td><?php echo $survey_score->finalscalscoreP1; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA2; ?>%</td>
			  <td>Business/Financial</td>
			  <td><?php echo $survey_score->finalscalscoreP2; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA3; ?>%</td>
			  <td>Digital Data</td>
			  <td><?php echo $survey_score->finalscalscoreP3; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA4; ?>%</td>
			  <td>Mechanical</td>
			  <td><?php echo $survey_score->finalscalscoreP4; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA5; ?>%</td>
			  <td>Scientific</td>
			  <td><?php echo $survey_score->finalscalscoreP5; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA6; ?>%</td>
			  <td>Artistic</td>
			  <td><?php echo $survey_score->finalscalscoreP6; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA7; ?>%</td>
			  <td>Social/Group Involvement</td>
			  <td><?php echo $survey_score->finalscalscoreP7; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA8; ?>%</td>
			  <td>Home and Nature</td>
			  <td><?php echo $survey_score->finalscalscoreP8; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA9; ?>%</td>
			  <td>Individual/Personal Service</td>
			  <td><?php echo $survey_score->finalscalscoreP9; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA10; ?>%</td>
			  <td>Governmental Service</td>
			  <td><?php echo $survey_score->finalscalscoreP10; ?>%</td>
			</tr>
			<tr>
			  <td><?php echo $survey_score->finalscalscoreA11; ?>%</td>
			  <td>Health and Medical</td>
			  <td><?php echo $survey_score->finalscalscoreP11; ?>%</td>
			</tr>
			</tbody>
		  </table>
	  </div>
  </div>

  <div id="preferred-tasks" class="mt-4 pt-4">
	  <h3 class="heading-inner-comman">Preferred Tasks, Activities and their Environments (Prefer OAGs) </h3>
	  <p>All careers are made of occupations and all occupations are made up of different jobs. You can think of the jobs as the different
		tasks/activities and their environment or settings within an occupation. You have developed a preference for some of the OAGs
		because you have found them to be rewarding and satisfying. The more knowledge or experience you have had with
		occupational and educational settings, the more awareness you will have about your own OAG patterns and preferences.
	  </p>

	  <div class="preferred-tasks-inner mt-4">
		  <div class="title">Preferred Tasks, Activities and their Environments (Prefer OAGs)</div>
		  <div class="inner-container">
			<p>Take a moment and look at your Prefer OAGs on the (right) side of the chart (refer to page 6 and page 8). Examine the
			  results and note which of the eleven OAG areas are your highest level of Prefer. Remember, this is what you’ve
			  reported having an interest in, and therefore a preference for. If you have no results that reach into the High Prefer
			  range, then the results that are your highest represent your high preferences. It is an important reminder that the
			  Low, Mid, and High zones shown on the graph do not indicate ability or value.</p>
			<div class="inner-title">My Top Preferred Occupational Activity Groupings (OAGs)</div>
			<div class="height-20"></div>
			<div class="height-20"></div>
			<div class="height-20"></div>
			<div class="height-20 mb-5"></div>
		</div>
		  
	  </div>
  </div>

  <div id="avoided-tasks" class="mt-4 pt-3">
	<h4 class="heading-inner-comman">Avoided Tasks, Activities and their Environments (Avoid OAGs) </h4>
	<p>It is normal and healthy to develop a dislike of, and a tendency to avoid, one or more of the OAG areas. Some individuals may
	  have a preference for the work environment of a group or team, while others would prefer one-on-one interaction. If the
	  experience that you have had with one of the particular OAG areas has been repeatedly uncomfortable for you, then you may
	  have the tendency to avoid or wish you could avoid the corresponding tasks/activities and environments in which they are
	  performed. Preferring to work alone does not necessarily indicate that you will dislike or avoid working within groups or teams.
	  Perhaps you have no experience in organizational group or team environments and will therefore report no opinion or little
	  need to avoid. Your strong dislikes will often show up as various avoidance behaviors that help you to reduce the discomfort
	  you find with that particular OAG area. As with the learned preferences (Prefer), it is important to recognize that your pattern of
	  Avoid OAG may change over time with your experiences and development.
	</p>

	<div class="preferred-tasks-inner mt-5 mb-5">
		<div class="title">Avoided Tasks, Activities and their Environments (Avoid OAGs)</div>
		<div class="inner-container">
		  <p>Review your Avoid OAGs on the left side of the chart, noting all of the results that are your highest. These represent
			the OAG areas for which you have reported your strongest dislike. As with the Prefer OAGs, this does not reflect any
			sense of value toward you or your abilities in those areas. If you report a High level of Avoid, you may have had a good
			deal of experience in that area and decided that you do not like that area. This does not mean that you would not be
			able to work or perform well in that area. All of the Avoid OAG results represent your responses that you dislike
			something. You have had some experience or knowledge of those OAG areas and you would prefer not to have an
			experience in them at present. The dislike that you have reported is based on your experiences.
			</p>
		  <div class="inner-title">My Top Avoid Occupational Activity Groupings (OAGs)
		  </div>
		  <div class="height-20"></div>
		  <div class="height-20"></div>
		  <div class="height-20"></div>
		  <div class="height-20 mb-5"></div>
	  </div>
		
	</div>
</div>
<hr/>

<div class="btn-info d-flex justify-content-center gap-3">
	<a class=" btn-info-comman btn-previous" onclick="showContentcp('careeroccupation');" href="javascript:void(0);">Previous</a>
	<a class="btn-info-comman btn-next" onclick="showContentcp('gia-tab');" href="javascript:void(0);">Next</a>
</div>
</div>
</div>
<?php } ?>                   