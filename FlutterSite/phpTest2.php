
<?php

$ini = "cfg.ini" ;
$parse = parse_ini_file ($ini) ;

$host_name = $parse ["host_name"] ;
$database = $parse ["database"];
$user_name = $parse ["user_name"] ;
$password = $parse ["password"];




// Fetching variables of the form which travels in URL
$name = $_POST["nome"];
$email = $_POST["endereco"];
$site = $_POST["website"];
$message = $_POST["mensagem"];

?>

<?php

try {
$connect = new PDO("mysql:host=$host_name;dbname=$database", $user_name, $password);
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
if($connect === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = $connect->prepare("INSERT INTO competitorReports (name, email, website, message)
VALUES (:name, :email, :site, :message)");
$sql->bindParam(':name', $name);
$sql->bindParam(':email', $email);
$sql->bindParam(':site', $site);
$sql->bindParam(':message', $message);


$sql->execute();

echo "";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
	
mysqli_close($sql);
mysqli_close($connect);


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="0; URL='thankYou.html'" />
<title>Report</title>
</head>


</html>