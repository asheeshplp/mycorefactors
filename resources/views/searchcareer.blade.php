<?php 
$dataCount = count($occupationResult);
if($dataCount == 0) {
?>
<div class="tab-pane fade show active" id="reported-results" role="tabpanel" aria-labelledby="reported-results-tab">
	<div class="tab-content py-4 px-4">
		<div class="alert alert-warning">
		  <strong>Sorry!</strong> No results to display.
		</div>
	</div>
</div>

<?php 
} else { 
?>
<div class="tab-content py-4 px-4">
	<h1>Occupational Code Appendix</h1>                           
	<div class="table-responsive">
	  <table class="table table-borderd table-border-black" id="resultstable">
		<thead>
		  <tr>
			<th scope="col">GIA Code</th>
			<th scope="col">Occupation</th>
			<th scope="col">NOC</th>
		  </tr>
		</thead>
		<tbody>
		<?php 
		foreach($occupationResult as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['interest_code']; ?></td>
			<td><a href="<?php echo $value['title_link']; ?>" target="_blank"><?php echo $value['title']; ?></a></td>
			<td><?php echo $value['onetsoc_code']; ?></td>
		</tr>		
		<?php } ?>
	  </table>
	</div>
	
	<hr/>
  </div>
<?php } ?>