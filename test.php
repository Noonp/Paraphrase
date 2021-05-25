<?php
$filepath ="./ressources/syn.txt";
if (file_exists($filepath)){
    echo "le fichier $filepath existe. <br>";
    $var = fopen($filepath, "r");
    echo filesize($filepath);
}
else{
    echo "le fichier $filepath n'existe pas <br>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Site web Stage</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <form  method="POST" action="">
    <div>
        <label for="name">Mot :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
    </div>
</form>

<?php
if(isset($_POST['user_name']))
{
    // $flag = true;
    $i = 0;
    $syn = array();
    while($ligne = fgets($var)){
        // echo $ligne."<br>";
        $tab = explode(";", $ligne);
        if(isset($tab[0]) and ($tab[0] == $_POST['user_name'])){
            array_push($syn, $tab[1]);
        }
    }
    echo "Un adjectif de ".$_POST['user_name']." est ".$syn[random_int(0,sizeof($syn))];
}
fclose($var);
?>
  </body>
</html>