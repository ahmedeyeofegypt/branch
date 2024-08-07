<?php

require_once('lib/Response.php') ;
const SERVER = 'localhost';
const DB     = 'eoe_db';
$res = new Response() ;

if(isset($_POST['api'])){
    
    try {
        $conn = new mysqli(SERVER, $_POST['uid'], $_POST['pwd'], DB);
        $conn->close();
        if($conn){       
            session_start() ;
            $_SESSION['user'] = "true" ;
            $_SESSION['uid'] = $_POST['uid'] ;
            $_SESSION['pwd'] = $_POST['pwd'] ;
            $res->status = "success" ;
            echo json_encode($res) ;
        }
    }catch(Exception $ex) {
        $res->status = "error" ;
        $res->message = $ex->getMessage() ;
        echo json_encode($res) ;
    }
    return ;
    //exit();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <link rel="stylesheet" href="shared/login.css">
</head>

<body>
    <div class="frm-wrapper">
        <form id="frm-login">
            <fieldset class="fst-lbls">
                <label>Login Panel</label>
                <label id="login-msg" class="lbl-msg">Sign in with your database credentials</label>
            </fieldset>
            <fieldset class="txt-credintial">
                <label for="uid">Username</label>
                <input type="text" id="uid">

                <label for="pwd">Password</label>
                <input type="password" id="pwd">
            </fieldset>
            <fieldset class="btn-fst">
                <input type="button" id="submitbtn" value="Login">
                <a href="#" class="lbl-frget">forget password?</a>
            </fieldset>
        </form>
    </div>
</body>
</html>




<script>
    let submitbtn = document.getElementById('submitbtn');
    let loginMsg = document.getElementById('login-msg');
    let apiUri = "login.php";
    submitbtn.addEventListener('click', function() {

        setTimeout(() => {
            let uid = document.getElementById('uid').value;
            let pwd = document.getElementById('pwd').value;
            var data = "api=true&uid=" + uid + "&pwd=" + pwd;
            
            const req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    let result = this.responseText;
                    console.log(result);
                    let objResponse = JSON.parse(this.responseText);
                    if (objResponse.status == "success") {
                        loginMsg.innerHTML = "Login Sucessfuly ...";
                        loginMsg.style.color = "green";
                        setTimeout(() => {
                            location. reload() ;
                        }, 1000);
                    }
                    if (objResponse.status == "error") {
                        loginMsg.innerHTML = "Login Faild ...";
                        setTimeout(() => {
                            loginMsg.innerHTML = "Sign in with your database credentials";
                            loginMsg.style.color = "black";
                        }, 1000);
                        loginMsg.style.color = "red";
                    }
                };
            };
            req.open("POST", apiUri, false);
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            req.send(data);
        }, 100);
    });
</script>