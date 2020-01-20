<?php 

    $password = '1234';

    echo 'mot de passe:'.$password.'<br>';
    
    $encoded_password = password_hash($password, PASSWORD_DEFAULT);

    echo 'encoded psswd: '.$encoded_password.'<br><br>';

    if(password_verify($password, $encoded_password)){
        echo 'mot de pass OK!';
    }
    else{
        echo 'mot de passe incorrect';
    }
    
?>