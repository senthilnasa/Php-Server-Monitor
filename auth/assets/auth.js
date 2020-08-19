
const loginTab = $('#loginSubmit');
const loadTab = $('#loginProgress');

let login = $('#login_id');
let pass = $('#login-pass');

function verifyPass(){
    login = $('#login_id').val();
    pass = $('#login-pass').val();

    if(login.length<2){
        return toast('Invalid User Id !');
    }
    if(pass.length<2){
        return toast('Invalid Password !');
    }
    loginTab.hide();
    loadTab.fadeIn();

    let data = {
        'fun': 'verify_login',
        'login': login,
        'pass': pass
    };

    let func = (data) => {
        if (data === true) {
            toast('Login Success');
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            toast('Invalid User Details!');
            loginTab.fadeIn();
            loadTab.hide();
        }
    }
    let err = () => {
        toast('Please Contact the admin!');
    }

    ajax('/api/auth/', data, func, err);
}