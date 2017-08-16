<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Név bejegyzés</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <h1>Név bejegyzés</h1>

  <?php

    if( ( isset( $_POST['vezeteknev'] ) || isset( $_POST['vezeteknev'] ) ) && ( strlen( $_POST['vezeteknev'] ) == 0 || strlen( $_POST['keresztnev'] ) == 0 ) ){
      echo "<h2>Kérem, adja meg a teljes nevét!</h2>";
    }

    if( !isset( $_POST['vezeteknev'] ) || !isset( $_POST['vezeteknev'] ) || ( strlen( $_POST['vezeteknev'] ) == 0 || strlen( $_POST['keresztnev'] ) == 0 ) ){

  ?>

      <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="vezeteknev">Vezetéknév</label>
        <br />
        <input type="text" name="vezeteknev" id="vezeteknev" <?php if( isset($_POST['vezeteknev']) ){ echo "value=\"" . $_POST['vezeteknev'] . "\""; } ?> />
        <br />
        <label for="keresztnev">Keresztnév</label>
        <br />
        <input type="text" name="keresztnev" id="keresztnev" <?php if( isset($_POST['keresztnev']) ){ echo "value=\"" . $_POST['keresztnev'] . "\""; } ?> />
        <br />
        <br />
        <input type="submit" value="Bejegyzés" />
      </form>

    <?php

    } else {

      if ( !file_exists('nevjegyzek/nevek.txt') ){
        if ( !is_dir('nevjegyzek') ){
          mkdir('nevjegyzek');
        }
        touch('nevjegyzek/nevek.txt');
      }

      $nevek = fopen('nevjegyzek/nevek.txt', "a");
      flock( $nevek, LOCK_EX );

      fputs( $nevek, $_POST['vezeteknev'] . " " . $_POST['keresztnev'] . "\n" );

      flock( $nevek, LOCK_UN );
      fclose($nevek);

      echo "<h2>Köszönjük, neve rögzítésre került!</h2>";

    ?>

      <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="submit" value="Újabb név rögzítése" />
      </form>
    <?php
    }

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
