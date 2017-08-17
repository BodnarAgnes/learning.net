<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bejelentkezés</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php
    // Nem működnek ezen a verzión a DBA függvények. :(
    // $db = dba_open("./adat/users", "c", "gdbm") or die ("HIBA: Nem lehet megnyitni az adatbázist!");
  ?>

  <h1>Bejelentkezés</h1>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="username">Felhasználónév</label>
    <input type="text" name="username" id="username"/>
    <label for="password">Jelszó</label>
    <input type="password" name="password" id="password"/>
    <input type="submit" value="Bejelentkezés"/>
  </form>

  <h2>Még nincs fiókja? Regisztráljon most!</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="newusername">Felhasználónév</label>
    <br/>
    <input type="text" name="newusername" id="newusername"/>
    <br/>
    <label for="newpassword">Jelszó</label>
    <br/>
    <input type="password" name="newpassword" id="newpassword"/>
    <br/>
    <label for="newpasswordagain">Jelszó megerősítése</label>
    <br/>
    <input type="password" name="newpasswordagain" id="newpasswordagain"/>
    <br/>
    <br/>
    <input type="submit" value="Regisztráció"/>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
