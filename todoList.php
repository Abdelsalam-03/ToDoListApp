<?php 

    $pageTitle = "Home";
    include("components/header.php");
    if (!isset($_SESSION['userName'])) {
        header("location: index.php");
        exit();
    } 

    ["userName" => $userName, "userFile" => $userFile] = $_SESSION;

    include("utility/functions.php");
    include("handlers/todoList-handler.php");
    include("pages/todoList-page.php");

?>


<?php 

    include("components/footer.php");

?>