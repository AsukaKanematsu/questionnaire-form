<?php

$name = filter_input(INPUT_POST, 'name');
$food_awnser = filter_input(INPUT_POST, 'food_awnser');
$hobby_awnser = filter_input(INPUT_POST, 'hobby_awnser');

$errors = [];
if (empty($name) || empty($food_awnser) || empty($hobby_awnser)) {
    $errors[] =
        '「回答者名」「好きな食べ物」「趣味」のどれか記入されていません!';
}

if (!empty($name) && !empty($food_awnser) && !empty($hobby_awnser)) {
    $dbUserName = 'root';
    $dbPassword = 'password';
    $pdo = new PDO(
        'mysql:host=mysql; dbname=questionnaireform; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    $pdo = new PDO(
        'mysql:host=mysql; dbname=questionnaireform; charset=utf8',
        $dbUserName,
        $dbPassword
    );

    $sql =
        'INSERT INTO `bookings` (`name`, `food_awnser`, `hobby_awnser`) VALUES (:name, :food_awnser, :hobby_awnser)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':name', $name, PDO::PARAM_STR);
    $statement->bindValue(':food_awnser', $food_awnser, PDO::PARAM_STR);
    $statement->bindValue(':hobby_awnser', $hobby_awnser, PDO::PARAM_STR);
    $statement->execute();

    $pdo = new PDO(
        'mysql:host=mysql; dbname=questionnaireform; charset=utf8',
        $dbUserName,
        $dbPassword
    );
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>sample</title>
</head>

<body>
  <div>
    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error . "\n"; ?></p>
        <?php endforeach; ?>
        <a href="index.php">予約画面へ</a>
    <?php endif; ?>
    
    <?php if (empty($errors)): ?>
      <h2>アンケート完了＾＾</h2>
      <a href="index.php">アンケート画面へ</a><br><br>
    <?php endif; ?>
  </div>

</body>
    
</html>