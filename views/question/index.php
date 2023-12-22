<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>All Quizzes</h1>
    
    <a class="btn btn-primary" href="index.php?controller=question&action=create&quizzId=<?php echo $quizzId; ?>">Create new question</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Created at</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($questionList) > 0): ?>
                <?php foreach ($questionList as $ques): ?>
                    <tr>
                        <td><?php echo $ques['id']; ?></td>
                        <td><?php echo $ques['question']; ?></td>
                        <td><?php echo $ques['created_at']; ?></td>
                        <td colspan="2">
                            <a class="btn btn-danger" href="index.php?controller=question&action=delete&id=<?php echo $ques['id']; ?>&quizzId=<?php echo $quizzId; ?>">Delete</a>
                            <a class="btn btn-warning" href="index.php?controller=question&action=update&id=<?php echo $ques['id']; ?>&quizzId=<?php echo $quizzId; ?>">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No question available <a href="index.php?controller=user&action=index">Back</a></td>
                </tr>
            <?php endif; ?>
        </tbody>

        </table>
</section>