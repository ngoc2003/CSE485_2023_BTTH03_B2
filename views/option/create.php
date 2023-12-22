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
                        <form method="post" action="index.php?controller=option&action=store">
                            <div class="form-group" >
                                <label for="title" class="control-label my-2">Question</label>
                                <select required name="questionId" class="form-select">
                                    <?php
                                    foreach($questions as $question) {
                                    ?>
                                    <option value="<?= $question['id'] ?>">
                                        <?= $question['question'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" >
                            <label for="title" class="control-label my-2">Is correct</label>
                                <select name="is_correct" class="form-select">
                                    <option value="0">
                                        False
                                    </option>
                                    <option value="1">
                                        True
                                    </option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Option</label>
                                <input required type="text" class="form-control" id="option" name="option"
                                    placeholder="Option.." >
                            </div>
                            <button type="submit" class="btn btn-info my-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>