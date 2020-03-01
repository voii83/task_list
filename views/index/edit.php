<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Редактировать задачу</h2>

            <div class="edit-form">
                <form action="/edit/<?= $id ?>" method="post" id="edit-task">
                    <div class="form-group">
                        <textarea name="text" class="form-control input-lg" placeholder="Текст задачи..."><?= $task['text'] ?></textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="done" class="form-check-input" id="task-done"
                        <?php if ($task['done'] > 0) : echo 'checked'; endif;?>>
                        <label class="form-check-label" for="task-done">Задача выполнена</label>
                    </div>
                    <input type="submit" name="submit" class="btn btn-info pull-right" value="Сохранить"/>
                </form>
            </div>
            <br><br>
            <?php if (isset($errors) && is_array($errors)): ?>
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (isset($result)) : ?>
                <div class="alert alert-success" role="alert">
                    Задача изменена!
                </div>
            <?php endif; ?>


            <a href="/">К списку задач</a>
        </div>
    </div>
</div>



<?php include ROOT . '/views/layouts/footer.php'; ?>
