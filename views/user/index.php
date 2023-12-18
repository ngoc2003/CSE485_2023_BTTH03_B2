<?php include_once 'layouts/header.php'?>

<section class="container-sm">
    <h1>User List</h1>
    
    <a class="btn btn-primary" href="index.php?controller=user&action=create">Create User</a>
    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="index.php?controller=courseUser&action=index&id=<?php echo $user['id']; ?>">All courses</a>
                    </td>
                    <td colspan={2}>
                        <a class="btn btn-warning" href="index.php?controller=user&action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="index.php?controller=user&action=delete&id=<?php echo $user['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
