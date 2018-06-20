@extends('layouts.dashboard')
@section('myBookingactive', 'class=active')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Bookings Table</h4>
                                <p class="category">List of all lab slots bookings.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="eventTable">
                                    <thead>
                                        <th>Booking ID</th>
                                        <th>Equipment</th>
                                        <th>Booked By</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>EndTime</th>
                                        <th>EndDate</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($events as $e){
                                            echo '<tr>';
                                            echo '<td> '.$e->id.' </td>';
                                            echo '<td> '.$e->tl_name.' </td>';
                                            echo '<td> '.$e->title.' </td>';
                                            echo '<td> '.$e->eventDate.' </td>';
                                            echo '<td> '.$e->startTime.' </td>';
                                            echo '<td> '.$e->endTime.' </td>';
                                            echo '<td> '.$e->endDate.' </td>';
                                            echo '</tr>';
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Booking ID</th>
                                        <th>Equipment</th>
                                        <th>Booked By</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>EndTime</th>
                                        <th>EndDate</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                    
                </div>
            </div>
        </div>
                

@stop
@section('extrascript')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#eventTable').DataTable({
        paging: false,
        scrollY: 400,
        ordering: true,
        select: true
    });
} );
</script>
@stop