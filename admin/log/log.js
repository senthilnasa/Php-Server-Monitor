const serverListHead = $('#serverList > thead');
const serverListBody = $('#serverList > tbody');

  $(document).ready(() => {
        $('body').fadeIn(1000);
        $('.sidenav').sidenav();
        $(':button').prop('disabled', true);

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
                var d = new Date(f.x);
                  
                html += '<tr>';
                html += '<td>' + d.toLocaleString() + '</td>';
                html += '<td>' + f.ip + '</td>';
                if(f.state){
                    html += '<td><a class="waves-effect waves-light btn tooltipped" data-position="top" data-tooltip="Login Success"><i class="material-icons ">thumb_up</i></a></td>';
                }
                else{
                    html += '<td><a class="waves-effect waves-light btn red tooltipped" data-position="top" data-tooltip="Login Failed"><i class="material-icons" >thumb_down</i></a></td>';
                }
                html += '</tr>';
                s++;
            });
        }
        serverListBody.html(html);
        $('.tooltipped').tooltip();
        serverListBody.fadeIn(1000);
    }

    function servers(){
        let func = (list) => {
            setTable(list);
        }
        let err = () => {
            toast('try again later!');
        }
        ajax('/api/data/', { "fun": "login_log" }, func, err);
    }
