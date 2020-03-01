<?php

class IndexController
{
	public function actionIndex($sort = 'text', $page = 1)
	{
	    if (isset($_POST['submit'])) {
	        $name = $_POST['name'];
	        $email = $_POST['email'];
	        $text = $_POST['text'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!Task::checkTaskText($text)) {
                $errors[] = 'Текст задачи не короче 5-и символов';
            }

            if ($errors == false) {
                $userId = User::findIdUserByEmail($email);
                if (!$userId) {
                    $userId = User::addUser($email, $name);
                }
                $result = Task::addTask($userId, $text);

            }
        }

        $tasks = Task::findAllTasks($sort, $page);
	    $total = Task::getTotalTasks();
	    $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');

		require_once(ROOT.'/views/index/index.php');
		return true;
	}

	public function actionEdit($id)
    {
        if (Admin::checkLogged()) {

            if (isset($_POST['submit'])) {
                $text = $_POST['text'];
                isset ($_POST['done']) ? $done = 1 : $done = 0;

                $errors = false;

                if (!Task::checkTaskText($text)) {
                    $errors[] = 'Текст задачи не короче 5-и символов';
                }

                if (!Task::checkTaskDone($done)) {
                    $errors[] = 'Неверное значение';
                }

                if ($errors == false) {
                    $result = Task::updateTaskById($id, $text, $done);
                }
            }
            $task = Task::findTaskById($id);

        } else {
            header("Location: /");
        }

        require_once(ROOT.'/views/index/edit.php');
        return true;
    }
}