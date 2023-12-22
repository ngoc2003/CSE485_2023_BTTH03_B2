<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>Quizz List</h1>
    
    <a class="btn btn-primary" href="index.php?controller=quizz&action=create">Create quizz</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Belong to lesson's id</th>
                <th>Created at</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizzes as $quizz): ?>
                <tr>
                    <td><?php echo $quizz['id']; ?></td>
                    <td><?php echo $quizz['title']; ?></td>
                    <td><?php echo $quizz['lesson_id']; ?></td>
                    <td><?php echo $quizz['created_at']; ?></td>
                    <td>
                        <a href="index.php?controller=question&action=index&quizzId=<?php echo $quizz['id'] ?>">See all questions</a>
                    </td>
                    <td colspan={2}>
                        <a class="btn btn-warning" href="index.php?controller=quizz&action=edit&id=<?php echo $quizz['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="index.php?controller=quizz&action=delete&id=<?php echo $quizz['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
