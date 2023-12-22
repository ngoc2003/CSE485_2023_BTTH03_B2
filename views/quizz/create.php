<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add quizz</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=quizz&action=store">
                        <select name="lessonId" class="form-select">
                            <?php
                            foreach ($lessonList as $index => $list) {
                                $isSelected = ($index == 1) ? 'selected' : ''; 
                            ?>
                                <option value="<?= $list['id'] ?>" <?= $isSelected ?>>
                                    <?= $list['title'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Title</label>
                                <input required type="text" class="form-control" id="title" name="title"
                                    placeholder="Title.." >
                            </div>
                            <button type="submit" class="btn btn-info my-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>