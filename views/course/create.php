<?php
include_once 'layouts/header.php';
?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Course</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=course&action=store">
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Title</label>
                                <input required type="text" class="form-control" id="title" name="title"
                                    placeholder="Title.." >
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Description</label>
                                <input required type="text" class="form-control" id="description" name="description"
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