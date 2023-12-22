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
                        <form method="post" action="index.php?controller=option&action=save">
                            <div class="form-group" >
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <label for="title" class="control-label my-2">Is correct</label>
                                <select name="is_correct" class="form-select">
                                    <option value="0" <?= $option['is_correct'] === 1 && 'checked' ?>>
                                        False
                                    </option>
                                    <option value="1" <?= $option['is_correct'] === 0 && 'checked' ?>>
                                        True
                                    </option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title" class="control-label my-2">Option</label>
                                <input value="<?= $option['option'] ?>" required type="text" class="form-control" id="option" name="option"
                                    placeholder="Option.." >
                            </div>
                            <button type="submit" class="btn btn-info my-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>