<?php
use App\Http\Controllers\UserController;
      $userid = UserController::getUserId();
      $username = UserController::getUserName();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css"> -->

<link href="{{asset ('full_calendar_scheduler/lib/fullcalendar.min.css') }}" rel='stylesheet' />
<link href="{{asset ('full_calendar_scheduler/lib/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
<link href="{{asset ('full_calendar_scheduler/scheduler.min.css') }}" rel='stylesheet' />
<script src="{{asset ('full_calendar_scheduler/lib/moment.min.js') }}"></script>
<script src="{{asset ('full_calendar_scheduler/lib/jquery.min.js') }}"></script>
<script src="{{asset ('full_calendar_scheduler/lib/fullcalendar.min.js') }}"></script>
<script src="{{asset ('full_calendar_scheduler/scheduler.min.js') }}"></script>

<script src="{{asset ('full_calendar_scheduler/lib/jquery-ui.min.js') }}"></script> 

<link href="{{asset ('calendar/index.css') }}" rel='stylesheet' />
<link href="{{asset ('css/jquery.datetimepicker.css') }}" rel='stylesheet' />
<script src="{{asset ('js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{asset ('js/js.cookie/js.cookie.js') }}"></script>
<script src="{{asset ('js/dialog.js') }}"></script>


<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>  -->

<script>

  $(document).ready(function() {
    
    $('#datepicker').datetimepicker({
      
        timepicker: false,
        // inline: true,
        //weeks:true,
        todayButton: true,
        onChangeDateTime: function(d) {
          $('#calendar').fullCalendar('gotoDate', d);
        },
        onChangeMonth: function(d) {
          $('#calendar').fullCalendar('gotoDate', d);
        }
    });

      var title_week = '<?php echo 'week'; ?>';
      var title_agenda2 = '<?php echo '2 day'; ?>';
      var title_agenda = '<?php echo '1 day'; ?>';
      var title_search = '<?php echo 'search'; ?>';
      var title_print = '<?php echo 'print'; ?>';

    $('#calendar').fullCalendar({
      schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
      // themeSystem:'bootstrap4',
      
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'timelineDay,providerAgenda,listDay,providerAgenda2Day,providerAgendaWeek,month,timelineMonth,listWeek'
      },
      views: {
          providerAgendaWeek: {
            // options apply to basicWeek and agendaWeek views
            slotLabelFormat: ['ddd, MMM D', 'H:mm'],
            type: 'agenda',
            duration: { days: 7 },
            buttonText: title_week,
            allDaySlot: false,
            displayEventTime: false,
            groupByResource: true,
          },
          providerAgenda2Day: {
            type: 'agenda',
            duration: { days: 2 },
            buttonText: title_agenda2,
            allDaySlot: false,
            displayEventTime: false,
            groupByResource: true,
            // groupByDateAndResource: true,            
          },
          providerAgenda: {
            type: 'agenda',
            duration: { days: 1 },
            buttonText: title_agenda,
            allDaySlot: false,
            displayEventTime: false,
            groupByDateAndResource: true
          }
        },
      // defaultDate: '2018-06-13',
      // selectHelper: true,
      // now: '2018-04-07',
      // editable: true, // enable draggable events
      // aspectRatio: 1.8,
      // scrollTime: '00:00',

        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        defaultView: 'timelineDay',
        defaultTimedEventDuration: '00:30:00',
        editable: false,
        eventOverlap: false,
        eventLimit: true, // allow "more" link when too many events

        select: function(start, end, jsEvent, view, resource) {
          
          // dlgopen('events/create?' + '&starttimeh=' + start.get('hours') + '&toolid=' + resource.id +
          // '&starttimem=' + start.get('minutes') + '&date=' + start.format('YYYY-MM-DD') // + '&catid=' + 0
          //  ,'_blank'  , 775, 375);
           $('input[name=title]').val('<?php echo $username; ?>');
           $('input[name=tl_id]').val(resource.id);
           $('input[name=pid]').val(<?php echo $userid; ?>);
           $('input[name=eventDate]').val(start.format('YYYY-MM-DD'));
           $('input[name=startTime]').val(start.format('HH:mm'));
          //  var x = $('input[name=startTime]').val();
          //  alert(x)
        },

      events : {
        url : "/getevents",
        type : 'GET',
        error:function(){
            alert("There is an error in fetching events bookings. Please ensure you are logged in");
          },
        success:function(doc){
          console.log("Success : Events retieved!");
        //   console.log(doc);
        }
      },
   
    resourceAreaWidth: "25%",
    resourceLabelText: 'Equipment Name',
    
      resources: {  
          url : '/gettoolsname',
          type : 'GET',
          success : function (doc) {
            console.log('Success : Resources retrieved!');
            // console.log(doc);
          },
          error : function () {
            console.log('Error : Couldn\'t fetch resources!');
          }
        },
        eventRender: function (event, element) {
          element.attr('href', 'javascript:void(0);');
          
          element.click(function() {
              // alert(event.resourceId);
              var resource = $("#calendar").fullCalendar("getResourceById",event.resourceId);
              $(element).find(".fc-list-item-title").append("<div>"+resource.title+"</div>");
              $('#toolName').html(resource.title);
              $('#userName').html(event.title);
              $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
              $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
          });
        }
    });
  });
  
  </script>
  <script>
    $('#event_status').fadeTo(2000,500).slideUp(500,function(){
      $('#event_status').slideUp(500);
    });
    
  </script>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    height:900px;
    margin: 0 auto;
  }
  /* #event_form {
    max-width: 200px;
    margin: 0 auto;
  } */
  .ui-widget-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.ui-front {
    z-index: 100;
}
</style>
</head>
<body>

@if (session('status'))
    <div class="alert alert-success alert-dismissable" id="event_status">
        {{ session('status') }}
    </div>
@endif
<div id="sidebar">
    <button id="datepicker"><?php echo 'Date Picker'; ?></button>
    
    <div id="eventContent" title="Event Details" class="alert-danger">
      <b>Booked By :</b> <span id="userName"></span><br>
      <b>Tool :</b> <span id="toolName"></span><br>
      <b>Start :</b> <span id="startTime"></span><br>
      <b>End :</b> <span id="endTime"></span><br>
  </div><br>

  <div id='event_form'>

    {!! Form::model("events", ['action' => ['EventsController@store']])!!}
    <!-- {!! Form::token(); !!} -->
    
    
    <div class="form-group">
    <!-- {!! Form::label('title', 'Event Title :') !!} -->
    {!! Form::hidden('title',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    EventDate : {!! Form::date('eventDate', null, ['class' => 'form-control']) !!}
    </div>
    <!-- EndDate : {!! Form::date('endDate', \Carbon\Carbon::now()); !!}<br> -->
    <div class="form-group">
    startTime : {!! Form::time('startTime',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('duration', 'Event Duration :') !!}    
    {!! Form::select('duration', array(
    '30' => '30 min',
    '60' => '1 hr',
    '90' => '1 hr 30 min',
    '120'=> '2 hr',
    ), '30', ['class' => 'form-control']) !!}
    </div>
    <!-- <div class="form-group">
    endTime : {!! Form::time('endTime',null, ['class' => 'form-control']) !!}
    </div> -->
    <div class="form-group">
    {!! Form::hidden('pid', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::hidden('tl_id', 0, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Click Me!', ['class' => 'btn btn-info']) !!}
    {!! Form::close() !!}<br>
  </div>

    


</div>
<div id="calendar-container">
    <div id='calendar'></div>
</div>

</body>
</html>
