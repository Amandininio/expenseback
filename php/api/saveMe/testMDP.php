<?php

$mail = ('testmdp@gmail.fr');
$mdp='patoche';


if (password_verify($mdpahacher, $testPatoche)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}

    $hashed_password = password_hash('patoche', PASSWORD_DEFAULT);
    echo $hashed_password;

    // $password= 'patoche';

    // if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
    //     echo "Mot de passe correct !";
    //  } else {
    //      echo 'nope';
    //  }
?>