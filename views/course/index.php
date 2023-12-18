<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>Course List</h1>
    
    <a class="btn btn-primary" href="index.php?controller=course&action=create">Create Course</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo $course['id']; ?></td>
                    <td><?php echo $course['title']; ?></td>
                    <td><?php echo $course['description']; ?></td>
                    <td colspan={2}>
                        <a class="btn btn-warning" href="index.php?controller=course&action=edit&id=<?php echo $course['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="index.php?controller=course&action=delete&id=<?php echo $course['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
