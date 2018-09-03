@extends('layouts.dashboard')
@section('toolTableactive', 'class=active')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
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
                                        <th>Date Added</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($tools as $e){
                                            echo '<tr>';
                                            echo '<td> '.$e->id.' </td>';
                                            echo '<td> '.$e->tl_name.' </td>';
                                            echo '<td> '.$e->tl_desc.' </td>';
                                            echo '<td> '.$e->created_at.' </td>';
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
                </div>
            </div>
        </div>
                

@stop
@section('extrascript')
<link rel="stylesheet" type="text/css" href="{{asset('dataTables/cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dataTables/cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css')}}">
    
    <!-- <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js')}}"></script>

  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js')}}"></script>
  <script type="text/javascript" charset="utf8" src="{{asset('dataTables/cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js')}}"></script>
 
<script>
$(document).ready( function () {
    
    $('#toolTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: 'Print all',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            },
            {
                extend: 'print',
                text: 'Print selected'
            },
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            
        ],
        paging: false,
        // scrollY: 400,
        // ordering: true,
        select: true
    });
} );
</script>
@stop