@extends('layouts.dashboard')
@section('mapsactive', 'class=active')

@section('content')

		<div class="content">
            <div class="container-fluid">
                <div class="card card-map">
					<div class="header">
                        <h4 class="title">Google Maps</h4>
                    </div>
					<div class="map">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>

@stop

@section('extrascript')
    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>
@stop

