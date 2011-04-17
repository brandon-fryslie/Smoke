
$(document).ready(function() {
	
	// $('#runData').hide();
	// $('#runMetrics').hide();
	// $('#readAlignmentResults').hide();
	// $('#consensusDistribution').hide();
	// $('#alignmentDepths').hide();
	// $('#consensusResults').hide();
	// $('#config_info').hide();
	
	// $('#content table').dataTable();
	
	$('#runData_button').bind('click', function (e) {
		$('#runData').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#runMetrics_button').bind('click', function (e) {
		$('#runMetrics').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#readAlignmentResults_button').bind('click', function (e) {
		$('#readAlignmentResults').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#consensusDistribution_button').bind('click', function (e) {
		$('#consensusDistribution').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#alignmentDepths_button').bind('click', function (e) {
		$('#alignmentDepths').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#consensusResults_button').bind('click', function (e) {
		$('#consensusResults').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#config_info_button').bind('click', function (e) {
		$('#config_info').slideToggle();
		e.preventDefault(); return false;
	});
	
	$('#hideAll_button').bind('click', function (e) {
		$('#content div').slideUp();
		e.preventDefault(); return false;
	});
	
	$('#result_dir_dropdown').bind('change', function (e) {
		console.log('changed');
	});
	
});
