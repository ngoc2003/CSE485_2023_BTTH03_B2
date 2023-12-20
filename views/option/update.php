<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Options</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=Option&action=save">
                        <input  type="hidden" class="form-control" name="id"
                                    value="<?= $id?>">
                        <input  type="hidden" class="form-control" name="question_Id"
                                    value="<?= $question_Id?>">
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Title</label>
                                <input required type="text" class="form-control" id="title" name="title" value="<?= $material['title'] ?>"
                                    placeholder="Title.." >
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">File path</label>
                                <input required type="text" class="form-control" id="description" name="filePath" value="<?= $material['file_path'] ?>"
                                    placeholder="description">
                            </div>
                            <button type="submit" class="btn btn-info my-2">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>