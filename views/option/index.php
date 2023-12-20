<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>All Options</h1>
    
    <a class="btn btn-primary" href="index.php?controller=lesson&action=create&id=<?php echo $id; ?>">Create new Option</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question_ID</th>
                <th>Option</th>
                <th>is_correct</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($optionlist as $option) {
            ?>
            <tr>
                <td><?= $option['id']?></td>
                <td><?= $option['question_id']?></td>

                <td><?= $option['option']?></td>
                <td><?= $option['is_correct']?></td>
                <td>
                    <a href="index.php?controller=material&action=index&lessonId=<?= $option['id'] ?>">All options</a>    
                </td>
                <td colspan="2">
                    <a class="btn btn-warning" href="index.php?controller=lesson&action=edit&id=<?php echo $lesson['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="index.php?controller=lesson&action=delete&id=<?php echo $lesson['id']; ?>">Delete</a>
                </td>
            </tr>

            <?php
                }
            ?>
        </tbody>
        </table>
</section>