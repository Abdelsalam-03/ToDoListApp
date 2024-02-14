<?php 
    // $dummy = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur sint hic ad deserunt, nihil perferendis tempora voluptate sequi quam ut, expedita laborum accusantium quisquam distinctio. Perspiciatis labore officia dolore expedita.";
    // $tasks = [
    //     [1, $dummy, false],
    //     [2, $dummy, true],
    //     [3, $dummy, false],
    //     [4, $dummy, false],
    //     [5, $dummy, true]
    // ];

?>



<div class="container">
    <div class="todo bg-light rounded p-4">
        <div class="head">
            <h2>To Do List</h2>
            <div class="add-item">
                <form action="" method="post">
                    <input type="text" class="form-control" name="item" id="" placeholder="Item To Do" required>
                    <input type="submit" value="Add" name="addItem">
                </form>
            </div>
        </div>
        <div class="body">
            <?php if(!empty($tasks)): ?>
            <div class="items">
                <?php foreach($tasks as $task):?>
                    <div class="item d-flex flex-direction-row gap-4 p-2">
                        <p><?=$task[1]?></p>
                        <form action="" method="post" class="d-flex gap-4">
                            <input type="checkbox" name="done" id="" <?=$task[2]?"checked":""?>>
                            <input type="hidden" name="id" value="<?=$task[0]?>">
                            <input type="hidden" name="delete" value="">
                            <input type="hidden" name="toggle" value="">
                            <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                            <input type="hidden" name="change">
                        </form>
                    </div>
                <?php endforeach;?>
            </div>
            <?php else: ?>
            <div><h2>Please add Items To Do</h2></div>
            <?php endif; ?>
        </div>
    </div>
</div>