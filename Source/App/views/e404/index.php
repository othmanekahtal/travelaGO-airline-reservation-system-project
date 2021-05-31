<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo URLROOT . '/Assets/dist/e404.css' ?>"/>
    <link rel="shortcut icon" href="<?php echo URLROOT . '/Assets/images/logo.png' ?>" type="image/x-icon">
    <title><?php echo SITE_NAME . ' | ' . $data['title'] ?></title>
</head>

<body style="width: 100vw;overflow-x: hidden">
<div class="main">
    <div class="main-content">
        <div class="title-primary-and-ultra-title">
            <h1 class="h1 mb-4">
                Don't know where you are ?
            </h1>
            <div class="ultra-title mb-4">
                We really have no idea either....
            </div>
        </div>
        <a class="btn btn-outline-dark" href="<?php echo URLROOT; ?>">back to home page</a>
    </div>

    <?php require_once APPROOT . '/views/include/footer.php'; ?>
</body>

</html>

