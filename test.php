<?php
$fich = "http://www.jeuxdemots.org/JDM-LEXICALNET-FR/05162021-LEXICALNET-JEUXDEMOTS-R5.txt";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Site web Stage</title>
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
print_r($_POST);
// function spotWords($text, $fichier){ //$text est le string entrée par l'utilisateur, et $fichier est une ressource ouverte avec fopen()
//     $handle = fopen($fichier,"r");
//     $spottedWords=array();// Créer un tableau vide ou rajoute les mots qui peuvent être modifié 
//     $textTmp = array_map('strtolower',(explode(" ", $text)));//Sépare la phrase mot par mot et en faisant attention de mettres tous les caractères en miniscule
//     while($ligne = fgets($handle)){
//         $tab = array_map('strtolower',explode(";", $ligne));// Sépare les deux termes dans la base de données
//         // print_r($tab);
//         foreach($textTmp as $value){// Vérifie si chaque mots de notre phrase de base appartiens a un des termes de la bdd
//             if(($value == $tab[0]) and !(in_array($value, $spottedWords))){
//                 array_push($spottedWords, $value); // Si oui, push le mot dans le tableau spottedWords
//             }
//             elseif(isset($tab[1]) and ($value == $tab[1]) and!(in_array($value, $spottedWords))){// Si oui, push le mot dans le tableau spottedWords
//                 array_push($spottedWords, $value);
//             }
//         }
//     }
//     fclose($handle);
//     return $spottedWords;
// }

// function findSynonyms($words, $fichier){
//     $handle = fopen($fichier,"r");
//     $sizeOfWords = count($words);
//     echo "taille de words".$sizeOfWords;
//     for($i = 0; $i< $sizeOfWords; $i++){
//         $words[$i] = array($words[$i]);
//     }
//     while($line = utf8_encode(fgets($handle))){
//         $spe = explode(";", $line);
//         for($i = 0; $i < $sizeOfWords; $i++){
//             if($spe[0] == $words[$i][0]){
//                 array_push($words[$i], $spe[1]);
//             }elseif(isset($spe[1]) and ($words[$i][0] == $spe[1])){
//                 array_push($words[$i], $spe[0]);
//             }
//         }
//     }
//     fclose($handle);
//     return $words;
// }
// function utf8ize( $mixed ) {
//     if (is_array($mixed)) {
//         foreach ($mixed as $key => $value) {
//             $mixed[$key] = utf8ize($value);
//         }
//     } elseif (is_string($mixed)) {
//         return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
//     }
//     return $mixed;
// }

// if(isset($_POST['user_name'])){
//     $tabl = spotWords($_POST['user_name'], $fich);
//     $tab2 = findSynonyms($tabl, $fich);
//     var_dump($tab2);
//     // $tab2 = utf8ize($tab2);
// }
?>
<?php
// echo json_last_error_msg();
// die();
?>
<!-- <script scr="test.js">
function fichier_txt(fich) {
    var obj_pers = new XMLHttpRequest();
    obj_pers.open("GET",fich, false);
    obj_pers.send(null);

    if(obj_pers.readyState == 4){
        return(obj_pers.responseText);
    } else{
        return(false);
    }
}

var file = fichier_txt('http://www.jeuxdemots.org/JDM-LEXICALNET-FR/05162021-LEXICALNET-JEUXDEMOTS-R5.txt');
console.log(file.charAt(5));
</script> -->
  </body>
</html>