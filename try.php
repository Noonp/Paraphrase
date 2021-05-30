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
$fichier = "http://www.jeuxdemots.org/JDM-LEXICALNET-FR/05162021-LEXICALNET-JEUXDEMOTS-R5.txt";

function in_multiarray($elem, $array)
{
    $top = sizeof($array) - 1;
    $bottom = 0;
    while($bottom <= $top)
    {
        if($array[$bottom] == $elem)
            return true;
        else
            if(is_array($array[$bottom]))
                if(in_multiarray($elem, ($array[$bottom])))
                    return true;
               
        $bottom++;
    }       
    return false;
}

function tablSyn($text, $fichier){
    $handle = fopen($fichier, 'r');
    $wordsToSyn = array();
    $wordsOfText = array_map('strtolower',(explode(" ", $text)));
    $sizeOfText = count($wordsOfText);
    while($line = utf8_encode(fgets($handle))){
        $sep = explode(";", $line);
        for($i = 0; $i < $sizeOfText; $i++){
            if($wordsOfText[$i] == $sep[0] and (!in_multiarray($wordsOfText[$i], $wordsToSyn))){
                array_push($wordsToSyn, array($wordsOfText[$i], $sep[1]));
            }
            elseif($wordsOfText[$i] == $sep[0] and in_multiarray($wordsOfText[$i], $wordsToSyn)){
                $j = 0;
                $flag = true;
                while($j < count($wordsToSyn) and $flag){
                    if($wordsToSyn[$j][0] == $wordsOfText[$i]){
                        array_push($wordsToSyn[$j], $sep[1]);
                        $flag = false;
                    }
                    $j++;
                }
            }
            elseif(isset($sep[1]) and $wordsOfText[$i] == $sep[1] and !in_multiarray($wordsOfText[$i], $wordsToSyn)){
                array_push($wordsToSyn, array($wordsOfText[$i], $sep[0]));
            }
            elseif(isset($sep[1]) and $wordsOfText[$i] == $sep[1] and in_multiarray($wordsOfText[$i], $wordsToSyn)){
                $j = 0;
                $flag = true;
                while($j < count($wordsToSyn) and $flag){
                    if($wordsToSyn[$j][0] == $wordsOfText[$i]){
                        array_push($wordsToSyn[$j], $sep[0]);
                        $flag = false;
                    }
                    $j++;
                }
            }
        }
    }
    fclose($handle);
    return $wordsToSyn;
}
if(isset($_POST['user_name'])){
    $tab = tablSyn($_POST['user_name'], $fichier);
    var_dump($tab);
}


// $i = 0;
// $var = "Je suis un mouton rouge";
// $tab = explode(" ", $var);
// while(($ligne = fgets($handle)) and ($i < 40)){
//     $ta = explode(";", $ligne);
//     foreach($tab as $val){
//         if($ta[0] == $val){
//             $val = array($val, $ta[0]);
//         }
//     }
// }
// print_r($tab);
?>
<script>
var tableau = <?php echo json_encode($tab); ?>;
console.log(tableau);
</script>
</body>
</html>