<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeeJee test work</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/template/css/style.css" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Список задач</a>
                        <?php if (Admin::checkLogged()) : ?>
                            <a href="/admin/logout" class="btn btn-default navbar-btn">
                                <?= Admin::getNameAdminById($_SESSION['admin']) ?> Выйти
                            </a>
                        <?php else : ?>
                            <a href="/admin/login" class="btn btn-default navbar-btn">Войти</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<br>