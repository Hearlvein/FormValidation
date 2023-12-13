<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Cool custom Bootstrap form asking for name, email, age, birthdate, and password -->
    <form action="validation.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" name="name" placeholder="Enter your name" type="text" value="<?php echo substr(bin2hex(random_bytes(4)), 0, 7); ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" placeholder="Enter your email" type="email" value="<?php echo substr(bin2hex(random_bytes(4)), 0, 7).'@example.com'; ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input class="form-control" name="age" placeholder="Enter your age" type="number" value="<?php echo rand(18, 60); ?>">
        </div>
        <div class="form-group">
            <label for="datetime">Datetime</label>
            <?php
            $randomDatetime = date('Y-m-d\TH:i:s', strtotime('-'.rand(18, 60).' years'));
            ?>
            <input class="form-control" name="datetime" placeholder="Enter your datetime" type="datetime-local" value="<?php echo $randomDatetime; ?>">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input class="form-control" name="birthdate" placeholder="Enter your birthdate" type="date" value="<?php echo date('Y-m-d', strtotime('-'.rand(18, 60).' years')); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" name="password" placeholder="Enter your password" type="password" value="<?php echo substr(bin2hex(random_bytes(8)), 0, 7); ?>">
        </div>
        <input class="btn btn-primary" type="submit"/>
    </form>

    <!-- Bootstrap JS (including jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
