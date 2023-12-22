<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>All Lessons</h1>
    
    <a class="btn btn-primary" href="index.php?controller=lesson&action=create&id=<?php echo $id; ?>">Create new Lesson</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Belongs to course</th>
                <th>Created at</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($lessonList as $lesson) {
            ?>
            <tr>
                <td><?= $lesson['id']?></td>
                <td><?= $lesson['title']?></td>
                <td><?= $lesson['description']?></td>
                <td><?= $lesson['courseTitle']?></td>
                <td><?= $lesson['created_at']?></td>
                <td>
                    <a href="index.php?controller=material&action=index&lessonId=<?= $lesson['id'] ?>">All materials</a>    
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
