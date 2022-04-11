$(function() {


		$('#teaching_calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			navLinks: true,
			backgroundColor: '#1f2e86',   
			eventTextColor: '#1f2e86',
			textColor: '#378006',
			events: "http://localhost/mvc-summary/ajax/ajax_events_calendar"
		});

	


});