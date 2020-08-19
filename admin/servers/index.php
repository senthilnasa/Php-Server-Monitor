<?php

require '../../includes/main.php';
heads();
?>


<main>
    <div class="row">
                <div class="col s12 m12 p-0">
                    <blockquote>
                        <h5 class="blue-text">Dashboard</h5>
                        <p>Live Server Details</p>
                    </blockquote>
                </div>
        </div>
        <div class="container center-align">
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
<?php
footer();
?>
<script>

const serverListHead = $('#serverList > thead');
const serverListBody = $('#serverList > tbody');

  $(document).ready(() => {
        $('body').fadeIn(1000);
        $('.sidenav').sidenav();
        $(':button').prop('disabled', true);
        $('.tooltipped').tooltip();
        servers();
    });


    function setTable(fee, total) {
        serverListHead.fadeIn(750);
        let html = '';
        if (fee.length == 0 || total == 0) {
            html += '<tr><td colspan="9" class="center">No Sever Deatils found</td></tr>';
            $(':button').prop('disabled', true);
        }
        else {
            let s=1;
            fee.forEach(f => {
        // `server_id`,`label`,`last_offline`,`last_online`,`status`,latency 
        // `server_id`,`server_name`,`type`,`last_offline`,`last_online`,`state`,`active`,`latency`
                html += '<tr>';
                html += '<td>' +s+ '</td>';
                html += '<td>' + f.server_name + '</td>';
                html += '<td><a href="' + f.url + '" target="_blank">' + f.url + '</a></td>';
                html += '<td>' + f.type + '</td>';
                html += '<td>' + f.last_offline + '</td>';
                html += '<td>' + f.last_online + '</td>';
                html += '<td>' + f.latency + '</td>';
                if(f.active){

                    html += '<td>Enabled</td>';
                }
                else{
                    html += '<td>Disabled</td>';

                }
                // if()
                html += '<td ><a class="waves-effect waves-light btn" href="../server/?id=' + f.server_id + '"><i class="material-icons right">settings</i>More</a></td>';
                html += '</tr>';
                s++;
            });
        }
        serverListBody.html(html);
        serverListBody.fadeIn(1000);
    }

    function servers(){
        let func = (list) => {
            setTable(list);
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', { "fun": "server_list" }, func, err);
    }

</script>