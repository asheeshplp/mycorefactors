$(document).ready(function() { 
	var page = $('#pagename').val();
	
	$("ul.reportdatedroplist li:first-child a").click();
	
	if(page == 'eqreportpage') {
		var $content = $('.menu-content');
		
		showContent('introduction');
		$('.nav-tabs').on('click', '.menu-btn', function(e) { 
			var classcheck = $(e.target).attr('class');
			if(classcheck == 'dropdown-item') {
				// scrollToContent('#overall-picture', '#equnderstandingTab', '#eq-skills-content');
			} else {
				var tabid = $(this).attr('id');
				if(tabid == 'eqskills') {
					$('#eqskills').find('.dropdown-menu').removeClass('hide');
					$('#eqskills').find('.dropdown-menu').addClass('show');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').addClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'introduction') {
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').addClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'reported-results-tab') {
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').addClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'references') {
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').addClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'eq-dimension-competencies') {
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').addClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'interpretingtab') {
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').addClass('show');
					$('#interpretingtab').find('.dropdown-menu').removeClass('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'eqdimensioncompetencies') {
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').add('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'actiontips') {
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').add('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').addClass('show');
					$('#actiontips').find('.dropdown-menu').removeClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
					$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
				} else if(tabid == 'understanding-self-report') {
					$('#eqskills').find('.dropdown-menu').removeClass('show');
					$('#eqskills').find('.dropdown-menu').addClass('hide');
					
					$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
					$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
					
					$('#interpretingtab').find('.dropdown-menu').removeClass('show');
					$('#interpretingtab').find('.dropdown-menu').add('hide');
					
					$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
					$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
					
					$('#actiontips').find('.dropdown-menu').removeClass('show');
					$('#actiontips').find('.dropdown-menu').addClass('hide');
					
					$('#understanding-self-report').find('.dropdown-menu').addClass('show');
					$('#understanding-self-report').find('.dropdown-menu').removeClass('hide');
				}
				showContent(tabid);
				e.preventDefault();
				e.stopPropagation();
			}
		});
		
		
		
	} else if(page == 'cpreportpage') {
		var $content = $('.menu-content');
		
		showContentcp('introduction');
		$('.nav-tabs').on('click', '.menu-btn', function(e) { 
			e.preventDefault();
			e.stopPropagation();
			var classcheck = $(e.target).attr('class');
			if(classcheck == 'dropdown-item') {
				// scrollToContent('#overall-picture', '#equnderstandingTab', '#eq-skills-content');
			} else {
				var tabid = $(this).attr('id');
				if(tabid == 'careeroccupation') {
					
				}
				showContentcp(tabid);				
			}
		});
	} else if(page == 'sdreportpage') {
		var $content = $('.menu-content');
		
		showContentsd('introductionsd');
		$('.nav-tabs').on('click', '.menu-btn', function(e) { 
			e.preventDefault();
			e.stopPropagation();
			var classcheck = $(e.target).attr('class');
			if(classcheck == 'dropdown-item') {
				// scrollToContent('#overall-picture', '#equnderstandingTab', '#eq-skills-content');
			} else {
				var tabid = $(this).attr('id');
				if(tabid == 'careeroccupation') {
					
				}
				showContentsd(tabid);				
			}
		});
	}
	$(document).on("click", '.dateselection', function(event) {
		var page = $('#pagename').val();
		if($('#reportDateDropdown').html() == $(this).html()) {
			$('#reportid').val($(this).attr('id'));
			$('#selecteddate').val($(this).html());
		} else {		
			// alert($(this).attr('id'));
			$('#reportDateDropdown').html($(this).html())
			$('#reportid').val($(this).attr('id'));
			$('#selecteddate').val($(this).html());
			//get active tab
			var activetab = $('#selectedtab').val();
			// alert($('#selectedtab').val());
			var reportid = ($(this).attr('id'));
			$('.loader').show();
			var data = {
				"_token": $('#token').val(),
				"reportid": reportid,
				"page": page
			};
			$.ajax( {
				type: 'POST',
				url: 'getreportpdffile',
				data: data,
				datatype: 'json',
				success: function(result) {
					$("#downloadbtn").prop("href", result)
					$('.loader').hide(); 
					if(page == 'cpreportpage') { alert();
						showContentcp(activetab);    
					} else if(page == 'eqreportpage') {
						showContent(activetab);  
					} else if(page == 'sdreportpage') {
						showContentsd(activetab);  
					}					
				}
			});
			
			
		}
	});
});