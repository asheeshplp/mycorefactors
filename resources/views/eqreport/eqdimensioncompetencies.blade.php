<?php 
if($isResultreleased == 0) {
?>
<div class="tab-pane fade show active" id="reported-results" role="tabpanel" aria-labelledby="reported-results-tab">
	<div class="tab-content py-4 px-4">
		<div class="alert alert-warning">
		  <strong>Sorry!</strong> Result for this report is not yet released.
		</div>
	</div>
</div>

<?php 
die;
}  
if(!$answersArr) {
?>
<div class="tab-pane fade show active" id="reported-results" role="tabpanel" aria-labelledby="reported-results-tab">
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
?>
 <div class="tab-pane fade show active" id="self-awareness" role="tabpanel" aria-labelledby="selfAwarenessTab">
                          <div class="tab-content py-4 px-4">
<h1>Specific EQ Dimension Competencies and Ratings</h1>
<div id="SelfAwarenessPerceptions" class="mt-4">
  <h2>Self-Awareness Perceptions </h2>
	<div class="inner-tab-section">
	<div class="row mb-4">
	  <div class="col-md-12">
		<div class="tab-box h-100">
		  <div class="box-title-comman box-title-bg-1">Self-Awareness Perceptions (Skill Definitions)</div>
		  <ul>
			<li><strong>Self-actualization:</strong> Pursuing activities that lead to a personally meaningful life; becoming more of your best self</li>
			<li><strong>Self-confidence:</strong> Believing in your worth — your abilities, qualities and judgment — and behaving accordingly</li>
			<li><strong>Authenticity:</strong> Living a life that is true to your values and beliefs; being genuine and transparent with others, even when it is difficult to do so</li>
			<li><strong>Accurate Self-assessment:</strong> Seeing yourself clearly—knowing your strengths and limits</li>
			<li><strong>Congruence:</strong> Behaving in ways consistent with your feelings, values, and attitudes as demonstrated by decisions and actions; walking your talk</li>
			<li><strong>Mindfulness:</strong> Focusing on the present moment and suspending both internal chatter and also external distractions to allow clarity and composure</li>
			<li><strong>Independence:</strong> Thinking for yourself and making decisions based on personal values and beliefs while considering, but not being overly influenced by, the feelings, needs and desires of others</li>
			<li><strong>Integrity:</strong> Behaving consistently with your values, principles and motives; being trustworthy, truthful and candid; doing the right thing even when no one is looking</li>
			<li><strong>Resilience:</strong> Bouncing back from difficult events and stressful situations by employing effective strategies to recover quickly and maximize well-being.</li>
			<li><strong>Stamina:</strong> Persisting with mental and physical energy in the face of difficulties, obstacles or disappointments</li>
		  </ul>
		  
		</div>
		
	  </div>
	</div>

	<div class="info-tab-box">
	  <p class="mb-0"><strong>Remember:</strong> You rated the degree of Importance to your success and your Effectiveness in demonstrating these behaviors on a seven-point scale with 1=Not Important or Ineffective to a 7=as Mission Critical importance or Exemplary effectiveness.</p>
	</div>

	<div class="row pb-4 mt-4">
	  <div class="col-md-12">
	   
		<div class="table-responsive table-domain-score mb-4">
		  <table class="table-domain-score-inner w-100">
			<thead class="table-primary-dark bg-1">
			  <tr style="background-color: #67396E;">
				<th>EQ Skills</th>
				<th>Effectiveness</th>
				<th>Importance</th>
				<th>Gap</th>
			  </tr>
			</thead>
			<tbody class="border-custom-td">
				<?php 
				if($firstKey == 'SelfactualizationGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">				 
				<td><span class="custom-bold-td">Self-actualization	</span></td>
				<td><?php echo $answersArr[0]['answer']; ?></td>
				<td><?php echo $answersArr[1]['answer']; ?></td>
				<td><?= $SelfactualizationGap >= 0 ? $SelfactualizationGap : $starIcon; ?></td>
			  </tr>
			  <?php if($firstKey == 'SelfconfidenceGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Self-confidence</span></td>
				<td><?php echo $answersArr[2]['answer']; ?></td>
				<td><?php echo $answersArr[3]['answer']; ?></td>
				<td><?= $SelfconfidenceGap >= 0 ? $SelfconfidenceGap : $starIcon; ?></td>
			  </tr>
			  <?php if($firstKey == 'AuthenticityGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Authenticity</span></td>
				<td><?php echo $answersArr[4]['answer']; ?></td>
				<td><?php echo $answersArr[5]['answer']; ?></td>
				<td><?= $AuthenticityGap >= 0 ? $AuthenticityGap : $starIcon; ?></td>
			  </tr> 
			  <?php if($firstKey == 'AccurateSelfassessmentGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Accurate Self-assessment</span></td>
				<td><?php echo $answersArr[6]['answer']; ?></td>
				<td><?php echo $answersArr[7]['answer']; ?></td>
				<td><?= $AccurateSelfassessmentGap >= 0 ? $AccurateSelfassessmentGap : $starIcon; ?></td>
			  </tr> 
			  <?php if($firstKey == 'CongruenceGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Congruence</span></td>
				<td><?php echo $answersArr[8]['answer']; ?></td>
				<td><?php echo $answersArr[9]['answer']; ?></td>
				<td><?= $CongruenceGap >= 0 ? $CongruenceGap : $starIcon; ?></td>
			  </tr>
				<?php if($firstKey == 'MindfulnessGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>			  
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Mindfulness</span></td>
				<td><?php echo $answersArr[10]['answer']; ?></td>
				<td><?php echo $answersArr[11]['answer']; ?></td>
				<td><?= $MindfulnessGap >= 0 ? $MindfulnessGap : $starIcon; ?></td>
			  </tr> 
			  <?php if($firstKey == 'IndependenceGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Independence</span></td>
				<td><?php echo $answersArr[12]['answer']; ?></td>
				<td><?php echo $answersArr[13]['answer']; ?></td>
				<td><?= $IndependenceGap >= 0 ? $IndependenceGap : $starIcon; ?></td>
			  </tr> 
			  <?php if($firstKey == 'IntegrityGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Integrity</span></td>
				<td><?php echo $answersArr[14]['answer']; ?></td>
				<td><?php echo $answersArr[15]['answer']; ?></td>
				<td><?= $IntegrityGap >= 0 ? $IntegrityGap : $starIcon; ?></td>
			  </tr> 
				<?php if($firstKey == 'ResilienceGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
				<tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Resilience</span></td>
				<td><?php echo $answersArr[16]['answer']; ?></td>
				<td><?php echo $answersArr[17]['answer']; ?></td>
				<td><?= $ResilienceGap >= 0 ? $ResilienceGap : $starIcon; ?></td>
			  </tr> 
			  <?php if($firstKey == 'StaminaGap') { $class = 'custom-bold-td'; } else { $class = ''; } ?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Stamina</span></td>
				<td><?php echo $answersArr[18]['answer']; ?></td>
				<td><?php echo $answersArr[19]['answer']; ?></td>
				<td><?= $StaminaGap >= 0 ? $StaminaGap : $starIcon; ?></td>
			  </tr> 
													
			</tbody>
		  </table>                              
		</div>
	  </div>
	</div>
  </div>
	
</div>
<div id="SelfRegulation" class="mt-2">
  <h4>Self-Regulation </h4>
  <div class="inner-tab-section">
	<div class="row mb-4">
	  <div class="col-md-12">
		<div class="tab-box h-100">
		  <div class="box-title-comman box-title-bg-3">Self-Regulation (Skill Definitions)</div>
		  <ul>
			<li><strong>Impulse Control:</strong> Recognizing emotional triggers as a signal to slow down, think before acting and choose a constructive response</li>
			<li><strong>Emotional Self-control:</strong> Recognizing emotional triggers to exercise self-restraint</li>
			<li><strong>Intentionality:</strong> Acting with purpose, direction and clear will toward a specific outcome or goal</li>
			<li><strong>Accurate Self-assessment:</strong> Seeing yourself clearly—knowing your strengths and limits</li>
			<li><strong>Self-Disclosure:</strong> Sharing information about yourself with others, appropriately and in the face of risk or Vulnerability</li>
			<li><strong>Adaptability:</strong> Responding effectively to multiple demands, ambiguity, emerging situations, shifting priorities, and rapid change</li>
			<li><strong>Openness:</strong> Being receptive to others’ feelings, thoughts and ideas</li>
			<li><strong>Tolerance:</strong> Listening to and appreciating differing perspectives and ideas; valuing diversity</li>
			<li><strong>Perspective-Taking:</strong> Considering various points of view or assumptions about a situation; seeking alternative options and choices</li>
			<li><strong>Optimism:</strong> Expecting that things will turn out well, that good will triumph; finding positive meaning or perspective in any situation</li>
			<li><strong>Reality Testing:</strong> Understanding and reacting to the way things are rather than responding to the way you wish, fear, imagine or assume them to be</li>
		  </ul>                                      
		</div>
	  </div>                                  
	</div>
	<div class="info-tab-box">
	  <p class="mb-0"><strong>Remember:</strong>  You rated the degree of Importance to your success and your Effectiveness in demonstrating these behaviors on a seven-point scale with 1=Not Important or Ineffective to a 7=as Mission Critical importance or Exemplary effectiveness.</p>
	</div>

	<div class="row pb-4 mt-4">
	  <div class="col-md-12">
	  
		<div class="table-responsive table-domain-score mb-4">
		  <table class="table-domain-score-inner w-100">
			<thead class="table-primary-dark box-title-bg-3">
			  <tr>
				<th>EQ Skills</th>
				<th>Effectiveness</th>
				<th>Importance</th>
				<th>Gap</th>
			  </tr>
			</thead>
			<tbody class="border-custom-td">
			<?php 
				if($secondKey == 'ImpulseControlGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Impulse Control	</span></td>
				<td><?php echo $answersArr[20]['answer']; ?></td>
				<td><?php echo $answersArr[21]['answer']; ?></td>
				<td><?= $ImpulseControlGap >= 0 ? $ImpulseControlGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($secondKey == 'EmotionalselfcontrolGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Emotional Self-control	</span></td>
				<td><?php echo $answersArr[22]['answer']; ?></td>
				<td><?php echo $answersArr[23]['answer']; ?></td>
				<td><?= $EmotionalselfcontrolGap >= 0 ? $EmotionalselfcontrolGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($secondKey == 'IntentionalityGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Intentionality</span></td>
				<td><?php echo $answersArr[24]['answer']; ?></td>
				<td><?php echo $answersArr[25]['answer']; ?></td>
				<td><?= $IntentionalityGap >= 0 ? $IntentionalityGap : $starIcon; ?></</td>
			  </tr> 
			  <?php 
				if($secondKey == 'SelfDisclosureGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Self-Disclosure</span></td>
				<td><?php echo $answersArr[26]['answer']; ?></td>
				<td><?php echo $answersArr[27]['answer']; ?></td>
				<td><?= $SelfDisclosureGap >= 0 ? $SelfDisclosureGap : $starIcon; ?></td>
			  </tr> 
			  <?php 
				if($secondKey == 'AdaptabilityGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Adaptability</span></td>
				<td><?php echo $answersArr[28]['answer']; ?></td>
				<td><?php echo $answersArr[29]['answer']; ?></td>
				<td><?= $AdaptabilityGap >= 0 ? $AdaptabilityGap : $starIcon; ?></td>
			  </tr> 
			  <?php 
				if($secondKey == 'OpennessGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Openness</span></td>
				<td><?php echo $answersArr[30]['answer']; ?></td>
				<td><?php echo $answersArr[31]['answer']; ?></td>
				<td><?= $OpennessGap >= 0 ? $OpennessGap : $starIcon; ?></td>
			  </tr>
			<?php 
				if($secondKey == 'ToleranceGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>			  
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Tolerance</span></td>
				<td><?php echo $answersArr[32]['answer']; ?></td>
				<td><?php echo $answersArr[33]['answer']; ?></td>
				<td><?= $ToleranceGap >= 0 ? $ToleranceGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($secondKey == 'PerspectiveTakingGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Perspective-Taking</span></td>
				<td><?php echo $answersArr[34]['answer']; ?></td>
				<td><?php echo $answersArr[35]['answer']; ?></td>
				<td><?= $PerspectiveTakingGap >= 0 ? $PerspectiveTakingGap : $starIcon; ?></td>
			  </tr> 
			<?php 
				if($secondKey == 'OptimismGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			 <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Optimism</span></td>
				<td><?php echo $answersArr[36]['answer']; ?></td>
				<td><?php echo $answersArr[37]['answer']; ?></td>
				<td><?= $OptimismGap >= 0 ? $OptimismGap : $starIcon; ?></td>
			  </tr>
				<?php 
				if($secondKey == 'RealityTestingGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Reality Testing</span></td>
				<td><?php echo $answersArr[38]['answer']; ?></td>
				<td><?php echo $answersArr[39]['answer']; ?></td>
				<td><?= $RealityTestingGap >= 0 ? $RealityTestingGap : $starIcon; ?></td>
			  </tr> 
													
			</tbody>
		  </table>                              
		</div>
	  </div>
	</div>
  </div>
</div>
<div id="OtherAwarenessPerceptions" class="mt-2">
  <h4>Other Awareness Perceptions</h4>
  <div class="inner-tab-section">
	<div class="row mb-4">
	  <div class="col-md-12">
		<div class="tab-box h-100">
		  <div class="box-title-comman box-title-bg-2">Other Awareness Perceptions (Skills Definitions)</div>
		  <ul>
			<li><strong>Intuition:</strong> Perceiving patterns and possibilities beyond the facts known at the time; trusting your “gut feeling”</li>
			<li><strong>Compassion:</strong> Treating others with concern, sensitivity, and kindness</li>
			<li><strong>Reading Non-Verbal Behavior:</strong> Observing and interpreting nonverbal messages expressed by body language and how a message is conveyed</li>
			<li><strong>Insightfulness:</strong> Seeing beyond the obvious and discerning the true nature of a situation or the hidden nature of Things</li>
			<li><strong>Re-framing:</strong> Changing viewpoints, seeing information in different ways resulting in new interpretations and meanings, finding alternative ways to make sense of situations</li>

			<li><strong>Flexibility:</strong> Remaining open and responding effectively to new, different, or changing information or circumstances</li>
			<li><strong>Social Intelligence:</strong> Sensing, understanding and reacting effectively to others’ emotions and the interactions with and between people; getting along well with others and engaging them to cooperate with you</li>
			<li><strong>Understanding Others:</strong> Being curious about and understanding motivations, feelings and moods that underlie behavior — yours and others’</li>
			<li><strong>Situational Awareness:</strong> Being alert and informed about your environment; reading patterns of interactions among individuals and observing what may be unique about the setting</li>
			<li><strong>Group Savvy:</strong> Reading and adjusting to group dynamics that demonstrate an understanding of group needs, perspectives, and processes</li>
		  </ul>                                      
		</div>
	  </div>                                  
	</div>
	<div class="info-tab-box">
	  <p class="mb-0"><strong>Remember:</strong> You rated the degree of Importance to your success and your Effectiveness in demonstrating these behaviors on a seven-point scale with 1=Not Important or Ineffective to a 7=as Mission Critical importance or Exemplary effectiveness.</p>
	</div>

	<div class="row pb-4 mt-4">
	  <div class="col-md-12">
	  
		<div class="table-responsive table-domain-score mb-4">
		  <table class="table-domain-score-inner w-100">
			<thead class="table-primary-dark box-title-bg-2">
			  <tr>
				<th>EQ Skills</th>
				<th>Effectiveness</th>
				<th>Importance</th>
				<th>Gap</th>
			  </tr>
			</thead>
			<tbody class="border-custom-td">
			<?php 
				if($thirdKey == 'IntuitionGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Intuition	</span></td>
				<td><?php echo $answersArr[40]['answer']; ?></td>
				<td><?php echo $answersArr[41]['answer']; ?></td>
				<td><?= $IntuitionGap >= 0 ? $IntuitionGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($thirdKey == 'CompassionGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Compassion	</span></td>
				<td><?php echo $answersArr[42]['answer']; ?></td>
				<td><?php echo $answersArr[43]['answer']; ?></td>
				<td><?= $CompassionGap >= 0 ? $CompassionGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($thirdKey == 'ReadingNonVerbalBehaviorGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Reading Non-Verbal Behavior</span></td>
				<td><?php echo $answersArr[44]['answer']; ?></td>
				<td><?php echo $answersArr[45]['answer']; ?></td>
				<td><?= $ReadingNonVerbalBehaviorGap >= 0 ? $ReadingNonVerbalBehaviorGap : $starIcon; ?></td>
			  </tr> 
			  <?php 
				if($thirdKey == 'InsightfulnessGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Insightfulness</span></td>
				<td><?php echo $answersArr[46]['answer']; ?></td>
				<td><?php echo $answersArr[47]['answer']; ?></td>
				<td><?= $InsightfulnessGap >= 0 ? $InsightfulnessGap : $starIcon; ?></td>
			  </tr>
			<?php 
				if($thirdKey == 'ReframingGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>			  
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Re-framing</span></td>
				<td><?php echo $answersArr[48]['answer']; ?></td>
				<td><?php echo $answersArr[49]['answer']; ?></td>
				<td><?= $ReframingGap >= 0 ? $ReframingGap : $starIcon; ?></td>
			  </tr> 
			  <?php 
				if($thirdKey == 'FlexibilityGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Flexibility</span></td>
				<td><?php echo $answersArr[50]['answer']; ?></td>
				<td><?php echo $answersArr[51]['answer']; ?></td>
				<td><?= $FlexibilityGap >= 0 ? $FlexibilityGap : $starIcon; ?></td>
			  </tr> 
			  <?php 
				if($thirdKey == 'SocialIntelligenceGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Social Intelligence</span></td>
				<td><?php echo $answersArr[52]['answer']; ?></td>
				<td><?php echo $answersArr[53]['answer']; ?></td>
				<td><?= $SocialIntelligenceGap >= 0 ? $SocialIntelligenceGap : $starIcon; ?></td>
			  </tr>
			<?php 
				if($thirdKey == 'UnderstandingOthersGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>			  
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Understanding Others</span></td>
				<td><?php echo $answersArr[54]['answer']; ?></td>
				<td><?php echo $answersArr[55]['answer']; ?></td>
				<td><?= $UnderstandingOthersGap >= 0 ? $UnderstandingOthersGap : $starIcon; ?></td>
			  </tr> 
			<?php 
				if($thirdKey == 'SituationalAwarenessGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
				<tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Situational Awareness</span></td>
				<td><?php echo $answersArr[56]['answer']; ?></td>
				<td><?php echo $answersArr[57]['answer']; ?></td>
				<td><?= $SituationalAwarenessGap >= 0 ? $SituationalAwarenessGap : $starIcon; ?></td>
			  </tr>
				<?php 
				if($thirdKey == 'GroupSavvyGap') { $class = 'custom-bold-td'; } else { $class = ''; } 
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Group Savvy</span></td>
				<td><?php echo $answersArr[58]['answer']; ?></td>
				<td><?php echo $answersArr[59]['answer']; ?></td>
				<td><?= $GroupSavvyGap >= 0 ? $GroupSavvyGap : $starIcon; ?></td>
			  </tr> 
													
			</tbody>
		  </table>                              
		</div>
	  </div>
	</div>
  </div>
</div>
<div id="OtherEngagementRelating" class="mt-2">
  <div class="inner-tab-section">
	<h5>Other Engagement in Relating Well </h5>
	<div class="row mb-4">
	  <div class="col-md-12">
		
		<div class="tab-box h-100">
		  <div class="box-title-comman box-title-bg-4">Other Engagement in Relating Well (Skill Definitions)</div>
		  <ul>
			<li><strong>Conflict Management:</strong> Identifying tension or disagreement within yourself or with others and promoting solutions that are best for all</li>
			<li><strong>Active Empathy:</strong> Understanding how and why others feel the way they do and conveying it effectively</li>
			<li><strong>Listening Generously:</strong> Paying close attention to what the speaker says, means, and to what might be behind the words</li>
			<li><strong>Patience:</strong>  Waiting your turn. Enduring hardship, difficulty or inconvenience without complaint and with calmness and self-control; the willingness and ability to tolerate delay</li>
			<li><strong>Influencing others:</strong>  Conveying a message that compels individuals to take action, change perspective, or adjust behavior </li>
			<li><strong>Assertiveness:</strong> Standing up for your rights; expressing your feelings, thoughts and beliefs in ways that respect yourself and others </li>
			<li><strong>Relationship Savvy:</strong> Relating well and creating relationships with all kinds of people, even those you may not particularly like, to accomplish goals </li>
			<li><strong>Collaboration:</strong> Working with others toward shared goals — willingly</li>
			<li><strong>Trusting:</strong> Believing that an individual or entity will do the right thing and act in the best interest of others</li>
			<li><strong>Managing Social Space:</strong> Recognizing and maintaining the physical and emotional distance needed to interact comfortably with others</li>
			
		  </ul>                                      
		</div>
	  </div>                                  
	</div>
	<div class="info-tab-box">
	  <p class="mb-0"><strong>Remember:</strong> You rated the degree of Importance to your success and your Effectiveness in demonstrating these behaviors on a seven-point scale with 1=Not Important or Ineffective to a 7=as Mission Critical importance or Exemplary effectiveness.</p>
	</div>

	<div class="row pb-4 mt-4">
	  <div class="col-md-12">
	   
		<div class="table-responsive table-domain-score mb-4">
		  <table class="table-domain-score-inner w-100">
			<thead class="table-primary-dark box-title-bg-4">
			  <tr>
				<th>EQ Skills</th>
				<th>Effectiveness</th>
				<th>Importance</th>
				<th>Gap</th>
			  </tr>
			</thead>
			<tbody class="border-custom-td">
				<?php 
				if($fourthKey == 'ConflictManagementGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Conflict Management	</span></td>
				<td><?php echo $answersArr[60]['answer']; ?></td>
				<td><?php echo $answersArr[61]['answer']; ?></td>
				<td><?= $ConflictManagementGap >= 0 ? $ConflictManagementGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($fourthKey == 'ActiveEmpathyGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Active Empathy	</span></td>
				<td><?php echo $answersArr[62]['answer']; ?></td>
				<td><?php echo $answersArr[63]['answer']; ?></td>
				<td><?= $ActiveEmpathyGap >= 0 ? $ActiveEmpathyGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($fourthKey == 'ListeningGenerouslyGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Listening Generously</span></td>
				<td><?php echo $answersArr[64]['answer']; ?></td>
				<td><?php echo $answersArr[65]['answer']; ?></td>
				<td><?= $ListeningGenerouslyGap >= 0 ? $ListeningGenerouslyGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($fourthKey == 'PatienceGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Patience</span></td>
				<td><?php echo $answersArr[66]['answer']; ?></td>
				<td><?php echo $answersArr[67]['answer']; ?></td>
				<td><?= $PatienceGap >= 0 ? $PatienceGap : $starIcon; ?></td>
			  </tr>
			  <?php 
				if($fourthKey == 'InfluencingothersGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Influencing others</span></td>
				<td><?php echo $answersArr[68]['answer']; ?></td>
				<td><?php echo $answersArr[69]['answer']; ?></td>
				<td><?= $InfluencingothersGap >= 0 ? $InfluencingothersGap : $starIcon; ?></td>
			  </tr>
				<?php 
				if($fourthKey == 'AssertivenessGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Assertiveness</span></td>
				<td><?php echo $answersArr[70]['answer']; ?></td>
				<td><?php echo $answersArr[71]['answer']; ?></td>
				<td><?= $AssertivenessGap >= 0 ? $AssertivenessGap : $starIcon; ?></td>
			  </tr> 
			<?php 
				if($fourthKey == 'RelationshipSavvyGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Relationship Savvy</span></td>
				<td><?php echo $answersArr[72]['answer']; ?></td>
				<td><?php echo $answersArr[73]['answer']; ?></td>
				<td><?= $RelationshipSavvyGap >= 0 ? $RelationshipSavvyGap : $starIcon; ?></td>
			  </tr>
				<?php 
				if($fourthKey == 'CollaborationGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Collaboration</span></td>
				<td><?php echo $answersArr[74]['answer']; ?></td>
				<td><?php echo $answersArr[75]['answer']; ?></td>
				<td><?= $CollaborationGap >= 0 ? $CollaborationGap : $starIcon; ?></td>
			  </tr>
				<?php 
				if($fourthKey == 'TrustingGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
			  <tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Trusting</span></td>
				<td><?php echo $answersArr[76]['answer']; ?></td>
				<td><?php echo $answersArr[77]['answer']; ?></td>
				<td><?= $TrustingGap >= 0 ? $TrustingGap : $starIcon; ?></td>
			  </tr> 
				<?php 
				if($fourthKey == 'ManagingSocialSpaceGap') { $class = 'custom-bold-td'; } else { $class = ''; }
				$starIcon = '<span class="material-icons fs-5">star</span>';
				?>
				<tr class="<?= $class; ?>">
				<td><span class="custom-bold-td">Managing Social Space</span></td>
				<td><?php echo $answersArr[78]['answer']; ?></td>
				<td><?php echo $answersArr[79]['answer']; ?></td>
				<td><?= $ManagingSocialSpaceGap >= 0 ? $ManagingSocialSpaceGap : $starIcon; ?></td>
			  </tr> 
			   
													
			</tbody>
		  </table>                              
		</div>
	  </div>
	</div>
  </div>
</div>

<hr/>
<div class="btn-info d-flex justify-content-center gap-3" style="margin-top: 20px;">
		<a class=" btn-info-comman btn-previous" onclick="showContent('your-report-result');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next" onclick="showContent('actiontips');" href="javascript:void(0);">Next</a>
	</div>
  </div>
</div>
<?php } ?>  