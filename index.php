<?php 

    include("components/header.php");
    include("utility/functions.php");
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        header("location: todoList.php");
    }
    $lorem = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit autem vitae quos tenetur ex nulla dignissimos ipsam delectus. Vel deserunt et delectus quos illum explicabo officiis magnam rerum odit perspiciatis!";
    $testTasks = [
        [1, $lorem . $lorem, "0"],
        [2, "Second Item To Do.", "1"],
        [3, "Third Item To Do.", "0"],
        [4, "Fourth Item To Do.", "1"],
        [5, "Fifth Item To Do.", "0"]
    ];
    if (isset($_POST['addItem'])) {
        $testTasks[] = [6, $_POST['item'], "0"];
    }

    if (isset($_POST['change'])) {
        $id = $_POST['id'];
        if ($_POST['delete']) {
            foreach ($testTasks as &$item) {
                if ($item[0] == $id) {
                    $item = [];
                    break;
                }   
            }
        } else {
            foreach ($testTasks as &$item) {
                if ($item[0] == $id) {
                    $item[2] = $item[2] ? "0":"1";
                    break;
                }   
            }
        }
    }

?>


<div class="container">
    <div class="todo bg-light rounded p-4">
        <div class="head">
            <h2>Test To Do List</h2>
            <div class="add-item">
                <form action="" method="post">
                    <div class="input-group mb-3 input-group-lg">
                        <input type="text" class="form-control" name="item" id="" placeholder="Try To Add Item To Test" required>
                        <input type="submit" value="Add" name="addItem" class="input-group-text btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="body">
            <?php if(!empty($testTasks)): ?>
            <div class="items">
                <?php foreach($testTasks as $task):?>
                <?php if($task):?>
                    <div class="row border-bottom p-1">
                        <p class="col-9 col-sm-10 m-0 align-self-center"><?=$task[1]?></p>
                        <form action="" method="post" class="col-3 col-sm-2 d-flex justify-content-around align-items-center">
                            <input type="checkbox" class="form-check-input" name="done" id="" <?=$task[2]?"checked":""?>>
                            <input type="hidden" name="id" value="<?=$task[0]?>">
                            <input type="hidden" name="delete" value="">
                            <input type="hidden" name="toggle" value="">
                            <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                            <input type="hidden" name="change">
                        </form>
                    </div>
                <?php endif;?>
                <?php endforeach;?>
            </div>
            <?php else: ?>
            <div><h2>Please add Items To Do</h2></div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php 

    include("components/footer.php");

?>