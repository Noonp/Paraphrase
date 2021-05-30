<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Site web Stage</title>
    <script src='test.js' async></script>
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
<script>
function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                alert(allText);
            }
        }
    }
    rawFile.send(null);
}
    var file = "file:://C:/wamp64/www/StageL2/ressources/syn.txt";
    readTextFile(file);
</script>
</body>
</html>