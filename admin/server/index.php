<?php

require '../../includes/main.php';
heads();
?>
<main>
    <div class="container">

        <div class="row">
            <div class="col s12 m12 p-0">
                <blockquote>
                    <h5 class="blue-text">Server Details</h5>
                    <p id="server_title1">Details of </p>
                </blockquote>
            </div>
            <a class="waves-effect waves-light btn" href="../servers/"><i class="material-icons left">keyboard_backspace</i>GO back</a>
            <a class="btn-floating waves-effect waves-light btn right tooltipped red" href="javascript:delServer();" data-position="top" data-tooltip="Delete Server"><i class="material-icons">delete_forever</i></a>
            <a class="right ">&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a class="btn-floating waves-effect waves-light btn right tooltipped modal-trigger" href="#edit_server" data-position="top" data-tooltip="Edit server details"><i class="material-icons">create</i></a>
        </div>

        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image center">
                        <br>
                        <br>
                        <a class="btn-floating  waves-effect waves-light red btn-large" id="server_state"></a>
                        <br>
                    </div>
                    <div class="card-content center">
                        <br>
                        <h5>Server Status</h5>
                    </div>
                </div>
            </div>


            <div class="col s12 m5">
                <div class="card">
                    <ul class="collection with-header">
                        <li class="collection-header center">
                            <h5 id="server_title2">-</h5>
                        </li>
                        <li class="collection-item "><b>
                                <div class="bol">Domain/IP:
                            </b><a href="#!" id="server_url" class="secondary-content">-</a>
                </div>
                </li>
                <li class="collection-item"><b>
                        <div>Type:
                    </b><a href="#!" class="secondary-content" id="server_type">-</a>
            </div>
            </li>
            <li class="collection-item"><b>
                    <div>Status:
                </b><a href="#!" class="secondary-content" id="server_live">-</a>
        </div>
        </li>
        <li class="collection-item"><b>
                <div>Latency:
            </b><a href="#!" class="secondary-content" id="server_lat">-</a>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <div class="col s12 m4">
        <div class="card">

            <ul class="collection with-header">
                <li class="collection-header center">
                    <h5>Status</h5>
                </li>
                <li class="collection-item"><b>
                        <div>Server Ping check:
                    </b><a href="#!" class="secondary-content" id="ping_check">-</a>
        </div>
        </li>
        <li class="collection-item "><b>
                <div class="bol">Last online:
            </b><a href="#!" class="secondary-content" id="ping_last_online">-</a>
    </div>
    </li>
    <li class="collection-item"><b>
            <div>Last offline:
        </b><a href="#!" class="secondary-content" id="ping_last_offline">-</a></div>
    </li>
    <li class="collection-item"><b>
            <div>Last check:
        </b><a href="#!" class="secondary-content" id="ping_last_check">-</a></div>
    </li>
    </ul>
    </div>
    </div>
    <div class="col s12 m7">
        <div class="card">

            <ul class="collection with-header">
                <li class="collection-header center">
                    <h5>Output</h5>
                </li>
                <li class="collection-item "><b>
                        <div class="bol">Last Response:
                    </b><a href="#!" class="secondary-content" id="last_out">Show Details</a>
        </div>
        </li>
        <li class="collection-item"><b>
                <div>Last Error Response:
            </b><a href="#!" class="secondary-content" id="last_e_out">Show Details</a>
    </div>
    </li>
    <li class="collection-item"><b>
            <div>Last Posstive Response:
        </b><a href="#!" class="secondary-content" id="last_p_out">Show Details</a></div>
    </li>
    </ul>
    </div>
    </div>
    <div class="col s12 m5">
        <div class="card">

            <ul class="collection with-header">
                <li class="collection-header center">
                    <h5>Notification</h5>
                </li>

                <li class="collection-item"><b>
                        <div>Email:
                            <a href="#!" class="secondary-content btn-floating " id="email_not">-</a>

                        </div>
                        <br>
                    </b>
                </li>
                <li class="collection-item"><b>
                        <div>Telegram:
                            <a href="#!" class="secondary-content btn-floating" id="tel_not">-</a>
                        </div>
                        <br>

                    </b>
                </li>
            </ul>
        </div>
    </div>



    <div class="col s12 m7">
        <div class="card">

            <div class="btn-group btn-group-toggle right" data-toggle="buttons">
                <label class="btn btn-secondary active">
                    <input type="radio" name="timeframe_short" id="minute" autocomplete="off"> Hour
                </label>
                <label class="btn btn-secondary ">
                    <input type="radio" name="timeframe_short" id="hour" autocomplete="off"> Day
                </label>
                <label class="btn btn-secondary ">
                    <input type="radio" name="timeframe_short" id="day" autocomplete="off"> Week
                </label>
            </div>

            <canvas id="history_short">Your browser does not support the canvas element.</canvas>

        </div>
    </div>
    <div class="col s12 m5">

        <div class="card">
            <br>
            <br>
            <canvas id="online_report"></canvas>
            <br> <br>
            <br>
        </div>
    </div>
    <div class="col s12 m12 ">
        <div class="card">

            <div class="btn-group btn-group-toggle right" data-toggle="buttons">
                <label class="btn btn-secondary ">
                    <input type="radio" name="timeframe_long" class="day" id="day1" autocomplete="off" checked> Week
                </label>
                <label class="btn btn-secondary active">
                    <input type="radio" name="timeframe_long" class="week" id="week" autocomplete="off"> Month
                </label>
                <label class="btn btn-secondary ">
                    <input type="radio" name="timeframe_long" class="month" id="month" autocomplete="off"> Year
                </label>
            </div>

            <canvas id="history_long">Your browser does not support the canvas element.</canvas>

        </div>
    </div>
    </div>



    </div>



    <!-- end -->

    </div>
</main>

  <!-- Modal Structure -->
  <div id="show_err" class="modal">
    <div class="modal-content">
      <h4 id="mod_hea" class="center">-</h4>
      <p  id="mod_bod">-</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  <div id="edit_server" class="modal">
  <div class="modal-content">
        <h5>Update Server Details</h5>
        <br>
        <div class="row">
            <form class="col s12" id="edit_form">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Server Name" name="server_name" type="text" required class="validate">
                        <label for="creat_name">Server Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ip/Url" name="url" type="text" required class="validate">
                        <label for="creat_name">Ip/Url</label>
                    </div>
                </div>
                <div class="row">

                    <div class="input-field col s12">
                        <select required class="validate" name="type">
                            <option value="ping">Ping</option>
                            <option value="service">Service</option>
                            <option value="website">Website</option>
                        </select>
                        <label>Choose server type</label>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select required class="validate" name="telegram">
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                        <label>Telegram Notification</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select required class="validate" name="email">
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                        <label>Email Notification</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select required class="validate" name="state">
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                        <label>Ping Check</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action" id="creat_button">Submit
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div> 
<?php
footer();
?>
<script src="server.js"></script>
