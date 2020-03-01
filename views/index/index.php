<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th><a href="/name">Имя</a></th>
                        <th><a href="/email">E-mail</a></th>
                        <th><a href="/text">Задача</a></th>
                        <th><a href="/done">Выполнено</a></th>
                        <?php if (Admin::checkLogged()) : ?>
                        <th>Редактировать</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tasks as $task) : ?>
                        <tr>
                            <td><?= $task['name'] ?></td>
                            <td><?= $task['email'] ?></td>
                            <td>
                                <?php
                                echo $task['text'];
                                if ($task['redact'] == 1) {
                                    echo ' <i>(Отредактировано администратором)</i>';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($task['done'] == 1) echo 'Да';
                                else echo 'Нет';
                                ?>
                            </td>
                            <?php if (Admin::checkLogged()) : ?>
                            <td>
                                <a href="/edit/<?=$task['id']?>">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $pagination->get(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form action="/" method="post" id="add_task">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control input-lg" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <textarea name="text" class="form-control input-lg" placeholder="Текст задачи..."></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Добавить</button>
                </form>
            </div>
        </div>
        <br>
        <?php if (isset($result)) : ?>
            <div class="alert alert-success" role="alert">
                Задача добавлена!
            </div>
        <?php endif; ?>
        <?php if (isset($errors) && is_array($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>