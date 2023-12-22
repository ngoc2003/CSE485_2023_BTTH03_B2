<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>All Materials of lesson id <?php echo $id; ?></h1>
    
    <a class="btn btn-primary" href="index.php?controller=material&action=create&lessonId=<?php echo $id; ?>">Create new Materials</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>File path</th>
                <th>Belongs to course</th>
                <th>Created at</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($materialList as $material) {
            ?>
            <tr>
                <td><?= $material['id']?></td>
                <td><?= $material['title']?></td>
                <td><?= $material['file_path']?></td>
                <td><?= $material['created_at']?></td>
                <td colspan="2">
                    <a class="btn btn-warning" href="index.php?controller=material&action=edit&lessonId=<?php echo $id; ?>&id=<?php echo $material['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="index.php?controller=material&action=delete&lessonId=<?php echo $id; ?>&id=<?php echo $material['id']; ?>">Delete</a>
                </td>
            </tr>

            <?php
                }
            ?>
        </tbody>
        </table>
</section>
