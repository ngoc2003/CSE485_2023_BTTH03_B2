<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>All Courses Enrolled by this user</h1>
    
    <a class="btn btn-primary" href="index.php?controller=courseUser&action=create&id=<?php echo $id; ?>">Enroll new Course</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Enrolled at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($coursesUser) > 0): ?>
                <?php foreach ($coursesUser as $course): ?>
                    <tr>
                        <td><?php echo $course['id']; ?></td>
                        <td><?php echo $course['title']; ?></td>
                        <td><?php echo $course['description']; ?></td>
                        <td><?php echo $course['created_at']; ?></td>
                        <td>
                            <a class="btn btn-danger" href="index.php?controller=course&action=delete&id=<?php echo $course['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No courses available <a href="index.php?controller=user&action=index">Back</a></td>
                </tr>
            <?php endif; ?>
        </tbody>

        </table>
</section>
