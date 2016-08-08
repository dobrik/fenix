<?php
include_once 'config.php';
include_once 'functions.php';
if (!empty($_POST['username'])) {
    $username = trim($_POST['username']);
    $pass = md5($_POST['pass']);
    $username = $link->real_escape_string($username);
    $query = $link->query("SELECT `id` FROM `users` WHERE username = '$username' and password='$pass'");
    if ($query->num_rows && usernameValidate($username)) {
        $_SESSION['username'] = $username;
        $_SESSION['pass'] = $pass;
        setcookie('login', true, time() + 86400);
        header('Location:?');
    } else {
        echo 'Логин или пароль введены не верно';
    }
} elseif (!empty($_POST['link'])) {
    $link->query("INSERT INTO pages (link, shortname, fullname, title, keywords, description, header, parentid, text)
VALUES ('{$_POST['link']}', '{$_POST['shortname']}', '{$_POST['fullname']}', '{$_POST['title']}', '{$_POST['keywords']}', '{$_POST['description']}', '{$_POST['header']}', '{$_POST['parentid']}', '{$_POST['text']}')");
    if ($link->error) {
        echo 'Mysql Error: ' . $link->error;
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin zone</title>
</head>
<body>


<?php
if (!is_logged($_SESSION, $link)) {
    ?>
    <form action="?" method="post">
        <input type="text" name="username">
        <input type="text" name="pass">
        <input type="submit" value="LogIn">
    </form>
    <?php
} else {
    ?>

    <h2>Создать страницу</h2>
    <form action="?" method="post">
        <input type="text" name="link" placeholder="Название ссылки"><br>
        <input type="text" name="shortname" placeholder="Короткое название"><br>
        <input type="text" name="fullname" placeholder="Полное название"><br>
        <input type="text" name="title" placeholder="Тэг title"><br>
        <input type="text" name="keywords" placeholder="Тэг keywords"><br>
        <input type="text" name="description" placeholder="Тэг description"><br>
        <input type="text" name="header" placeholder="Тэг h1"><br>
        Родительская категория:<br>
        <select name="parentid">
            <option value="0">нет</option>
            <?php
            $pages = $link->query("SELECT id, shortname FROM pages");
            while ($row = $pages->fetch_assoc()) {
                echo "<option value=\"{$row['id']}\">{$row['shortname']}</option>";
            }
            ?>
        </select><br>
        <textarea name="text">Введите текст страницы</textarea><br>
        <input type="submit" value="Создать страницу">
    </form>

    <?php
}
?>
</body>
</html>
