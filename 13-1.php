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
  <h2>Szólj hozzá!</h2>
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
  <h2>Hozzászólások</h2>

  <?php

  require_once("DB.php");

  $user = "root";
  $pass = "";
  $host ="localhost";
  $database = "13egy";


  $dsn = "mysql://$user:$pass@$host/$database";
  $db = DB::connect( $dsn );

  if( DB::isError( $db ) ){
    die( $db->getMessage() );
  }

  if( DB::isError( $db->query( "SELECT * FROM uzenetek" ) ) ){
    $create_table = $db->query("CREATE TABLE uzenetek (id INTEGER PRIMARY KEY AUTO_INCREMENT, email VARCHAR(70), message VARCHAR(255), created TIMESTAMP)");
  }

  $uzenetek = $db->query( "SELECT * FROM uzenetek" );

  ?>
  <table>

  <?php

  while($uzenet = $uzenetek->fetchRow( DB_FETCHMODE_ASSOC ) ){

    $flood = FALSE;

    if( @$_POST['message'] === $uzenet['message'] ){
      $flood = TRUE;
    }

    ?>
    <tr>
      <td>
        <?php echo $uzenet['email'] ?>
      </td>
      <td>
        <?php echo $uzenet['message'] ?>
      </td>
    </tr>
  <?php
  }
  ?>
  </table>
  <?php

  if( !empty($_POST['email']) && !empty($_POST['message']) ){

    if( !$flood ){

      $new_message = array(
        "id"      => $db->nextID('uzenet'),
        "email"   => $_POST['email'],
        "message" => $_POST['message']
      );

      $db->autoExecute('uzenetek', $new_message, DB_AUTOQUERY_INSERT );

    }
  }

  @$max->free();
  $db->disconnect();

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
