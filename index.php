<?php
session_start();

$errors = array();
if (isset($_POST['submit'])) {
    // проверка на корректность заполнения полей
    if (empty($_POST['name'])) {
        $errors[] = 'Введите ваше ФИО';
    } else {
        $_SESSION['name'] = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $errors[] = 'Введите ваш email';
    } else {
        $_SESSION['email'] = $_POST['email'];
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
    <img src = "logo.webp" width="700" height="700">
</header>
<form method="post" action="home.php">
    <input type="radio" name="source" value="internet"> Реклама из интернета<br>
    <input type="radio" name="source" value="friends"> Рассказали друзья<br>
    <!-- <input type="submit" value="Отправить"> -->
</form>
<form action="home.php" method="post">
    <label for="name">ФИО:</label>
    <input type="texthp " name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"> <!-- вот здесь всё меняется -->
    <!-- <input type="text" id="name" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>"> -->
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
    <!-- <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>"> -->
    <label for="message">Сообщение:</label>
    <textarea id="message" name="message" rows="5"><?php if(isset($_POST['message'])) {echo $_POST['message'];} ?></textarea>
    <label for="category">Тема:</label>
    <select name="category" id="category">
        <?php
        $categories = ['Предложение', 'Жалоба'];
        foreach ($categories as $index => $category) {
            echo '<option value="' . $index . '">' . $category . '</option>';
        }
        ?>
    </select>
    <label for="agreement">Согласие на обработку данных:</label>
    <input type="checkbox" name="agreement" id="agreement" value="Да" <?php if (isset($_POST['agreement']) && $_POST['agreement'] == 'Да') {echo 'checked';} ?>>
    <label for="attachment">Прикрепить файл:</label>
    <input type="file" name="attachment" id="attachment">
    <input type="submit" value="Отправить">
</form>
</body>
</html>
