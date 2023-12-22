<?php
include 'header.html';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    $agreement = isset($_POST['agreement']) ? "Да" : "Нет";
    $source = isset($_GET['source']) ? $_GET['source'] : "";
    $attachment = isset($_POST['attachment']) ? $_POST['attachment'] : "Файл не прикреплен";

    echo "<p>Здравствуйте, $name</p>";
    echo "<p>Текст обращения: $message</p>";
    echo "<p>Название прикрепленного файла: $attachment</p>";
    echo '<a href="index.php?name=' . $name . '&email=' . $email . '&source=' . $source . '">Заполнить снова</a>';
} else {
    echo "<p>Вы не отправили форму обратной связи</p>";
}
?>