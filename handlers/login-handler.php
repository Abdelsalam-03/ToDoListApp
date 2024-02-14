<?php

    /**
        log in process:
        get the user name and the password from the user.
        check if the user name is exist
        check if the password is correct
        redirect to home page
    */

    if (isset($_POST['logIn'])) {
        if (isset($_POST['userName']) && isset($_POST['password'])) {
            ['userName' => $userName, 'password' => $pass] = $_POST;
            $checkResult = checkUser($userName, $pass);
            if ($checkResult) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['userName'] = $userName;
                $_SESSION['userFile'] = $checkResult;
                header("location: todoList.php");
                exit();
            } else {
                echo "Wrong";
            }
        }
    }

?>