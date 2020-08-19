<?php

require '../../includes/main.php';
heads();
?>


    <main>
        
        <div class="container">

			<div class="row">
					<div class="col s12 m12 p-0">
						<blockquote>
							<h5 class="blue-text">Dashboard</h5>
							<p>Live Server Details</p>
						</blockquote>
					</div>
			</div>

            <!-- Dashboard Start -->
                <div class="row">
                        <div class="col s6 m3 white-text tooltipped" data-position="top" data-tooltip="Number of Severs">
                            <div class="card blue darken-1 ">
                                <div class="card-content white-text">
                                    <div class="row">
                                        <div class="col s6">
                                                <i class="material-icons background-round mt-4" style="font-size: 35px;">dns</i>
                                                <!-- <h5>Working</h5> -->
                                        </div>
                                        <div class="col s6">
                                            <h5 class="mb-0 pt-2" id="d1">1885</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6 m3 white-text tooltipped" data-position="top" data-tooltip="Online Severs">
                            <div class="card green darken-1 ">
                                <div class="card-content white-text">
                                    <div class="row">
                                        <div class="col s6">
                                                <i class="material-icons background-round mt-4" style="font-size: 35px;">thumb_up</i>
                                                <!-- <h5>Working</h5> -->
                                        </div>
                                        <div class="col s6">
                                            <h5 class="mb-0 pt-2" id="d2">1885</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6 m3 white-text tooltipped" data-position="top" data-tooltip="Offline Severs">
                            <div class="card red darken-1 ">
                                <div class="card-content white-text">
                                    <div class="row">
                                        <div class="col s6">
                                                <i class="material-icons background-round mt-4" style="font-size: 35px;">thumb_down</i>
                                                <!-- <h5>Working</h5> -->
                                        </div>
                                        <div class="col s6">
                                            <h5 class="mb-0 pt-2" id="d3">1885</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6 m3 white-text tooltipped" data-position="top" data-tooltip="Last Ping / Tested at">
                            <div class="card yellow darken-1 ">
                                <div class="card-content white-text">
                                    <div class="row">
                                        <div class="col s6">
                                                <i class="material-icons background-round mt-4" style="font-size: 35px;">wifi_protected_setup</i>
                                                <!-- <h5>Working</h5> -->
                                        </div>
                                        <div class="col s6">
                                            <h6 class="mb-0 center pt-2" id="d4">Second Ago</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- Dashboard Stop -->
            <!-- Chart Start -->
            <div class="row">
			<div class="col s12 m7 p-0">
				<canvas id="history_short">Your browser does not support the canvas element.</canvas>
			</div>
			<div class="col s12 m5">
				<br>
				<br>
				<canvas id="online_report" ></canvas>
			</div>
			</div>
            <!-- Chart Stop -->

		</div>
               
       
    </main>
<?php
footer();
?>
<script src="dash.js"></script>