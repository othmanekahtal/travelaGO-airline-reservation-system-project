<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT . '/Assets/dist/admin.css' ?>"/>
    <link rel="shortcut icon" href="<?php echo URLROOT . '/Assets/images/logo.png' ?>" type="image/x-icon">
    <title><?php echo SITE_NAME . ' | ' . $data['title'] ?></title>
</head>
<body>
<div class="container">
    <div class="text-center mb-4">
        <h1>
            add flight
        </h1>
    </div>
    <form class="d-block form mb-4">
        <div class="form-row">
            <div class="col mb-4">
                <input type="number" class="form-control add__limit-place" placeholder="Limit Place"
                       required>
            </div>
            <div class="col mb-4">
                <input type="date" class="form-control add__depart-date" placeholder="Depart date" required>
            </div>
            <div class="col mb-4">
                <input type="date" class="form-control add__arrival-date" placeholder="Arrival date" required>
            </div>
            <div class="col mb-4">
                <input type="text" class="form-control add__arrival" placeholder="Arrival" required>
            </div>
            <div class="col mb-4">
                <input type="text" class="form-control add__departure" placeholder="Departure" required>
            </div>
            <div class="col mb-4">
                <input type="text" class="form-control add__trademark" placeholder="trademark" required>
            </div>
            <div class="col d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger CancelButton">Cancel</button>
                <button type="button" class="btn btn-success ApplyButton">Apply</button>
            </div>
        </div>
    </form>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module" src="<?php echo URLROOT . '/Assets/scripts/add.js' ?>"></script>
</body>
</html>

