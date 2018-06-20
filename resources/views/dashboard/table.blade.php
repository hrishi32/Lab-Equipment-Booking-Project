@extends('layouts.dashboard')
@section('tableactive', 'class=active')

@section('content')
                <div style="font-size:22px; position:relative">
                    <a href="#usertt">
                        User Table
                    </a>
                
                    <a href="#tooltt">
                        Equipment Table
                    </a>
                </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Bookings Table</h4>
                                <p class="category">List of all lab slots bookings.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="eventTable">
                                    <thead>
                                        <th>ID</th>
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
                                        <th>ID</th>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Equipments Table</h4>
                                <p class="category">List of all equipments.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover" id="toolTable">
                                    <a name="tooltt"></a>
                                    <thead>
                                        <th>Equipment ID</th>
                                        <th>Equipment Name</th>
                                        <th>Equipment Description</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($tools as $e){
                                            echo '<tr>';
                                            echo '<td> '.$e->id.' </td>';
                                            echo '<td> '.$e->tl_name.' </td>';
                                            echo '<td> '.$e->tl_desc.' </td>';
                                            echo '</tr>';
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Equipment ID</th>
                                        <th>Equipment Name</th>
                                        <th>Equipment Description</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users Table</h4>
                                <p class="category">List of all users.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover" id="userTable">
                                    <a name="usertt"></a>
                                    <thead>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($users as $e){
                                            echo '<tr>';
                                            echo '<td> '.$e->id.' </td>';
                                            echo '<td> '.$e->name.' </td>';
                                            echo '<td> '.$e->email.' </td>';
                                            echo '</tr>';
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
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
    $('#toolTable').DataTable({
        paging: false,
        scrollY: 400,
        ordering: true,
        select: true
    });
    $('#userTable').DataTable({
        paging: false,
        scrollY: 400,
        ordering: true,
        select: true
    });
} );
</script>
@stop