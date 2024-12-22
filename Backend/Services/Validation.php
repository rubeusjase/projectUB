<?php
    function testinput($n)
    {
        $hsl = trim($n);
        $hsl = stripslashes($n);
        $hsl = htmlspecialchars($n);
        return $hsl;
    }

    if(isset($POST['email']))
    {
        include_once('./services/authservice.php');
        $auth = new AuthService(); //instance class AuthService

        $uname = testinput($_POST['email']);
        $upass = testinput($POST['password']);

        if($auth->CekLogin($uname, $upass) == 'Sukses')
        {
            header('Location:index.php');
        }
    }
?>