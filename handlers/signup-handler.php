<?php

/**
    sign up process:
    get the user name and the password from the user.
    check if the user name is ligal
    check if the password is logal
    check if the user name is not exist
    save the data
*/

    if (isset($_POST['signUp'])) {
        if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
            ['userName' => $userName, 'password' => $pass, 'confirmPassword' => $passConfirm] = $_POST;
            if (!validateThenSanitize($userName, 6)) {
                echo "User Name not valid";
            } else {
                if ($pass === $passConfirm) {
                    if (!validateThenSanitize($pass, 6)) {
                        echo "password not valid";
                    } else {
                        if (!checkUser($userName)) {
                            $pass = password_hash($pass, PASSWORD_BCRYPT);
                            $fileName = createTodoListFile($userName);
                            addUser($userName, $pass, $fileName);
                            header("location: login.php");
                            exit();
                        } else {
                            echo "user name exists";
                        }
                    }
                } else {
                    echo "Password not equivelant";
                }
            }
        }
    }

    
    

?>