<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>10. óra 1. feladat</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <h1>Egyszerű számológép</h1>

  <?php if( !isset( $_POST['op1'] ) || !isset( $_POST['op3'] ) ){ ?>

  <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">

    <label for="op1">
      Első operandus:
    </label>
    <input type="text" name="op1" id="op1" <?php if( isset($_POST['op1']) ){ echo 'value="' . $_POST['op1'] . '"'; } ?>/>

    <label for="op2">
      Operátor:
    </label>
    <select name="op2" id="op2" <?php if( isset($_POST['op2']) ){ echo "value=\"" . $_POST['op2'] . "\""; } ?>>
      <option value="+">Összeadás</option>
      <option value="-">Kivonás</option>
      <option value="*">Szorzás</option>
      <option value="/">Osztás</option>
    </select>

    <label for="op3">
      Második operandus:
    </label>
    <input type="text" name="op3" id="op3" <?php if( isset($_POST['op3']) ){ echo "value=\"" . $_POST['op3'] . "\""; } ?>/>

    <input type="submit" value="Számol!" />

  </form>
  <?php }else{

    echo "<h2>Eredmény</h2>";

    if( $_POST['op1'] === "" || $_POST['op3'] === "" ){
      echo "<h2>Hiányzó adat! Próbáld újra.</h2>";
    }else{
      //echo   var_dump($_POST['op1']==="") . " " . var_dump($_POST['op3']==="");

      switch( $_POST['op2'] ){
        case "+":
          $eredmeny = intval( $_POST['op1'] ) + intval( $_POST['op3'] );
          echo "<p>" . $_POST['op1'] . " + " . $_POST['op3'] . " = " . $eredmeny . "</p>";
          break;
        case "-":
          $eredmeny = intval( $_POST['op1'] ) - intval( $_POST['op3'] );
          echo "<p>" . $_POST['op1'] . " - " . $_POST['op3'] . " = " . $eredmeny . "</p>";
          break;
        case "*":
          $eredmeny = intval( $_POST['op1'] ) * intval( $_POST['op3'] );
          echo "<p>" . $_POST['op1'] . " * " . $_POST['op3'] . " = " . $eredmeny . "</p>";
          break;
        case "/":
          $eredmeny = intval( $_POST['op1'] ) / intval( $_POST['op3'] );
          echo "<p>" . $_POST['op1'] . " / " . $_POST['op3'] . " = " . $eredmeny . "</p>";
          break;
      }
    }
  ?>

  <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="submit" value="Új művelet" />
  </form>

  <?php } ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
