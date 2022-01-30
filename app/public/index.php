<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dsn= "mysql:dbname=main;host=database";
$firstName=$_POST['Name'];
$lastName=$_POST['Last_name'];
$username= "root";
$password= "password";
$db= new PDO($dsn, $username, $password);

function createTable ($db) {
    $statement=$db->prepare("CREATE TABLE IF NOT EXISTS user (
        First_name varchar(255),
        Last_name varchar(255),
        )");
    $statement->execute();
}
function add ($db, $firstName, $lastName) {
    $statement=$db->prepare("insert into user(First_name,Last_name) values (?,?)");
    $statement->execute([$firstName,$lastName]);
}
function showTits ($db){
    $statement=$db->prepare("select * from user");
    $statement->execute(); // execute - выполняет запрос к БД
    while ($gag=$statement->fetch()) { // fetch - получить результат выполнения запроса (одну строчку)
        print_r($gag);
    }
}
createTable($db);
add($db, $firstName, $lastName);
showTits($db);
} else {
    $index=$_SERVER['PHP_SELF'];
    echo $index;
    echo <<< __HTML__

<form action="$index" method="post"> 
<label for="firstname">First name</label>
<input id="firstname" name="Name"></br>
<label for="lastname">Last name</label>
<input id="lastname" name="Last_name">
<button type="submit">Ass</button>
</form>
__HTML__;
}
