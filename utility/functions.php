<?php 

    // function to add user to the users file
    function addUser(string $userName, string $password, string $fileName){
        $file = fopen("files/users.csv", "a+");
        fputcsv($file, [$userName, $password, $fileName]);
        fclose($file);
    }

    // function to check if the user name is exist
    // there is option that check the password of that user and return his todo list file name if correct password
    function checkUser(string $userName, string $password = "") : bool|string{
        $file = fopen("files/users.csv", "r");
        $user = fgetcsv($file);
        while($user){
            if ($user[0] === $userName) {
                if (!empty($password)) {
                    if (password_verify($password, $user[1])){
                        return $user[2];
                    } else {
                        return false;
                    }
                }
                return true;
            }
            $user = fgetcsv($file);
        }
        fclose($file);
        return false;
    }

    // funciton to validate inputs and return true if valid and sanitize the input
    function validateThenSanitize(string &$input, int $length = 0):bool{
        $input = trim($input);
        if ($length > 0 && strlen($input) < $length) {
            return false;
        }
        $input = str_replace(" ", "", $input);
        $sanitized = htmlspecialchars($input);
        if ($sanitized === $input) {
            return true;
        } else {
            $input = $sanitized;
            return false;
        }
    }

    // function to create todo list file for the user 
    function createTodoListFile(string $userName):string{
        $todofileName = $userName . time() . ".csv";
        $file = fopen("files/todoLists/" . $todofileName, "w+");
        fclose($file);
        return $todofileName;
    }

    // function to get specific user todo list
    function getTodoList($fileName):array{
        $file = fopen($fileName, "r");
        $list = [];
        $item = fgetcsv($file);
        while($item){
            $list[] = $item;
            $item = fgetcsv($file);
        }
        fclose($file);
        return $list;
    }

    // function to add item to specific user todo list
    function addItemToDo($userFile, $item){
        $content = file($userFile);
        $latest = end($content);
        $file = fopen($userFile, "a+");
        if ($latest) {
            fputcsv($file, [$latest[0]+1, $item, 0]);
            
        } else {
            fputcsv($file, [1, $item, 0]);
        }
        fclose($file);
    }

    //function to delete item from specific user todo list
    function deleteItem($userFile, $itemId){
        $file = fopen($userFile, "r");
        $list = [];
        $item = fgetcsv($file);
        while($item){
            if ($item[0] != $itemId) {
                $list[] = $item;
            }
            $item = fgetcsv($file);
        }
        fclose($file);
        file_put_contents($userFile, "");
        $file = fopen($userFile, "a");
        foreach ($list as $item) {
            fputcsv($file, $item);
        }
        fclose($file);
    }

    //function to delete item from specific user todo list
    function changeItemState($userFile, $itemId){
        $file = fopen($userFile, "r");
        $list = [];
        $item = fgetcsv($file);
        while($item){
            if ($item[0] != $itemId) {
                $list[] = $item;
            } else {
                if ($item[2]) {
                    $item[2] = 0;
                } else {
                    $item[2] = 1;
                }
                $list[] = $item;
            }
            $item = fgetcsv($file);
        }
        fclose($file);
        file_put_contents($userFile, "");
        $file = fopen($userFile, "a");
        foreach ($list as $item) {
            fputcsv($file, $item);
        }
        fclose($file);
    }

?>