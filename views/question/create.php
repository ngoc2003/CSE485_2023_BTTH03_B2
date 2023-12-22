<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add question</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=question&action=store">
                            <input type="hidden" value="<?= $quizzId ?>" name="quizzId">
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Question</label>
                                <input required type="text" class="form-control" name="question"
                                    placeholder="Question.." >
                            </div>
                            <button type="submit" class="btn btn-info my-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>