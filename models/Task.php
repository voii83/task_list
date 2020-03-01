<?php

class Task
{
    const SHOW_BY_DEFAULT = 3;

    public static function addTask($id_user, $text)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO task (id_user, text) VALUES (:id_user, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function findAllTasks($sort, $page)
    {
        $limit = Task::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();


        $sql = 'SELECT task.id, task.text, task.done, user.name, user.email, task.redact
                FROM task
                LEFT JOIN user ON user.id = task.id_user 
                ORDER BY ' . $sort . ' ASC 
                LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);

        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $tasks = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name'] = $row['name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['text'] = $row['text'];
            $tasks[$i]['done'] = $row['done'];
            $tasks[$i]['redact'] = $row['redact'];
            $i++;
        }

        return $tasks;
    }

    public static function getTotalTasks()
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(id) As count FROM task';
        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row['count'];
    }

    public static function findTaskById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT text, done FROM task WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateTaskById($id, $text, $done)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE task SET text = :text, done = :done, redact = "1" WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':done', $done, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function checkTaskText($text)
    {
        if (strlen($text) >= 5) {
            return true;
        }
        return false;
    }

    public static function checkTaskDone($done)
    {
        if ($done == 0 || $done == 1) {
            return true;
        }
        return false;
    }
}