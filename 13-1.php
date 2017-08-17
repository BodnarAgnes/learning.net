<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Üzenőfal</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <h1>Üzenőfal</h1>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="email">E-mail cím* (max. 70 karakter)</label>
    <br/>
    <input type="email" name="email" id="email"/>
    <br/>
    <label for="message">Hozzászólás (max. 255 karakter)</label>
    <br/>
    <textarea name="message" id="message"></textarea>
    <br/>
    <input type="submit" value="Küldés"/>
  </form>

  <?php

  require_once("DB.php");

  $user = "root";
  

  $dsn = "sqlite://./adatbazis.db";
  $db = DB::connect( $dsn );

  if( DB::isError( $db ) ){
    die( $db->getMessage() );
  }

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
