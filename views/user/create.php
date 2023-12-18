<?php
include_once 'layouts/header.php';

?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add user</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=user&action=store">
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Name</label>
                                <input required type="text" class="form-control" id="name" name="name"
                                    placeholder="name..">
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Email</label>
                                <input required type="text" class="form-control" id="email" name="email"
                                    placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Password</label>
                                <input required type="text" class="form-control" id="password" name="password"
                                    placeholder="password">
                            </div>
                            <button type="submit" class="btn btn-info my-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>