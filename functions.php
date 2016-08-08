<?php
include_once 'config.php';
function is_logged($session, $link)//функция проверки авторизации
{
    $email = $session['username'];
    $pass = $session['pass'];
    $query = $link->query("SELECT `id` FROM `users` WHERE username = '$email' and password='$pass'");
    if ($query->num_rows && $_COOKIE['login']) {
        return true;
    }
    return false;
}

function usernameValidate($username)//проверка на пробелы в середине юзернейма
{
    if (strripos($username, ' ') === false) {
        return true;
    }
    return false;
}

function pagesArray($link)//функция построения массива подстраниц
{
    $pages_array = [];
    $query = $link->query("SELECT id, link, shortname, fullname, parentid FROM pages");
    while ($row = $query->fetch_assoc()) {
        if ($row['parentid'] != 0) {
            $pages_array[$row['parentid'] - 1]['submenu'][] = ['id' => $row['id'], 'link' => $row['link'], 'shortname' => $row['shortname'], 'fullname' => $row['fullname']];
        } else {
            $pages_array[] = ['id' => $row['id'], 'link' => $row['link'], 'shortname' => $row['shortname'], 'fullname' => $row['fullname']];
        }
    }
    return $pages_array;
}

function menuShow($pages)//вывод меню списком
{
    $html .= "<ul>";
    foreach ($pages as $page) {
        $html .= "<li><a href='?page={$page['link']}' title='{$page['fullname']}'>{$page['shortname']}</a></li>";
        if (is_array($page['submenu'])) {
            $html .= menuShow($page['submenu']);
        }
    }
    $html .= "</ul>";
    return $html;
}