<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="d-flex align-items-center justify-content-center" style="height: 100vh">
    <form style="width:100%; max-width: 500px" method="POST" action="index.php?controller=auth&action=login">
        <h1 class="mb-2">Đăng nhập
            <span class="fw-lighter fs-4">- 63KTPM2</span>
        </h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" required class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" required class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>
</body>
</html>
