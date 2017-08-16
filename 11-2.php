<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php

  $nevek = fopen('nevjegyzek/nevek.txt', "r") or die('HIBA: Nincs meg a regisztrációkat tartalamzó fájl!');
  flock( $nevek, LOCK_SH );

  $sorszam = 1;

  $mindennev = file_get_contents('nevjegyzek/nevek.txt');
  $nevjegyzek = explode("\n", $mindennev);

  foreach($nevjegyzek as $nev){
    if( $nev !== "" ){
      echo $sorszam . ". " . $nev . "<br/>";
      $sorszam ++;
    }
  }

  flock( $nevek, LOCK_UN );
  fclose($nevek);

  echo "<br/>". ( $sorszam - 1 ) . " név került regisztrációra a " . filesize('nevjegyzek/nevek.txt') . " bájt méretű fájlban, így annak $sorszam sora van.";

  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
