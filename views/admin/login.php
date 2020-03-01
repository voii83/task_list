<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="signup-form">
                    <h2>Вход</h2>
                    <form action="/admin/login" method="post" id="admin-login">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-lg" placeholder="Введите имя"
                                   value="<?php echo $name; ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control input-lg"
                                   placeholder="Введите пароль" value="<?php echo $password; ?>"/>
                        </div>
                        <input type="submit" name="submit" class="btn btn-info pull-right" value="Вход"/>
                    </form>
                </div>
                <br><br>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <?php foreach ($errors as $error): ?>
                        <div class="alert alert-danger" role="alert">
                            Неправильный логин или пароль!
                            <a href="/">К списку задач</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>