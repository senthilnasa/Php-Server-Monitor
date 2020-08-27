<?php

if(file_exists("config.php")){
    header("Location: /auth", true);
    die();
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Bitsathy Server Management | Login </title>
    <link type="text/css" rel="stylesheet" href="assets/fonts/material-icon/material-icon.css">
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
    <link type="text/css" rel="stylesheet" href="auth/assets/plane.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex">
</head>

<body class="grade">

    <div class="clouds">

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud big front slowest">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
    c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
    C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
    S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z" />
        </svg>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud distant smaller">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
    c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
    C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
    S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z" />
        </svg>

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud small slow">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
    c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
    C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
    S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z" />
        </svg>

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud distant super-slow massive">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
    c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
    C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
    S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z" />
        </svg>

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px" height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud slower">
            <path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
    c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
    C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
    S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z" />
        </svg>

    </div>

    <div class="container rCenter center " style="margin-top: 1%;">
        <div class="row ">
            <div class="col s12 m6 offset-m3 l6 offset-l3 card ">
                <div class="pt-4 pb-4">
                    <div class="row">
                        <a href="/"><img class="col s12" src="assets/images/logo.png"></a>
                    </div>
                    <!-- Auth Tab start -->
                    <div class="p-1 pt-3">

                        
                            <h5 class="center">DB Config</h5>
                       
                            <div class="row center">

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">link</i>
                                    <input id="d1" autocomplete="off"  type="text" class="validate" required>
                                    <label for="d1">Host Name</label>
                                </div>

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <input id="d2" autocomplete="off"  type="text" class="validate" required>
                                    <label for="d2">User Name</label>
                                </div>

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="d3"  type="password" class="validate" required>
                                    <label for="d3">Password</label>
                                </div>

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">local_mall</i>
                                    <input id="d4"  type="text" class="validate" required>
                                    <label for="d4">Db Name</label>
                                </div>

                                <div class="input-field col s12 center">
                                    <button class="btn waves-effect waves-light" id="loginSubmit" onclick="verifyPass()">Vefiry
                                        <i class="material-icons right">exit_to_app</i>
                                    </button>
                                    <button class="btn waves-effect waves-light" id="SubmitLog" onclick="gen_db()" style="display: none;">Install
                                        <i class="material-icons right">exit_to_app</i>
                                    </button>
                                    <div class="preloader-wrapper small active" id="loginProgress" style="display: none;">
                                        <div class="spinner-layer spinner-green-only">
                                            <div class="circle-clipper left">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="gap-patch">
                                                <div class="circle"></div>
                                            </div>
                                            <div class="circle-clipper right">
                                                <div class="circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>

const loginTab = $('#loginSubmit');
const subTab = $('#SubmitLog');
const loadTab = $('#loginProgress');

let d1;
let d2;
let d3;
let d4;

function verifyPass(){

        d1 = $('#d1').val();
        d2 = $('#d2').val();
        d3 = $('#d3').val();
        d4 = $('#d4').val();

        if(d1.length<2){
            return toast('Invalid host name Id !');
        }
        if(d2.length<1){
            return toast('Invalid User name !');
        }

        if(d4.length<1){
            return toast('Invalid Db name !');
        }

        loginTab.hide();
        loadTab.fadeIn();

        let data = {
            'fun': 'verify_login',
            'd1': d1,
            'd2': d2,
            'd3': d3,
            'd4': d4,
        };

        let func = (data) => {
            $('#config').val(data);
            toast('Db Config check Success');
            auto_grow();
            $('#modal1').modal();
            $('#modal1').modal('open'); 
        }
        let err = () => {
            toast('Invalid Db  Credential!');
        }

        ajax('api/checkdb/', data, func, err);

}

function gen_db(){

     

        let data = {
            'fun': 'db_add',
            'd1': d1,
            'd2': d2,
            'd3': d3,
            'd4': d4,
        };

        let func = (data) => {
            if (data == true) {
                toast('Db Config Success');
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                toast('Unable to genrate db config file!');
                loginTab.fadeIn();
                loadTab.hide();
            }
        }
        let err = () => {
            toast('Please Contact the admin!');
        }

        ajax('api/checkdb/', data, func, err);
}

function auto_grow() {
    element=$('#config');
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}
    </script>

<div id="modal1" class="modal">
    <div class="modal-content">
      <h4 >Create the <b>config.php</b> in home directory</h4>
      <textarea class="center" id="config" oninput="auto_grow()" style="resize: none;
    overflow: hidden;
    min-height: 50px;
    max-height: 100px;"></textarea>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
</body>

</html>