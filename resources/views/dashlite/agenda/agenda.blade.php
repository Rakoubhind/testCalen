<!DOCTYPE html>
<html>
<head>
  <title>Laravel Fullcalender Add/Update/Delete Event Example Tutorial - Tutsmake.com</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
<link rel="stylesheet" href="fullcalendar.css">

<body>

  <div class="container">
      <div class="response"></div>
      <div id='calendar'></div>  
      <div id="fullCalModal" class="modal fade" style="opacity:1;margin-top:200px" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Remove</button>
                </div>
            </div>
        </div>
       </div>
  </div>
  
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="fullcalendar.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
    events={!! json_encode($events) !!};
    var SITEURL = "{{url('/')}}";
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var calendar = $('#calendar').fullCalendar({
        header: {
      left: 'prev,next today',
      center: 'title',
      right: 'year,month,basicWeek,basicDay'

    },
    timezone: 'local',
    height: "auto",
    selectable: true,
    dragabble: true,
    defaultView: 'month',
    yearColumns: 3,

    durationEditable: true,
    bootstrap: false,
    editable: true,
    // events: SITEURL + "fullcalendar",
    events : events ,
    eventClick: function (event) {

// $(".fc-event-container").attr("data-toggle", "tooltip").attr("data-placement", "bottom").attr("title", event.title).tooltip();
$('#fullCalModal').modal('show');
$('#fullCalModal .modal-body ').text(event.title);

},
    displayEventTime: true,
    editable: true,
    eventRender: function (event, element, view) {
    if (event.allDay === 'true') {
    event.allDay = true;
    } else {
    event.allDay = false;
    }
    },
    selectable: true,
    selectHelper: true,

    select: function (start, end, allDay) {
    var title = prompt('Event Title:');
    if (title) {
    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    $.ajax({
    url: SITEURL + "fullcalendar/create",
    data: 'title=' + title + '&amp;start=' + start + '&amp;end=' + end,
    type: "POST",
    success: function (data) {
    displayMessage("Added Successfully");
    }
    });
    calendar.fullCalendar('renderEvent',
    {
    title: title,
    start: start,
    end: end,
    allDay: allDay
    },
    true
    );
    }
    calendar.fullCalendar('unselect');
    },
    eventDrop: function (event, delta) {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    $.ajax({
    url: SITEURL + 'fullcalendar/update',
    data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
    type: "POST",
    success: function (response) {
    displayMessage("Updated Successfully");
    }
    });
    },
    // eventClick: function (event) {
    // var deleteMsg = confirm("Do you really want to delete?");
    // if (deleteMsg) {
    // $.ajax({
    // type: "POST",
    // url: SITEURL + 'fullcalendar/delete',
    // data: "&amp;id=" + event.id,
    // success: function (response) {
    // if(parseInt(response) > 0) {
    // $('#calendar').fullCalendar('removeEvents', event.id);
    // displayMessage("Deleted Successfully");
    // }
    // }
    // });
    // }
    // }
    });
    });
    function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
    </script>
</body>
</html>