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
if(!$content) {
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
?>
<div class="tab-pane fade active show" id="self-effectiveness" role="tabpanel" aria-labelledby="selfEffectivenessTab">
                          <div class="tab-content py-4 px-4">
<h1>Action Tips to Improve EQ Effectiveness</h1>
<p>The EQ Competencies with greater opportunities with Action Tips are provided below:</p>
<div id="self-actualization" class="mt-4">
<h2>Self-Awareness Perceptions</h2>
  <div class="inner-tab-section">
	<div class="row mb-4">
	  <div class="col-md-12">
		<div class="tab-box h-100">
		  <div class="box-title-comman box-title-bg-1">{{ ucfirst(strtolower($actionText1['name'])) }} (Self-Awareness Perceptions)</div>
		  <p class="px-3 pt-3"><strong>{{ ucfirst(strtolower($actionText1['name'])) }}</strong>: {{ ucfirst(strtolower($actionText1['stamina'])) }}</p>
		  <p class="px-3 mb-0"><strong>When Talented at this EQ competency, you:</strong></p>
		  <ul>
			<?= $actionText1['points']; ?>                                       
		  </ul>
		
		<div class="go-there">To Get There</div>
		<div class="go-there-conentent p-3">
		  <p class="mb-0"><?= $actionText1['tip1']; ?></p>
		  <p><?= $actionText1['tip2']; ?></p>
		</div>
		</div>
		
	  </div>
	</div>
</div>
  
</div>
<div id="optimism" class="mt-5">
<h3>Self-Regulation</h3>
<div class="inner-tab-section">
  <div class="row mb-4">
	<div class="col-md-12">
	  <div class="tab-box h-100">
		<div class="box-title-comman box-title-bg-3">{{ ucfirst(strtolower($actionText2['name'])) }} (Self-Regulation)</div>
		<p class="px-3 pt-3"><strong>{{ ucfirst(strtolower($actionText2['name'])) }}</strong>: {{ ucfirst(strtolower($actionText2['stamina'])) }}</p>
		<p class="px-3 mb-0"><strong>When Talented at this EQ competency, you:</strong></p>
		<ul>
		  <?= $actionText2['points']; ?>                                         
		</ul>
	  
	  <div class="go-there">To Get There</div>
	  <div class="go-there-conentent p-3">
		<p class="mb-0"><?= $actionText2['tip1']; ?> </p>
		<?= $actionText2['tip2']; ?>
	  </div>
	  </div>
	  
	</div>
  </div>
</div>
</div>
<div id="reading-nonverbal" class="mt-5">
<h4>Other Awareness Perceptions
</h4>
<div class="inner-tab-section">
  <div class="row mb-4">
	<div class="col-md-12">
	  <div class="tab-box h-100">
		<div class="box-title-comman box-title-bg-2">{{ ucfirst(strtolower($actionText3['name'])) }} (Other Awareness Perceptions)</div>
		<p class="px-3 pt-3"><strong>{{ ucfirst(strtolower($actionText3['name'])) }}</strong>: {{ ucfirst(strtolower($actionText2['stamina'])) }}</p>
		<p class="px-3 mb-0"><strong>When Talented at this EQ competency, you:</strong></p>
		<ul>
		  <?= $actionText3['points']; ?>                                           
		</ul>
	  
	  <div class="go-there">To Get There</div>
	  <div class="go-there-conentent p-3">
		<p class="mb-0"><?= $actionText3['tip1']; ?></p>
		<?= $actionText3['tip2']; ?>
	  </div>
	  </div>
	  
	</div>
  </div>
</div>
</div>
<div id="reading-nonverbal-engagement" class="mt-5">
<h5>Other Engagement in Relating Well</h5>
<div class="inner-tab-section">
  <div class="row mb-4">
	<div class="col-md-12">
	  <div class="tab-box h-100">
		<div class="box-title-comman box-title-bg-4">{{ ucfirst(strtolower($actionText4['name'])) }} (Other Engagement in Relating Well)</div>
		<p class="px-3 pt-3"><strong>{{ ucfirst(strtolower($actionText4['name'])) }}</strong>:  {{ ucfirst(strtolower($actionText4['stamina'])) }}</p>
		<p class="px-3 mb-0"><strong>When Talented at this EQ competency, you:</strong></p>
		<ul>
		  <?= $actionText4['points']; ?>                                                               
		</ul>
	  
	  <div class="go-there">To Get There</div>
	  <div class="go-there-conentent p-3">
		<?= $actionText4['tip1']; ?>
		<?= $actionText4['tip2']; ?>
	  </div>
	  </div>
	  
	</div>
  </div>
</div>
</div>

<hr/>
<div class="btn-info d-flex justify-content-center gap-3" style="margin-top: 20px;">
                                <a class="btn-info-comman btn-previous" onclick="showContent('eqdimensioncompetencies');" href="javascript:void(0);">Previous</a>
                                <a class="btn-info-comman btn-next" onclick="showContent('actiontips');" href="javascript:void(0);">Next</a>
                            </div>
                          </div>
                        </div>
<?php } ?>