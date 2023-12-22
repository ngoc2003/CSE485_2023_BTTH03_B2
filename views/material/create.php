<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Material</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=material&action=store">
                            <input type="hidden" name="lessonId" value="<?= $lessonId ?>">
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Title</label>
                                <input required type="text" class="form-control" id="title" name="title"
                                    placeholder="Title.." >
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">File path</label>
                                <input required type="text" class="form-control" id="description" name="filePath"
                                    placeholder="description">
                            </div>
                            <button type="submit" class="btn btn-info my-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>