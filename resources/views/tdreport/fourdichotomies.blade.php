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
$contaner1ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container1.png";	
$contaner2ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container2.png";	
$contaner3ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container3.png";	
$contaner4ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container4.png";	
	
?>
<div class="tab-content tabs-vertical" id="fourDichotomiesTabContent">
<div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
  <div class="tab-content py-4 px-4">                            
	<h3>The Four Dichotomies</h3>
	<p class="mb-4">Psychological type describes four core dichotomies that are innate features of your personality. Each of the four dichotomies contains
	  two opposing preferences. The two preferences are seen as psychologically opposite ways of being. Everyone can function at both ends
	  of these dichotomies, although we will have a natural preference for one way over the other. The four dichotomies are</p>
	
	<h4>The <i>Core Factors Type Discovery</i> assessment reports preferences on four
	  dichotomies, with two opposing preferences on each dichotomy.</h4>
	
	<div class="four-dichotomies-section mt-5">
	  <div class="d-flex justify-content-between four-dechotomies-header">
		  <div class="four-dechotomies-title text-uppercase">EXTERNAL</div>
		  <div class="innder-four-dechotomies-title text-uppercase">ENERGY ACQUISITION AND DISTRIBUTION</div>
		  <div class="four-dechotomies-title text-uppercase">INTERNAL</div>
	  </div>

	  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
		  <div class="four-dechotomies-inner text-uppercase">E</div>
		  <div class="innder-four-dechotomies-text text-center">Energy acquisition and distribution is the focus of attention and the direction of the source
			of psychological energy. The two directions of focus and energy are Extraversion (external)
			and Introversion (internal).</div>
		  <div class="four-dechotomies-inner text-uppercase">I</div>
	  </div>
	</div>


	<div class="four-dichotomies-section mt-4">
	  <div class="d-flex justify-content-between four-dechotomies-header">
		  <div class="four-dechotomies-title text-uppercase">Sensing</div>
		  <div class="innder-four-dechotomies-title text-uppercase">PERCEIVING OR ATTENDING TO INFORMATION</div>
		  <div class="four-dechotomies-title text-uppercase">iNtuiting</div>
	  </div>

	  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
		  <div class="four-dechotomies-inner text-uppercase">S</div>
		  <div class="innder-four-dechotomies-text text-center">Perceiving or attending to information is the mental process by which one takes in or
			attends to information about physical surroundings and concepts. The two forms of
			perception are Sensing and iNtuiting.</div>
		  <div class="four-dechotomies-inner text-uppercase">n</div>
	  </div>
	</div>

	<div class="four-dichotomies-section mt-4">
	  <div class="d-flex justify-content-between four-dechotomies-header">
		  <div class="four-dechotomies-title text-uppercase">THINKING</div>
		  <div class="innder-four-dechotomies-title text-uppercase">DECIDING OR MAKING JUDGMENTS</div>
		  <div class="four-dechotomies-title text-uppercase">FEELING</div>
	  </div>

	  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
		  <div class="four-dechotomies-inner text-uppercase">T</div>
		  <div class="innder-four-dechotomies-text text-center">Deciding or making judgments is the mental process of forming decisions about the perceived information that is gathered. The two forms of judgment are Thinking and Feeling.</div>
		  <div class="four-dechotomies-inner text-uppercase">F</div>
	  </div>
	</div>

	<div class="four-dichotomies-section mt-4">
	  <div class="d-flex justify-content-between four-dechotomies-header">
		  <div class="four-dechotomies-title text-uppercase">JUDGMENT</div>
		  <div class="innder-four-dechotomies-title text-uppercase">METHOD FOR LIFE INTERACTION/ORIENTATION</div>
		  <div class="four-dechotomies-title text-uppercase">PERCEPTION</div>
	  </div>

	  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
		  <div class="four-dechotomies-inner text-uppercase">J</div>
		  <div class="innder-four-dechotomies-text text-center">Orientation to living is the mental process used or lifestyle favored for interaction with the outside world. The two methods of orientation correspond to the mental functions of Judgment and Perception.</div>
		  <div class="four-dechotomies-inner text-uppercase">P</div>
	  </div>
	</div>

	<div class="row mt-5" id="extraversion-introversion">
		<div class="col-md-12 mt-3">
		   <h2 class="heading-inner-comman mb-5">Extraversion / Introversion</h2>

		   <div class="four-dichotomies-section mt-4 mb-3">
			<div class="d-flex justify-content-between four-dechotomies-header">
				<div class="four-dechotomies-title text-uppercase">EXTERNAL</div>
				<div class="innder-four-dechotomies-title text-uppercase">ENERGY ACQUISITION AND DISTRIBUTION</div>
				<div class="four-dechotomies-title text-uppercase">INTERNAL</div>
			</div>

			<div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
				<div class="four-dechotomies-inner text-uppercase">E</div>
				<div class="innder-four-dechotomies-text text-center">Energy acquisition and distribution is the focus of attention and the direction of the source
				  of psychological energy. The two directions of focus and energy are Extraversion (external)
				  and Introversion (internal).</div>
				<div class="four-dechotomies-inner text-uppercase">I</div>
			</div>
		  </div>

		  <p>What is psychological energy? We all have activities that we prefer to engage in. Some of these preferred activities will stimulate
			increased excitement, pleasure, and well-being experiences (thoughts and feelings). Conversely, some activities reduce or
			deplete our experience of excitement, pleasure, and well-being. These non-preferred activities may result in frustration,
			boredom, and irritation.</p>
		  
		  <div class="row">
			  <div class="col-md-6">
				<div class="text-center p-1 title-bg-modified rounded">EXTRAVERSION</div>
				<p class="py-3">Individuals who prefer the extraversion end of this dichotomy
				  will receive energy from and direct energy to the outer world.
				  External energy will be most commonly expressed by action and
				  interaction. They will tend to process their lives through verbal
				  statements and discussion. They enjoy going and doing, often
				  seeking action and activities involving conversation and
				  connecting. Although comfortable thinking quietly and
				  reflecting, these non-external tasks tend to be accomplished in
				  shorter bursts, interspersed by the motivation to participate in
				  the external environment.
				  </p>
			  </div>
			  <div class="col-md-6">
				<div class="text-center p-1 title-bg-modified rounded">INTROVERSION</div>
				<p class="pt-3">Those who prefer introversion will choose to restrict or
				  moderate their connection with the external environment to
				  facilitate the reflective contemplation that provides the source
				  of their psychological energy. While no less appreciative of
				  human interaction than their external opposites, they may
				  prefer quiet and less crowded interpersonal experiences, which
				  leave adequate pause for contemplative thought to facilitate
				  and engage in the interaction. With the internal preference, the
				  stimulation from the external world is manifested in the
				  energizing reflective thought of or about life's experiences.</p>
			  </div>
		  </div>

		  <div class="row-colum">
			<div class="text-center p-2 title-bg-modified">Your responses to the assessment indicate a preference for: &nbsp;&nbsp;&nbsp;Introversion</div>
			<div class="overflow-x-auto">
			<div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
			  <div class="colum_chart type-element-chart">
				<div class="chart_row_colum">              
				  <div class="row__column_bg top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center">
					<div class="big-title-text pt-3 pe-4 fw-semibold">Extraversion</div>
					<div class="small-title-text pt-3 pe-4 fs-2 four-dechotomies-inner">E</div>
					<div class="management">
					  <div class="top-bottom">
						<ul class="d-flex list-none justify-content-between mb-0 px-2 fs-6">
						  <li>VERY CLEAR</li>
						  <li>CLEAR</li>
						  <li>SLIGHT</li>
						  <li>UNCLEAR</li>
						  <li>UNCLEAR</li>
						  <li>SLIGHT</li>
						  <li>CLEAR</li>
						  <li>VERY CLEAR</li>
						</ul>
					  </div>
					  <img src="<?php echo $contaner1ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
					</div>                                           
					<div class="small-title-text pt-3 ps-4 fs-2 four-dechotomies-inner">I</div>
					<div class="big-title-text  pt-3 ps-4 fw-semibold">Introversion</div>
				  </div>

				</div>
			  </div>
			</div>
		  </div>
		  </div>
		</div>
	</div>

	<div class="row mt-5" id="sensing-intuiting">
	  <div class="col-md-12 mt-3">
		 <h3 class="heading-inner-comman">Sensing / iNtuiting</h3>

		 <div class="four-dichotomies-section mt-4 mb-3">
		  <div class="d-flex justify-content-between four-dechotomies-header">
			  <div class="four-dechotomies-title text-uppercase">Sensing</div>
			  <div class="innder-four-dechotomies-title text-uppercase">PERCEIVING OR ATTENDING TO INFORMATION</div>
			  <div class="four-dechotomies-title text-uppercase">iNtuiting</div>
		  </div>

		  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
			  <div class="four-dechotomies-inner text-uppercase">S</div>
			  <div class="innder-four-dechotomies-text text-center">Perceiving or attending to information is the mental process by which one
				takes in or attends to information about physical surroundings and concepts.
				The two forms of perception are Sensing and iNtuiting.</div>
			  <div class="four-dechotomies-inner text-uppercase">N</div>
		  </div>
		</div>

		<p>The dimension of perception contains the dichotomy of Sensing and iNtuiting. These preferences underlie the functional
		  processes that occur when we attend to sensory information (current or from memory) originating from the surrounding
		  physical world. We all take in information from our environment through the five natural senses. We see, hear, smell, taste, and
		  touch the surrounding world and will subsequently have memories of those sensory experiences. What we experience is the
		  same for all of us until it enters this perception processing function. There is an automatic tendency to process the information
		  in two basic ways.</p>
		
		<div class="row">
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">SENSING</div>
			  <p class="py-3">Sensing is preferred when the perceptive process focuses on a
				pragmatic and factual experience. Those with this preference
				believe that the facts speak for themselves, and there is seldom
				a need to go beyond them. They will typically find comfort in
				viewing the tried and true methods of accomplishing tasks as a
				sufficient, if not necessary, course of action. Past experiences
				can provide concrete foundations for answers to the questions
				that arise when information is perceived. This preference may
				lead the sensing-preferring individual into fact-finding forays to
				answer the questions of “How, What, When, or Where?” They
				have a realistic perspective that is anchored in the comfortable
				foundation of pragmatism and facts.
				</p>
			</div>
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">INTUITING</div>
			  <p class="pt-3">
				Those who prefer iNtuiting have a perceptual preference to look
				for the possibilities and relationships among the facts and their
				corresponding ideas. This preference is expressed in their desire
				for theoretical overviews that allow for flexibility in interpreting
				and applying information. The processing of factual information
				tends to occur only to the extent that those facts possess utility
				for innovation and change. Authentic details are merely
				elements of the connections in this perception experience and
				may be overlooked or set aside during the processing. The
				“what may be” focus of these individuals will tend to keep them
				engaged in future-oriented thinking.
			  </p>
			</div>
		</div>

		<div class="row-colum mb-5">
		  <div class="text-center p-2 title-bg-modified">Your responses to the assessment indicate a preference for: &nbsp;&nbsp;&nbsp;iNtuiting</div>
		  <div class="overflow-x-auto">
		  <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
			<div class="colum_chart type-element-chart">
			  <div class="chart_row_colum">              
				<div class="row__column_bg top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center">
				  <div class="big-title-text pt-3 pe-4 fw-semibold">Sensing</div>
				  <div class="small-title-text pt-3 pe-4 fs-2 four-dechotomies-inner">S</div>
				  <div class="management">
					<div class="top-bottom">
					  <ul class="d-flex list-none justify-content-between mb-0 px-2 fs-6">
						<li>VERY CLEAR</li>
						<li>CLEAR</li>
						<li>SLIGHT</li>
						<li>UNCLEAR</li>
						<li>UNCLEAR</li>
						<li>SLIGHT</li>
						<li>CLEAR</li>
						<li>VERY CLEAR</li>
					  </ul>
					</div>
					<img src="<?php echo $contaner2ImageCareerPath; ?>" class="w-100" alt="container2" height="auto">
				  </div>                                           
				  <div class="small-title-text pt-3 ps-4 fs-2 four-dechotomies-inner">N</div>
				  <div class="big-title-text  pt-3 ps-4 fw-semibold">iNtuiting</div>
				</div>

			  </div>
			</div>
		  </div>
		</div>
		</div>
	  </div>
	</div>

	<div class="row mt-2" id="thinking-feeling">
	  <div class="col-md-12 mt-3">
		 <h3 class="heading-inner-comman">Thinking / Feeling</h3>

		 <div class="four-dichotomies-section mt-4 mb-3">
		  <div class="d-flex justify-content-between four-dechotomies-header">
			  <div class="four-dechotomies-title text-uppercase">Thinking</div>
			  <div class="innder-four-dechotomies-title text-uppercase">DECIDING OR MAKING JUDGMENTS</div>
			  <div class="four-dechotomies-title text-uppercase">Feeling</div>
		  </div>

		  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
			  <div class="four-dechotomies-inner text-uppercase">t</div>
			  <div class="innder-four-dechotomies-text text-center">Deciding or making judgments is the mental process of forming decisions
				about the perceived information that is gathered. The two forms of
				judgment are Thinking and Feeling.</div>
			  <div class="four-dechotomies-inner text-uppercase">f</div>
		  </div>
		</div>

		<p>The personality dichotomy of making judgments or decisions includes the preferences for using either logical thinking
		  processes or relationship and value motivated thoughts in making choices. Everyone thinks and everyone has feelings about
		  thoughts and experiences. Some decisions may focus upon yielding the best outcome, while others may seek to produce what
		  works best for all involved. These two different ways of making judgments and decisions are equally valuable for work and
		  home life. The accuracy of the decisions that we make is important. This dichotomy represents the two different ways of
		  establishing what accuracy is.
		  </p>
		
		<div class="row">
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">THINKING</div>
			  <p class="py-3">Sensing is preferred when the perceptive process focuses on a
				The preference for making judgments through logical thinking
				involves a need for logical clarity. This clarity occurs when
				perceptual information is objectively evaluated based on strict
				logical criteria. Generally, this decision-making process will
				follow a consistent logical pattern: “If this is true, and this is true,
				then this is the best choice.” The “right” thing to do is to choose
				the best outcome. Feelings or emotional interactions with the
				decision, while they always occur, are seldom viewed as
				necessary. This is because the deciding action is a process with
				rules that simply weigh the pros and cons of the service
				(support) of the outcome.
				</p>
			</div>
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">FEELING</div>
			  <p class="pt-3">
				Individuals who prefer Feeling judgments and decisions make
				choices based on beliefs, values, and ideals they believe will lead
				to greater inner and external resonance in the overall situation.
				They are keenly attuned to the effect of decisions on others and
				seek to implement decisions that enhance relationships. They
				often need to process the emotional and interpersonal
				consequences of decisions. Those who prefer feeling judgments
				view the consensus-forming process as integral to the
				conclusions being made.
			  </p>
			</div>
		</div>

		<div class="row-colum mb-5">
		  <div class="text-center p-2 title-bg-modified">Your responses to the assessment indicate a preference for: &nbsp;&nbsp;&nbsp;Feeling</div>
		  <div class="overflow-x-auto">
		  <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
			<div class="colum_chart type-element-chart">
			  <div class="chart_row_colum">              
				<div class="row__column_bg top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center">
				  <div class="big-title-text pt-3 pe-4 fw-semibold">Thinking</div>
				  <div class="small-title-text pt-3 pe-4 fs-2 four-dechotomies-inner">T</div>
				  <div class="management">
					<div class="top-bottom">
					  <ul class="d-flex list-none justify-content-between mb-0 px-2 fs-6">
						<li>VERY CLEAR</li>
						<li>CLEAR</li>
						<li>SLIGHT</li>
						<li>UNCLEAR</li>
						<li>UNCLEAR</li>
						<li>SLIGHT</li>
						<li>CLEAR</li>
						<li>VERY CLEAR</li>
					  </ul>
					</div>
					<img src="<?php echo $contaner3ImageCareerPath; ?>" class="w-100" alt="container3" height="auto">
				  </div>                                           
				  <div class="small-title-text pt-3 ps-4 fs-2 four-dechotomies-inner">F</div>
				  <div class="big-title-text  pt-3 ps-4 fw-semibold">Feeling</div>
				</div>

			  </div>
			</div>
		  </div>
		</div>
		</div>
	  </div>
	</div>

	<div class="row mt-2" id="judgment-perception">
	  <div class="col-md-12 mt-3">
		 <h3 class="heading-inner-comman">Judgment / Perception</h3>

		 <div class="four-dichotomies-section mt-4 mb-3">
		  <div class="d-flex justify-content-between four-dechotomies-header">
			  <div class="four-dechotomies-title text-uppercase">Judgment</div>
			  <div class="innder-four-dechotomies-title text-uppercase">METHOD FOR LIFE INTERACTION/ORIENTATION</div>
			  <div class="four-dechotomies-title text-uppercase">Perception</div>
		  </div>

		  <div class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
			  <div class="four-dechotomies-inner text-uppercase">j</div>
			  <div class="innder-four-dechotomies-text text-center">Orientation to living is the mental process used or lifestyle favored for
				interaction with the outside world. The two methods of orientation
				correspond to the mental functions of Judgment and Perception.</div>
			  <div class="four-dechotomies-inner text-uppercase">p</div>
		  </div>
		</div>

		<p>This dichotomy contains the two methods that are preferred for interacting with or orienting to life and living. It involves the
		  opposite preferences of life by making decisions and judgments as opposed to life through perceptual experience. These two
		  polar preferences represent what we see as we observe one another during the process of our daily lives. This dichotomy is in
		  essence an innate expression of the individual’s mental style of living; we will prefer to “choose or experience” life. We are all
		  able to learn to do elements of both ends of this dichotomy, but there is one that will be preferred the most.
		  </p>
		
		<div class="row">
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">JUDGMENT</div>
			  <p class="py-3">Individuals who prefer living through judgments and decisions
				enjoy planning and processing daily experiences. Comfort is
				experienced through the methodical organization of tasks and
				activities. Satisfaction is achieved as each of the day’s set goals is
				completed. When those who prefer Judging are aware of the
				plans for events and activities, then they experience an
				assurance that the necessary tasks and goals will be finished in
				the allotted time. Interruptions in the plan or method can create
				frustration and distract these individuals. The preference to
				decide, act, and have closure on life’s events naturally pleases
				them. Getting an early start on an activity or task promotes wellbeing and peace.
				</p>
			</div>
			<div class="col-md-6">
			  <div class="text-center p-1 title-bg-modified rounded">PERCEPTION</div>
			  <p class="pt-3">
				The preference for living life through the process of perception
				is indicated when the experience of life is the desired process.
				Individuals who prefer the perceiving end of this dichotomy will
				tend to set life's events in a flexible and open-ended style. For
				these individuals, deadlines are met, but the process to achieve
				goals may be expressed or unfold over time. Unscheduled
				interruptions are viewed as a natural part of living with little
				stress or concern over the resulting diversions. Changes in plans
				or decisions regarding processes are viewed as elements of the
				emergent lifestyle. They can become bored or irritated with the
				restrictions of rigid schedules or guidelines.
			  </p>
			</div>
		</div>

		<div class="row-colum mb-5">
		  <div class="text-center p-2 title-bg-modified">Your responses to the assessment indicate a preference for: &nbsp;&nbsp;&nbsp;Perception</div>
		  <div class="overflow-x-auto">
		  <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
			<div class="colum_chart type-element-chart">
			  <div class="chart_row_colum">              
				<div class="row__column_bg top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center">
				  <div class="big-title-text pt-3 pe-4 fw-semibold">Judgment</div>
				  <div class="small-title-text pt-3 pe-4 fs-2 four-dechotomies-inner">j</div>
				  <div class="management">
					<div class="top-bottom">
					  <ul class="d-flex list-none justify-content-between mb-0 px-2 fs-6">
						<li>VERY CLEAR</li>
						<li>CLEAR</li>
						<li>SLIGHT</li>
						<li>UNCLEAR</li>
						<li>UNCLEAR</li>
						<li>SLIGHT</li>
						<li>CLEAR</li>
						<li>VERY CLEAR</li>
					  </ul>
					</div>
					<img src="<?php echo $contaner4ImageCareerPath; ?>" class="w-100" alt="container4" height="auto">
				  </div>                                           
				  <div class="small-title-text pt-3 ps-4 fs-2 four-dechotomies-inner">P</div>
				  <div class="big-title-text  pt-3 ps-4 fw-semibold">Perception</div>
				</div>

			  </div>
			</div>
		  </div>
		</div>
		</div>
	  </div>
	</div>


	<hr/>

	<div class="btn-info d-flex justify-content-center gap-3">
		<a class=" btn-info-comman btn-previous" onclick="showContenttd('introductiontd');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next" onclick="showContenttd('typedimensionresults');" href="javascript:void(0);">Next</a>
	</div>
  </div>
</div>                        
</div>
<?php
}
?>              