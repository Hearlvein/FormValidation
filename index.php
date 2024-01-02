<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="orange-bootstrap.css">

    <script src="jquery-3.7.1.min.js"></script>
    <script src="popup.js"></script>
    <script src="send-forms-ajax.js"></script>
    <script src="send-tag-ajax.js"></script>

</head>

<body>
    <div class="container mt-5">
        <form action="validation.php" method="post">
            <div class="form-group">
                <label for="my_content">Name</label>
                <input type="text" class="form-control" id="my_content" placeholder="Enter name" name="my_content">
                <a href="#" class="mt-2 action-save" data-name="my_content">Save field</a>
            </div>
            <div class="form-group">
                <label for="my_age">Age</label>
                <input type="text" class="form-control" id="my_age" placeholder="Enter age" name="my_age">
                <a href="#" class="mt-2 action-save" data-name="my_age">Save field</a>
            </div>
            <input class="btn btn-primary mt-3" type="submit" />

            <div id="feedback" class="mt-1"></div>
        </form>
    </div>

    <script src="bootstrap.min.js"></script>
</body>

</html>