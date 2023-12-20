<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Option</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=Option&action=store">
                        <select name="postId" class="form-select">
                            <?php
                            foreach ($optionlist as $index => $option) {
                                $isSelected = ($index == 1) ? 'selected' : ''; 
                            ?>
                                <option value="<?= $option['id'] ?>" <?= $isSelected ?>>
                                    <?= $option['title'] ?>
                                </option>
                                
                            <?php
                            }
                            ?>
                        </select>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Option</label>
                                <input required type="text" class="form-control" id="option" name="option"
                                    placeholder="Option.." >
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">is_correct</label>
                                <input required type="text" class="form-control" id="is_correct" name="is_correct"
                                    placeholder="is_correct">
                            </div>
                            <button type="submit" class="btn btn-info my-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>