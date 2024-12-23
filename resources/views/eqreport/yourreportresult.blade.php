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
if(!$surveyResults) {
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

$data = $surveyResults->results; 
$dataArr	=	json_decode($data);
$statement1 = "You indicate that your competencies in this dimension are as Important as most other people do and you are as Effective as most others. It will be especially valuable to identify the key gaps you’ve identified between what is Important and how Effective you feel you are.";
$statement2 = "You indicate that your competencies in this dimension are significantly more Important than most other people do, and you are more Effective than most others. Even if this is true for all of the competencies in this dimension, explore the key gaps you've identified between what is Important and how Effective you feel you are which will elevate performance even more.";
$statement3 = "You indicate that your competencies in this dimension are Not as Important as most other people do and you are Not as Effective as most others. Take time to solicit observations from others on what may be essential for your work Effectiveness in this dimension and recalibrate if new information suggests you should.  In any case, review the key gaps you've identified between what is Important and how Effective you feel you are.";
$statement4 = 'You indicate that your competencies in this dimension are more Effectively demonstrated than they are Important to your success. If true, these behaviors are "money in the bank" that you can lean on in the future. What may not be Important at the moment could significantly change in a new role or job, or new relationship.';
$statement5 = "You indicate that your competencies in this dimension are all Important and your Effectiveness is significantly lower than what most other people report. It will be especially important to identify the key gaps you've identified between what is most Important and how Effective you feel you are.  Even among those rated as Important, some are mission-critical and others essential. Focusing on those that are mission-critical is the best use of time and effort for development.";
$statement6 = "You indicate that your competencies in this dimension are all Important more than most other people do and you are as Effective as most others. It will be especially important to identify the key gaps you've identified between what is most Important and how Effective you feel you are.";
$statement7 = "You indicate that your competencies in this dimension are less Important than most other people do, and you are as Effective as most others. While these competencies in this dimension may not be Important now, new roles, team assignments, or relationships may change the priorities you place on these behaviors.";
//$statement8 = "You indicate that your competencies in this dimension are significantly more Effective than most other people, and you see these as more Important than most. Even if this is true for all of the competencies in this dimension, you can explore the key gaps you've identified between what is Important and how Effective you feel you are, which will elevate performance even more.";
$statement8 = "You indicate that your competencies in this dimension are significantly more Effective than most other people, and you see these as Important as most do.  Even if this is true for all of the competencies in this dimension, it is still valuable to explore what you consider to be the most Important of the competencies in this dimension.";
$statement9 = "You indicate that your competencies in this dimension are as Effective as most other people, and you see these as Important as most do.  Even if this is true for all of the competencies in this dimension, it is still valuable to explore what you consider to be the most Important of the competencies in this dimension.";

$normImportanceMean1 = 53.7;
   $EffecArrsum1 = abs($dataArr->SAEffectivenessArrsum - 51.5);
   $ImporArrsum1 = abs($dataArr->SAImportanceArrsum - 53.7);
   $EffecMeanPlusSD1  = 51.5 + 7.8;
   $ImporMeanPlusSD1  = 53.7 + 6.4;
   $EffecMeanMinusSD1  = 51.5 - 7.8;
   $ImporMeanMinusSD1  = 53.7 - 6.4;
   $interpretiveNote1  = '';
   
   
   //Get 1st Interpretative Note
   //check 1st condition
   if (($EffecArrsum1 < 7.9) && ($ImporArrsum1 < 6.5)) {
	$interpretiveNote1  = $statement1;
   } else if (($dataArr->SAEffectivenessArrsum > $EffecMeanPlusSD1) && ($dataArr->SAImportanceArrsum > $ImporMeanPlusSD1)) {
   	$interpretiveNote1  = $statement2;
   } else if (($dataArr->SAEffectivenessArrsum < $EffecMeanMinusSD1) && ($dataArr->SAImportanceArrsum < $ImporMeanMinusSD1)) {
   	$interpretiveNote1  = $statement3;
   } else if (($dataArr->SAEffectivenessArrsum > $EffecMeanPlusSD1) && ($dataArr->SAEffectivenessArrsum > $dataArr->SAImportanceArrsum)) {
   	$interpretiveNote1  = $statement4;
   } else if (($dataArr->SAEffectivenessArrsum < $EffecMeanMinusSD1) && ($dataArr->SAEffectivenessArrsum < $dataArr->SAImportanceArrsum)) {
   	$interpretiveNote1  = $statement5;
   } else if (($dataArr->SAImportanceArrsum > $ImporMeanPlusSD1) && ($dataArr->SAImportanceArrsum > $dataArr->SAEffectivenessArrsum)) {
   	$interpretiveNote1  = $statement6;
   } else if (($dataArr->SAImportanceArrsum < $ImporMeanMinusSD1) && ($dataArr->SAImportanceArrsum < $dataArr->SAEffectivenessArrsum)) {
   	$interpretiveNote1  = $statement7;
   } else if (($dataArr->SAEffectivenessArrsum > $EffecMeanPlusSD1) && (($normImportanceMean1 <= $dataArr->SAEffectivenessArrsum) && ($normImportanceMean1 <= $ImporMeanPlusSD1))) {
   	$interpretiveNote1  = $statement8;
   } else if((($EffecMeanMinusSD1 <= $dataArr->SAEffectivenessArrsum) && ($EffecMeanMinusSD1 <= $EffecMeanPlusSD1)) && ($dataArr->SAEffectivenessArrsum <= $ImporMeanMinusSD1)) {
   	$interpretiveNote1  = $statement9;
   }
   
   
   
   //------------------ For Second -------------
   $normImportanceMean2 = 51.9;
   $EffecArrsum2 = abs($dataArr->SREffectivenessArrsum - 47.8);
   $ImporArrsum2 = abs($dataArr->SRImportanceArrsum - 51.9);
   $EffecMeanPlusSD2  = 47.8 + 8.1;
   $ImporMeanPlusSD2  = 51.9 + 6.9;
   $EffecMeanMinusSD2  = 47.8 - 8.1;
   $ImporMeanMinusSD2  = 51.9 - 6.9;
   $interpretiveNote2  = '';
   
  
   //Get 2nd Interpretative Note
   //check 1st condition
   if (($EffecArrsum2 < 8.2) && ($ImporArrsum2 < 7.0)) {
	$interpretiveNote2  = $statement1;
   } else if (($dataArr->SREffectivenessArrsum > $EffecMeanPlusSD2) && ($dataArr->SRImportanceArrsum > $ImporMeanPlusSD2)) {
   	$interpretiveNote2  = $statement2;
   } else if (($dataArr->SREffectivenessArrsum < $EffecMeanMinusSD2) && ($dataArr->SRImportanceArrsum < $ImporMeanMinusSD2)) {
   	$interpretiveNote2  = $statement3;
   } else if (($dataArr->SREffectivenessArrsum > $EffecMeanPlusSD2) && ($dataArr->SREffectivenessArrsum > $dataArr->SRImportanceArrsum)) {
   	$interpretiveNote2  = $statement4;
   } else if (($dataArr->SREffectivenessArrsum < $EffecMeanMinusSD2) && ($dataArr->SREffectivenessArrsum < $dataArr->SRImportanceArrsum)) {
   	$interpretiveNote1  = $statement5;
   } else if (($dataArr->SRImportanceArrsum > $ImporMeanPlusSD2) && ($dataArr->SRImportanceArrsum > $dataArr->SREffectivenessArrsum)) {
   	$interpretiveNote2  = $statement6;
   } else if (($dataArr->SRImportanceArrsum < $ImporMeanMinusSD2) && ($dataArr->SRImportanceArrsum < $dataArr->SREffectivenessArrsum)) {
   	$interpretiveNote2  = $statement7;
   } else if (($dataArr->SREffectivenessArrsum > $EffecMeanPlusSD2) && (($normImportanceMean2 <= $dataArr->SREffectivenessArrsum) && ($normImportanceMean2 <= $ImporMeanPlusSD2))) {
   	$interpretiveNote2  = $statement8;
   } else if((($EffecMeanMinusSD2 <= $dataArr->SREffectivenessArrsum) && ($EffecMeanMinusSD2 <= $EffecMeanPlusSD2)) && ($dataArr->SREffectivenessArrsum <= $ImporMeanMinusSD2)) {
   	$interpretiveNote2  = $statement9;
   }
   //echo  $interpretiveNote2; die;
   //------------------ For Third -------------
   $normImportanceMean3 = 58.7;
   $EffecArrsum3 = abs($dataArr->OAEffectivenessArrsum - 52.6);
   $ImporArrsum3 = abs($dataArr->OAImportanceArrsum - 58.7);
   $EffecMeanPlusSD3  = 52.6 + 7.4;
   $ImporMeanPlusSD3  = 58.7 + 6.2;
   $EffecMeanMinusSD3  = 52.6 - 7.4;
   $ImporMeanMinusSD3  = 58.7 - 6.2;
   $interpretiveNote3  = '';
   
   
    //echo 'EffecArrsum3 '.$EffecArrsum3.' ImporArrsum3 '.$ImporArrsum3; die;
    //echo $dataArr->OAEffectivenessArrsum.' '.$EffecMeanPlusSD3.' '.$dataArr->OAImportanceArrsum.' '.$ImporMeanPlusSD3;
    //echo $dataArr->OAEffectivenessArrsum.' '.$EffecMeanMinusSD3.' '.$dataArr->OAImportanceArrsum.' '.$ImporMeanMinusSD3; die;
    //echo $dataArr->OAEffectivenessArrsum.' '.$EffecMeanPlusSD3.' '.$dataArr->OAEffectivenessArrsum.' '.$dataArr->OAImportanceArrsum; die;
    //echo $dataArr->OAImportanceArrsum.' '.$ImporMeanPlusSD3.' '.$dataArr->OAImportanceArrsum.' '.$dataArr->OAEffectivenessArrsum; die;
    //echo $dataArr->OAImportanceArrsum.' '.$ImporMeanMinusSD3.' '.$dataArr->OAImportanceArrsum.' '.$dataArr->OAEffectivenessArrsum; die;
    //echo $dataArr->OAEffectivenessArrsum.' '.$EffecMeanPlusSD3.' '.$normImportanceMean.' '.$dataArr->OAEffectivenessArrsum.' '.$normImportanceMean.' '.$ImporMeanPlusSD3;  die;
    //echo $EffecMeanMinusSD3.' '.$dataArr->OAEffectivenessArrsum.' '.$EffecMeanPlusSD3.' '.$dataArr->OAEffectivenessArrsum.' '.$ImporMeanMinusSD3; die;
   //Get 3rd Interpretative Note
   //check 1st condition
   if (($EffecArrsum3 < 7.5) && ($ImporArrsum3 < 6.3)) {
	$interpretiveNote3  = $statement1;
   } else if (($dataArr->OAEffectivenessArrsum > $EffecMeanPlusSD3) && ($dataArr->OAImportanceArrsum > $ImporMeanPlusSD3)) {
   	$interpretiveNote3  = $statement2;
   } else if (($dataArr->OAEffectivenessArrsum < $EffecMeanMinusSD3) && ($dataArr->OAImportanceArrsum < $ImporMeanMinusSD3)) {
   	$interpretiveNote3  = $statement3;
   } else if (($dataArr->OAEffectivenessArrsum > $EffecMeanPlusSD3) && ($dataArr->OAEffectivenessArrsum > $dataArr->OAImportanceArrsum)) {
   	$interpretiveNote3  = $statement4;
   } else if (($dataArr->OAEffectivenessArrsum < $EffecMeanMinusSD3) && ($dataArr->OAEffectivenessArrsum < $dataArr->OAImportanceArrsum)) {
   	$interpretiveNote3  = $statement5;
   } else if (($dataArr->OAImportanceArrsum > $ImporMeanPlusSD3) && ($dataArr->OAImportanceArrsum > $dataArr->OAEffectivenessArrsum)) {
   	$interpretiveNote3  = $statement6;
   } else if (($dataArr->OAImportanceArrsum < $ImporMeanMinusSD3) && ($dataArr->OAImportanceArrsum < $dataArr->OAEffectivenessArrsum)) {
   	$interpretiveNote3  = $statement7;
   } else if (($dataArr->OAEffectivenessArrsum > $EffecMeanPlusSD3) && (($normImportanceMean3 <= $dataArr->OAEffectivenessArrsum) && ($normImportanceMean3 <= $ImporMeanPlusSD3))) {
   	$interpretiveNote3  = $statement8;
   } else if((($EffecMeanMinusSD3 <= $dataArr->OAEffectivenessArrsum) && ($EffecMeanMinusSD3 <= $EffecMeanPlusSD3)) && ($dataArr->OAEffectivenessArrsum <= $ImporMeanMinusSD3)) {
   	$interpretiveNote3  = $statement9;
   }
   //echo $interpretiveNote3; die;
   //------------------ For Fourth -------------
   $normImportanceMean4 = 59.3;
   $EffecArrsum4 = abs($dataArr->OEEffectivenessArrsum - 53.8);
   $ImporArrsum4 = abs($dataArr->OEImportanceArrsum - 59.3);
   $EffecMeanPlusSD4  = 53.8 + 6.2;
   $ImporMeanPlusSD4  = 59.3 + 5.9;
   $EffecMeanMinusSD4  = 53.8 - 6.2;
   $ImporMeanMinusSD4  = 59.3 - 5.9;
   $interpretiveNote4  = '';
   
   //echo $dataArr->OEEffectivenessArrsum.' 2 '.$EffecMeanPlusSD4.' 3 '.$ImporMeanMinusSD4.' 4 '.$dataArr->OEImportanceArrsum.' 5 '.$ImporMeanPlusSD4; die;
   //Get 4th Interpretative Note
   //check 1st condition
   if (($EffecArrsum4 < 6.3) && ($ImporArrsum4 < 6.0)) {
	$interpretiveNote4  = $statement1;
   } else if (($dataArr->OEEffectivenessArrsum > $EffecMeanPlusSD4) && ($dataArr->OEImportanceArrsum > $ImporMeanPlusSD4)) {
   	$interpretiveNote4  = $statement2;
   } else if (($dataArr->OEEffectivenessArrsum < $EffecMeanMinusSD4) && ($dataArr->OEImportanceArrsum < $ImporMeanMinusSD4)) {
   	$interpretiveNote4  = $statement3;
   } else if (($dataArr->OEEffectivenessArrsum > $EffecMeanPlusSD4) && ($dataArr->OEEffectivenessArrsum > $dataArr->OEImportanceArrsum)) {
   	$interpretiveNote4  = $statement4;
   } else if (($dataArr->OEEffectivenessArrsum < $EffecMeanMinusSD4) && ($dataArr->OEEffectivenessArrsum < $dataArr->OEImportanceArrsum)) {
   	$interpretiveNote4  = $statement5;
   } else if (($dataArr->OEImportanceArrsum > $ImporMeanPlusSD4) && ($dataArr->OEImportanceArrsum > $dataArr->OEEffectivenessArrsum)) {
   	$interpretiveNote4  = $statement6;
   } else if (($dataArr->OEImportanceArrsum < $ImporMeanMinusSD4) && ($dataArr->OEImportanceArrsum < $dataArr->OEEffectivenessArrsum)) {
   	$interpretiveNote4  = $statement7;
   } else if (($dataArr->OEEffectivenessArrsum > $EffecMeanPlusSD4) && (($normImportanceMean4 <= $dataArr->OEEffectivenessArrsum) && ($normImportanceMean4 <= $ImporMeanPlusSD4))) {
   	$interpretiveNote4  = $statement8;
   } else if((($EffecMeanMinusSD4 <= $dataArr->OEEffectivenessArrsum) && ($EffecMeanMinusSD4 <= $EffecMeanPlusSD4)) && ($dataArr->OEEffectivenessArrsum <= $ImporMeanMinusSD4)) {
   	$interpretiveNote4  = $statement9;
   }
?>
<div class="tab-pane fade show active" id="reported-results" role="tabpanel" aria-labelledby="reported-results-tab">
                          <div class="tab-content py-4 px-4">
<h3>Your Reported Results</h3>
                            <p>Based on your ratings, your results show the following:</p>
                            
                            <div class="table-responsive table-domain-score mb-4">
                              <table class="table-domain-score-inner w-100">
                                <thead class="table-primary-dark">
                                  <tr>
                                    <th>Dimension</th>
                                    <th>Your Score</th>
                                    <th>Norm <br> <span class="small">(Standard Deviations)*</span></th>
                                    <th>Interpretative Note</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td style="background-color: #67396E; color: white;border-bottom: 0px;">Self-Awareness</td>
                                    <td class="p-0">
                                        <table class="inner-warning-table" width="100%" border="0">
                                          <tr>
                                            <td class="bg-warning-custom border-0">Effectiveness</td>
                                          </tr>
                                          <tr>
                                            <td height="40"><?= $dataArr->SAEffectivenessArrsum; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bg-warning-custom border-0">Importance</td>
                                          </tr>
                                          <tr>
                                            <td height="40"><?= $dataArr->SAImportanceArrsum; ?></td>
                                          </tr>
                                          
                                        </table>
                                    </td>
                                    <td  class="p-0">
                                      <table class="inner-warning-table" width="100%" border="0">
                                        <tr>
                                          <td class="bg-warning-custom border-0">Effectiveness</td>
                                        </tr>
                                        <tr>
                                          <td height="40">51.5 (7.8)</td>
                                        </tr>
                                        <tr>
                                          <td class="bg-warning-custom border-0">Importance</td>
                                        </tr>
                                        <tr>
                                          <td height="40">53.7 (6.4)</td>
                                        </tr>
                                        
                                      </table>
                                    </td>
                                    <td><?= $interpretiveNote1; ?></td>
                                  </tr>
                                  <tr>
                                    <td style="background-color: #007A68; color: white;border-bottom: 0px;">Self-Regulation</td>
                                    <td class="p-0">
                                      <table class="inner-warning-table" width="100%" border="0">
                                        <tr>
                                          <td class="bg-warning-custom border-0">Effectiveness</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->SREffectivenessArrsum; ?></td>
                                        </tr>
                                        <tr>
                                          <td class="bg-warning-custom border-0">Importance</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->SRImportanceArrsum; ?></td>
                                        </tr>
                                        
                                      </table>
                                  </td>
                                  <td  class="p-0">
                                    <table class="inner-warning-table" width="100%" border="0">
                                      <tr>
                                        <td class="bg-warning-custom border-0">Effectiveness</td>
                                      </tr>
                                      <tr>
                                        <td height="40">47.8 (8.1)</td>
                                      </tr>
                                      <tr>
                                        <td class="bg-warning-custom border-0">Importance</td>
                                      </tr>
                                      <tr>
                                        <td height="40">51.9 (6.9)</td>
                                      </tr>
                                      
                                    </table>
                                  </td>
                                  <td><?= $interpretiveNote2; ?></td>
                                  </tr>
                                  <tr>
                                    <td style="background-color: #944633; color: white; border-bottom: 0px;">Other Awareness</td>
                                    <td class="p-0">
                                      <table class="inner-warning-table" width="100%" border="0">
                                        <tr>
                                          <td class="bg-warning-custom border-0">Effectiveness</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->OAEffectivenessArrsum; ?></td>
                                        </tr>
                                        <tr>
                                          <td class="bg-warning-custom border-0">Importance</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->OAImportanceArrsum; ?></td>
                                        </tr>
                                        
                                      </table>
                                  </td>
                                  <td  class="p-0">
                                    <table class="inner-warning-table" width="100%" border="0">
                                      <tr>
                                        <td class="bg-warning-custom border-0">Effectiveness</td>
                                      </tr>
                                      <tr>
                                        <td height="40">52.6 (7.4)</td>
                                      </tr>
                                      <tr>
                                        <td class="bg-warning-custom border-0">Importance</td>
                                      </tr>
                                      <tr>
                                        <td height="40">58.7 (6.2)</td>
                                      </tr>
                                      
                                    </table>
                                  </td>
                                  <td><?= $interpretiveNote3; ?></td>
                                  </tr>
                                  <tr>
                                    <td style="background-color: #9B2343; color: white; border-bottom: 0px;">Other Engagement</td>
                                    <td class="p-0">
                                      <table class="inner-warning-table" width="100%" border="0">
                                        <tr>
                                          <td class="bg-warning-custom border-0">Effectiveness</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->OEEffectivenessArrsum; ?></td>
                                        </tr>
                                        <tr>
                                          <td class="bg-warning-custom border-0">Importance</td>
                                        </tr>
                                        <tr>
                                          <td height="40"><?= $dataArr->OEImportanceArrsum; ?></td>
                                        </tr>
                                        
                                      </table>
                                  </td>
                                  <td  class="p-0">
                                    <table class="inner-warning-table" width="100%" border="0">
                                      <tr>
                                        <td class="bg-warning-custom border-0">Effectiveness</td>
                                      </tr>
                                      <tr>
                                        <td height="40">53.8 (6.2)</td>
                                      </tr>
                                      <tr>
                                        <td class="bg-warning-custom border-0">Importance</td>
                                      </tr>
                                      <tr>
                                        <td height="40">59.3 (5.9)</td>
                                      </tr>
                                      
                                    </table>
                                  </td>
                                  <td><?= $interpretiveNote4; ?></td>
                                  </tr>
                                </tbody>
                              </table>                              
                            </div>

                            <p>Averages that are like the norm group, below the norm group, or above the norm group are simply a way of seeing how you compare to how others see themselves. These are general indicators and trends. Only when you have verified how others experience your behavior can you have an important piece of the puzzle of understanding how your EQ-related behaviors affect others.</p>
                            <p>Your highlighted EQ competencies in each dimension are based on the largest gaps between your self-ratings and importance ratings. When ties occur, the competency that is considered more comprehensive and important is highlighted. Your Action Tips are based on this selection.</p>
                            <p class="fst-italic">*Norm averages were based on a sample of 9,433 managers working in a broad array of industries, agencies, and organizational settings. Scores Range from 10-70 for Importance and Effectiveness.</p>
                          
                            <hr/>
<div class="btn-info d-flex justify-content-center gap-3" style="margin-top: 20px;">
                                <a class=" btn-info-comman btn-previous" onclick="showContent('interpretingtab');" href="javascript:void(0);">Previous</a>
                                <a class="btn-info-comman btn-next" onclick="showContent('eqdimensioncompetencies');" href="javascript:void(0);">Next</a>
                            </div>
                          </div>
                        </div>
<?php } ?>                      