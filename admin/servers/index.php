<?php

require '../../includes/main.php';
heads();
?>


<main>
    <div class="row">
        <div class="col s12 m12 p-0">
            <blockquote>
                <h5 class="blue-text">Sever Management</h5>
                <p>List of Servers</p>
            </blockquote>
        </div>
    </div>
    <div class="container center-align">
        <a class="btn-floating waves-effect waves-light btn right tooltipped modal-trigger" href="#edit_server" data-position="top" data-tooltip="Add server details"><i class="material-icons">add</i></a>
        <table id="serverList" class="responsive-table highlight centered  ml-2">
            <thead style="display: none;">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>url</th>
                    <th>Type</th>
                    <th>Last Offline</th>
                    <th>Last Online</th>
                    <th>Latency</th>
                    <th>Server Ping Check</th>
                    <th>Tool</th>
                </tr>
            </thead>

            <tbody style="display: none;">

            </tbody>
        </table>

    </div>
    </div>
</main>

<div id="edit_server" class="modal">
    <div class="modal-content">
        <h5>Add Server</h5>
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
<script>
    const serverListHead = $('#serverList > thead');
    const serverListBody = $('#serverList > tbody');

    $(document).ready(() => {
        $('.modal').modal();
        $('body').fadeIn(1000);
        $('.sidenav').sidenav();
        $('select').formSelect();
        $(':button').prop('disabled', true);
        $('.tooltipped').tooltip();
        servers();
    });


    function setTable(data) {
        $('#creat_button').removeAttr("disabled");
        serverListHead.fadeIn(750);
        let html = '';
        if (data.length == 0) {
            html += '<tr><td colspan="9" class="center">No Sever Deatils found</td></tr>';
            $(':button').prop('disabled', true);
        } else {
            let s = 1;
            data.forEach(f => {
                html += '<tr>';
                html += '<td>' + s + '</td>';
                html += '<td>' + f.server_name + '</td>';
                html += '<td><a href="' + f.url + '" target="_blank">' + f.url + '</a></td>';
                html += '<td>' + f.type + '</td>';
                html += '<td>' + f.last_offline + '</td>';
                html += '<td>' + f.last_online + '</td>';
                html += '<td>' + f.latency + '</td>';
                if (f.state) {
                    html += '<td>Enabled</td>';
                } else {
                    html += '<td>Disabled</td>';
                }
                html += '<td ><a class="waves-effect waves-light btn" href="../server/?id=' + f.server_id + '"><i class="material-icons right">settings</i>More</a></td>';
                html += '</tr>';
                s++;
            });
        }
        serverListBody.html(html);
        serverListBody.fadeIn(1000);
    }

    function servers() {
        let func = (list) => {
            setTable(list);
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', {
            "fun": "server_list"
        }, func, err);
    }

    $("#edit_form").submit(function(e) {
    $('#edit_server').modal('close');
    e.preventDefault(); 
    let data = {
        'fun': 'server_add',
        'server_name':$('[name=server_name]').val(),
        'url':$('[name=url]').val(),
        'type': $('[name=type]').val(),
        'telegram': $('[name=telegram]').val(),
        'state': $('[name=state]').val(),
        'email': $('[name=email]').val(),
     };
    let func = (data) => {
        if (data === true) {  
            serverListBody.fadeOut(50);
            toast('Updated Successfully');
            servers();
        }
        else{
            toast('Please Try again');
        }
    }
    let err = () => {
        toast('Please Contact the admin!');
    }

    ajax('/api/data/', data, func, err);
});

</script>