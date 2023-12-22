<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
</head>
<body>
<header>
    <img src = "logo.webp" width="700" height="700">
</header>

<form action="home.php" method="post">
        <label for="name">ФИО:</label>
        <input type="text" id="name" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
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