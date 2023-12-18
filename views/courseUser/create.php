<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>Enroll new course</h1>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php 
                if (!count($unEnrolledCoursesUser)) {
            ?>
                <tr>
                    <td colspan="4" class="text-center">You have been enrolled in all courses <a href="index.php?controller=courseUser&action=index&id=<?php echo $id; ?>">BACK</a></td>
                </tr>
            <?php
                } else {
                    foreach ($unEnrolledCoursesUser as $course):
            ?>
                        <tr>
                            <td><?php echo $course['id']; ?></td>
                            <td><?php echo $course['title']; ?></td>
                            <td><?php echo $course['description']; ?></td>
                            <td>
                                <a class="btn btn-danger" href="index.php?controller=courseUser&action=enroll&userId=<?php echo $id; ?>&courseId=<?php echo $course['id']; ?>">Enroll</a>
                            </td>
                        </tr>
            <?php
                    endforeach;
                }
            ?>

            </tbody>
        </table>
</section>
