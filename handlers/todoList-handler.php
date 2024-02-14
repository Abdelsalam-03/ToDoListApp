<?php

    if (isset($_POST["addItem"])) {
        $item = $_POST["item"];
        $item = trim($item);
        if ($item) {
            addItemToDo("files/todoLists/" . $userFile, $item);
        }
    }

    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        if ($_POST['delete']) {
            deleteItem("files/todoLists/" . $userFile, $id);
        } elseif ($_POST['toggle']) {
            changeItemState("files/todoLists/" . $userFile, $id);
        }
    }

    $tasks = getTodoList("files/todoLists/" . $userFile);

?>