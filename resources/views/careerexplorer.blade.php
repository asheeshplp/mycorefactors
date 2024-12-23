<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Career Explorer') }}
        </h2>
    </x-slot>
	
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/eq-logo.svg') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">Career Explorer</h1>
            </div>
          </div>
		  
		  <div class="container-fluid px-3 mt-3">
            <div class="row">
				<div class="card card-bg-gray">
                  <div class="card-body">
					<div class="btn-info d-flex gap-3">
                        <a href="{{ url('careerpath') }}" id="myreport" class="btn-info-comman uppertab">My Report</a>
                        <a href="{{ url('careerexplorer') }}" id="careerexplorer" class="active btn-info-comman uppertab">Career Explorer</a>                        
                        <a href="{{ url('externalresourcescp') }}" id="externalresourcescp" class="btn-info-comman uppertab">External Resources</a>
                    </div>					
					</div>
					<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="loader" style="display:none;"></div>							
							<div class="col-12">
								<h3 class="section-heading">Choose Interests:</h3>
							</div>
							
						</div>
					</div>
					
					 <div class="row">
						<div class="col-md-3 col-12">
						  <select id="cars" class="custom-select form-control">
							<option value="R"  <?php if($firstVal=="R")  {echo "selected";} ?> >R Realistic</option>
							<option value="I" <?php if($firstVal=="I")  {echo "selected";} ?> >I Investigative</option>
							<option value="A" <?php if($firstVal=="A")  {echo "selected";} ?> >A Artistic</option>
							<option value="S" <?php if($firstVal=="S")  {echo "selected";} ?> >S Social</option>
							<option value="E" <?php if($firstVal=="E")  {echo "selected";} ?> >E Enterprising</option>
							<option value="C" <?php if($firstVal=="C")  {echo "selected";} ?> >C Conventional</option>
						  </select>
						</div>
						<div class="col-md-3 col-12">
						  <select id="cars2" class="custom-select form-control">
							<option value="R"  <?php if($secondVal =="R")  {echo "selected";} ?> >R Realistic</option>
							<option value="I" <?php if($secondVal=="I")  {echo "selected";} ?> >I Investigative</option>
							<option value="A" <?php if($secondVal=="A")  {echo "selected";} ?> >A Artistic</option>
							<option value="S" <?php if($secondVal=="S")  {echo "selected";} ?> >S Social</option>
							<option value="E" <?php if($secondVal=="E")  {echo "selected";} ?> >E Enterprising</option>
							<option value="C" <?php if($secondVal=="C")  {echo "selected";} ?> >C Conventional</option>
						  </select>
						</div>
						<div class="col-md-3 col-12">
						  <select id="cars3" class="custom-select form-control">
							<option value="R"  <?php if($thirdVal=="R")  {echo "selected";} ?> >R Realistic</option>
							<option value="I" <?php if($thirdVal=="I")  {echo "selected";} ?> >I Investigative</option>
							<option value="A" <?php if($thirdVal=="A")  {echo "selected";} ?> >A Artistic</option>
							<option value="S" <?php if($thirdVal=="S")  {echo "selected";} ?> >S Social</option>
							<option value="E" <?php if($thirdVal=="E")  {echo "selected";} ?> >E Enterprising</option>
							<option value="C" <?php if($thirdVal=="C")  {echo "selected";} ?> >C Conventional</option>
						  </select>
						</div>
						<div class="col-md-3 col-12">
							<a href="javascript:void(0);" id="careerexplorer" class="btn btn-success" style="width: 100%;">Search</a>
						</div>
						<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
						<input type="hidden" name="initialSearch" id="initialSearch" value="{{ $initialSearch }}">
					  </div> 
					<div class="row">
						<div class="col-md-12 col-12">
						<br />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-12">
							<div class="tab-content tabs-vertical" id="mysearchContent">
							
							</div>         					
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
</x-app-layout>
<script>
var initialSearch	=	$('#initialSearch').val();
if(initialSearch == '1'){
	var firstSelect = $('#cars').find(":selected").val();
	var secondSelect = $('#cars2').find(":selected").val();
	var thirdSelect = $('#cars3').find(":selected").val();		
	searchcareer(firstSelect, secondSelect, thirdSelect);
}

$(document).on("click", '#careerexplorer', function(event) {
	var firstSelect = $('#cars').find(":selected").val();
	var secondSelect = $('#cars2').find(":selected").val();
	var thirdSelect = $('#cars3').find(":selected").val();	
	searchcareer(firstSelect, secondSelect, thirdSelect);
});

function searchcareer(firstSelect, secondSelect, thirdSelect) {
	$('.loader').show();
	var data = {
		"_token": $('#token').val(),
		"firstSelect": firstSelect,
		"secondSelect": secondSelect,
		"thirdSelect": thirdSelect
	};
	$.ajax({
		type: 'POST',
		url: 'searchcareer',
		data: data,
		// dataType:"json",
		success: function(response) {
			$('#resultstable').DataTable().destroy();
			$('.loader').hide(); 
			$('#mysearchContent').html(response);
			$('#resultstable').DataTable({
				paging: true,
				searching: true,
				ordering: false,
				pageLength: 10, // Cards per page
				lengthChange: false,
				info: true,
				"language": {
					search: "",
					"paginate": {
						"previous": '<i class="material-icons">chevron_left</i>',
						"next": '<i class="material-icons">chevron_right</i>',                   
					},
					"info": "Show <b>_START_</b> to <b>_END_</b> of <b>_TOTAL_</b> result" // Custom info text
				},
				initComplete: function() {
				  // Add the search icon and placeholder text
				  var searchInput = $('#myjournalDashboard_filter input');
				  
				  // Add the placeholder
				  searchInput.attr('placeholder', 'Search here')
					.addClass('form-control position-relative form-control ps-4 outline-0'); // Add Bootstrap styling and relative position
			  
				  // Add the Material icon inside the search input
				  searchInput.wrap('<div class="position-relative comman-form"></div>'); // Wrap the input for positioning
				  searchInput.before('<i class="material-icons position-absolute top-50 start-10 translate-middle">search</i>'); // Add the icon
			   
				}
			  });
		}
	});
}
</script>
