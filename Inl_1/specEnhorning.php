<?php
require("vendor/autoload.php");
use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$id = $_GET[ID];

$log = new Logger('myLogger');
$log->pushHandler(new StreamHandler("doing.log", Logger::INFO));

// Skapa en HTTP-client
$client = new Client(['headers' => ['Accept' => 'application/json']]);

// Anropa URL: http://unicorns.idioti.se/
$res = $client->request('GET', 'http://unicorns.idioti.se/'.$id);

// Omvandla JSON-svar till datatyper
$data = json_decode($res->getBody());


?>
<html>
    <head>
        <title>Enhörningar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Enhörningar</h1>
            <form action="specEnhorning.php" method="get">
                <div class="form-group">
                    <label for="Id">id på en enhörning </label>
                    <input type="text" id="id_Nr" name="ID" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Visa enhörning" class="btn btn-success">
                    <button type="button" onclick="location.href='index.php'" class="btn btn-primary">Visa alla enhörningar</button>
                </div>
            </form>
            <?php
            //echo $data->spottedWhen->date;
            printUnicorn($data, $log);
            ?>
        </div>
    </body>
</html>
<!--- PHP Functions --->
<?php
function printUnicorn($data, $log){
  $log->info("Gets info on unicorn: ".$data->id.": ".$data->name);
  echo "<h1> $data->name </h1> <br><br>";
  echo "<div ".$data->spottedWhen->date." <br> $data->description <br> Reported by: $data->reportedBy</div>";
  echo "<img src=\"".$data->image."\">";
}
//<button type="button" onclick="location.href='index.php'" class="btn btn-primary">Visa alla enhörningar</button>


?>
