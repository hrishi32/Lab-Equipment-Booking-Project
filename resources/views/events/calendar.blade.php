<?php
use App\Http\Controllers\UserController;
      $userid = Auth::user()->id;
      $username = Auth::user()->name;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css"> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        right: 'timelineDay,listDay,providerAgenda2Day,timelineWeek,listWeek,month,timelineMonth'
      },
      views: {
          listDay: {
            // options apply to basicWeek and agendaWeek views
            slotLabelFormat: ['ddd, MMM D', 'H:mm'],
            type: 'agenda',
            duration: { days: 7 },
            buttonText: "day List",
            allDaySlot: false,
            displayEventTime: true,
            groupByResource: true,
          },
          listWeek: {
            // options apply to basicWeek and agendaWeek views
            slotLabelFormat: ['ddd, MMM D', 'H:mm'],
            type: 'agenda',
            duration: { days: 7 },
            buttonText: "week List",
            allDaySlot: false,
            displayEventTime: true,
            groupByResource: true,
          },  
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
            type: 'timeline',
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

          $('#toolName').html('');
          $('#userName').html('');
          $("#startTime").html('');
          $("#endTime").html('');
          $("#deleteEventSubmit").hide();
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
      eventClick: function (event, element, resource) {
          console.log("eventClick");
              // var x = $('input[name=event_id]').val();
              // alert(x);
              var resource = $("#calendar").fullCalendar("getResourceById",event.resourceId);
              // $(element).find(".fc-list-item-title").append("<div>"+resource.title+"</div>");
              $('#toolName').html(resource.title);
              $('#userName').html(event.title);
              $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
              $("#endTime").html(moment(event.end).add(1,'seconds').format('MMM Do h:mm A'));

              $("#deleteEventSubmit").show();
              if(event.pid== '{{$userid}}' ) $('input[name=event_id]').val(event.id);
              if(event.pid != '{{$userid}}' ) $("#deleteEventSubmit").hide();
      },
      eventMouseOver: function (event, element, resource) {
          console.log("eventMouseOver");
              // var x = $('input[name=event_id]').val();
              // alert(x);
              var resource = $("#calendar").fullCalendar("getResourceById",event.resourceId);
              // $(element).find(".fc-list-item-title").append("<div>"+resource.title+"</div>");
              $('#toolName').html(resource.title);
              $('#userName').html(event.title);
              $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
              $("#endTime").html(moment(event.end).add(1,'seconds').format('MMM Do h:mm A'));

              $("#deleteEventSubmit").show();
              if(event.title== '{{$username}}' ) $('input[name=event_id]').val(event.id);
              if(event.title != '{{$username}}' ) $("#deleteEventSubmit").hide();
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
          // element.attr('href', 'javascript:void(0);');
          
          // element.click(function() {
              
          // });
        },
        eventAfterRender: function (event, element) {
          // element.attr('href', 'javascript:void(0);');
          
          // element.click(function() {
              
          // });
        },
    });
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
    overflow-x: scroll;
    max-width: 1000px;
    height:1000px;
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

@if ( Session::has('status') )
    <div class="alert alert-success alert-dismissable" id="event_status">
        {{ Session::get('status') }}
    </div>
@endif

<div id="sidebar">
    <button id="datepicker"><?php echo 'Date Picker'; ?></button>
    
    <div id="eventContent" title="Event Details" class="alert-danger">
      <b>Booked By :</b> <span id="userName"></span><br>
      <b>Tool :</b> <span id="toolName"></span><br>
      <b>Start :</b> <span id="startTime"></span><br>
      <b>End :</b> <span id="endTime"></span><br>
      <form method="post" action="{{url('events')}}" id="eventDeleteForm">
        @csrf
        <div class="form-group">
          {!! Form::hidden('event_id', null, ['class' => 'form-control']) !!}
        </div>
        <button  class="btn btn-success" id="deleteEventSubmit">Delete Booking</button>
      </form>
  </div>
  
  <br>

  <div id='event_form'>

    {!! Form::model("events", ['action' => ['EventsController@store'],'id'=>'eventSubmit' ])!!}
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
    '150'=> '2 hr 30 min',
    '180'=> '3 hr',
    '210'=> '3 hr 30 min',
    '240'=> '4 hr',
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

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open" hidden>Open Modal</button>
<form method="post" action="{{url('events')}}" id="form"> -->
        <!-- @csrf -->
  <!-- Modal -->
  <!-- <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
      	
        <h5 class="modal-title">Lab Slot Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-4">
              <label for="Event_id">Booking Id:</label>
              <input type="number" class="form-control" name="_event_id" id="_event_id" hidden>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="Event_date">Booking Date:</label>
              <input type="date" class="form-control" name="event_date" id="event_date">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="Event_time">startTime:</label>
              <input type="time" class="form-control" name="event_time" id="event_time" value="">
            </div>
          </div>
          <div class="row">
              <div class="form-group col-md-4">
                <label for="Event_duration">Event Duration:</label>
                <select class="form-control" id="event_duration" name="event_duration">
                  <option value="30" selected="selected">30 min</option>
                  <option value="60">1 hr</option>
                  <option value="90">1 hr 30 min</option>
                  <option value="120">2 hr</option>
                </select>
              </div>
          </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  class="btn btn-success" id="editEventSubmit">Update Booking</button>
        <button  class="btn btn-success" id="_deleteEventSubmit">Delete Booking</button>
        </div>
    </div>
  </div>
