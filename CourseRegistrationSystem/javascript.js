$(document).ready(function(){
	
	$("tr#coursedata").click(function() {
	$(this).addClass('highlight').siblings().removeClass('highlight');

	var course_id = $(this).children("td").map(function() {
		return $(this).text();
	}).get();

	$("#selected-course-id").val(course_id[0]);
	});

	$("tr#enrollment").click(function() {
	$(this).addClass('highlight').siblings().removeClass('highlight'); 
	
	var enrollment_course_id = $(this).children("td").map(function() {
		return $(this).text();
	}).get();
	$("#selected-enrollment-course-id").val(enrollment_course_id[0]);
	});
	
});