<div class="container">
    <div class="todo bg-light rounded p-4">
        <div class="head">
            <h2 class="text-primary"><?=$userName?> To Do List</h2>
            <div class="add-item">
                <div class="input-group mb-3 input-group-lg">
                    <input type="text" class="form-control" name="item" id="" placeholder="Add Item To Do" required>
                    <input type="submit" value="Add" name="addItem" class="input-group-text btn btn-primary">
                </div>
            </div>
        </div>
        <div class="body">
            <?php if(!empty($tasks)): ?>
            <div class="items">
                <?php foreach($tasks as $task):?>
                    <div class="row border-bottom p-1">
                        <p class="col-9 col-sm-10 m-0 align-self-center"><?=$task[1]?></p>
                        <form action="" method="post" class="col-3 col-sm-2 d-flex justify-content-around align-items-center">
                            <input type="checkbox" name="done" id="" class="form-check-input" <?=$task[2]?"checked":""?>>
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
            <div><h3 class="text-center">Please add Items To Do</h3></div>
            <?php endif; ?>
        </div>
    </div>
</div>