</div>
  </form> -->
  <script>
    $('#event_status').fadeTo(2000,500).slideUp(500,function(){
      $('#event_status').slideUp(500);
    });
  </script>
        <script>
         jQuery(document).ready(function(){
          jQuery('#eventSubmit').submit(function(e){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
            });
            e.preventDefault();
              console.log("eventSubmitted ")
               jQuery.ajax({
                  url: "{{url('/events')}}",
                  method: 'post',
                  data: $(this).serialize(),
                  success: function(result){

                    console.log(result);
                    alert(result);
                    // console.log({{ Session::get('status') }});
                  //   $('#event_status').fadeTo(2000,500).slideUp(500,function(){
                  //   $('#event_status').slideUp(500);
                  // });
                    // demo.showNotification('top', 'left');
                    // color = Math.floor((Math.random() * 4) + 1);
                    // type = ['','info','success','warning','danger'];
                    // $.notify({
                    //     icon: "ti-gift",
                    //     message: result

                    //   },{
                    //       type: type[color],
                    //       timer: 2000,
                    //       allow_dismiss: true,
                    //       animate: {
                    //           enter: 'animated fadeInDown',
                    //           exit: 'animated fadeOutUp'
                    //         },
                    //       placement: {
                    //           from: top,
                    //           align: 'left'
                    //       }
                    //   });
                      if(result.errors){
                        
                      }
                      else{
                        
                      }
                      $('#calendar').fullCalendar('refetchEvents');
                      // $('#toolName').html('');
                      // $('#userName').html('');
                      // $("#startTime").html('');
                      // $("#endTime").html('');
                  
                  // error: function(result){
                  //   alert(result);
                  // }
                }
                  });
               });
              //  jQuery('#editEventSubmit').click(function(e){
              //  e.preventDefault();
              //  $.ajaxSetup({
              //     headers: {
              //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              //     }
              // });
              // var id = $('input[name=event_id]').val();
              // // alert(id);
              //  jQuery.ajax({
              //     url: "{{url('/events')}}"+'/'+id,
              //     method: 'post',
              //     data: {
              //        _method:'PUT',
              //        _token: '{{csrf_token()}}',
              //        id:jQuery('#event_id').val(),
              //        name: jQuery('#name').val(),
              //       //  club: jQuery('#club').val(),
              //       //  country: jQuery('#country').val(),
              //       //  score: jQuery('#score').val(),
              //     },
              //     success: function(result){

              //       // alert(result);
              //     	if(result.errors)
              //     	{
              //     		jQuery('.alert-danger').html('');

              //     		jQuery.each(result.errors, function(key, value){
              //     			jQuery('.alert-danger').show();
              //     			jQuery('.alert-danger').append('<li>'+value+'</li>');
              //     		});
              //     	}
              //     	else
              //     	{
              //     		jQuery('.alert-danger').hide();
              //     		$('#open').hide();
              //     		$('#myModal').modal('hide');
              //         $('#calendar').fullCalendar('removeEvents', id);
              //     	}
              //     }
              //     // error: function(result){
              //     //   alert(result);
              //     // }
              //     });
              //  });
            // });
            jQuery('#deleteEventSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              var id = $('input[name=event_id]').val();
              console.log("deleteEventSubmitted ")
              if(id==''){
                alert('Select a booking in order to delete it.');
              }
              else{
               jQuery.ajax({
                  url: "{{url('/events')}}"+'/'+id,
                  method: 'post',
                  data: {
                     id:jQuery('#event_id').val(),
                     _method:'DELETE',
                     _token: '{{csrf_token()}}',
                    //  name: jQuery('#name').val(),
                    //  club: jQuery('#club').val(),
                    //  country: jQuery('#country').val(),
                    //  score: jQuery('#score').val(),
                  },
                  success: function(result){
                    
                    console.log(result);
                  	if(result.errors)
                  	{
                  		// jQuery('.alert-danger').html('');

                  		// jQuery.each(result.errors, function(key, value){
                  		// 	jQuery('.alert-danger').show();
                  		// 	jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		// });
                  	}
                  	else
                  	{
                  		// jQuery('.alert-danger').hide();
                  		// $('#open').hide();
                  		// $('#myModal').modal('hide');
                  	}
                      $('#calendar').fullCalendar('removeEvents', id);
                      $('#toolName').html('');
                      $('#userName').html('');
                      $("#startTime").html('');
                      $("#endTime").html('');
                  }
                  // error: function(result){
                  //   alert(result);
                  // }
                  });
              }
               });
              //  jQuery('#editEventSubmit').click(function(e){
              //  e.preventDefault();
              //  $.ajaxSetup({
              //     headers: {
              //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              //     }
              // });
              // var id = $('input[name=event_id]').val();
              // // alert(id);
              //  jQuery.ajax({
              //     url: "{{url('/events')}}"+'/'+id,
              //     method: 'post',
              //     data: {
              //        _method:'PUT',
              //        _token: '{{csrf_token()}}',
              //        id:jQuery('#event_id').val(),
              //        name: jQuery('#name').val(),
              //       //  club: jQuery('#club').val(),
              //       //  country: jQuery('#country').val(),
              //       //  score: jQuery('#score').val(),
              //     },
              //     success: function(result){

              //       // alert(result);
              //     	if(result.errors)
              //     	{
              //     		jQuery('.alert-danger').html('');

              //     		jQuery.each(result.errors, function(key, value){
              //     			jQuery('.alert-danger').show();
              //     			jQuery('.alert-danger').append('<li>'+value+'</li>');
              //     		});
              //     	}
              //     	else
              //     	{
              //     		jQuery('.alert-danger').hide();
              //     		$('#open').hide();
              //     		$('#myModal').modal('hide');
              //         $('#calendar').fullCalendar('removeEvents', id);
              //     	}
              //     }
              //     // error: function(result){
              //     //   alert(result);
              //     // }
              //     });
              //  });
            });
      </script>
      <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>



</body>
</html>
