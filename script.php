<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$db_name = "lab";
$conn = new mysqli($servername,$username,$password,$db_name);
if($conn->connect_error){
    die("Статус подключения: Connecting failed".$conn->connect_error);
}
mysqli_set_charset($conn, 'utf8mb4_general_ci');
echo "<p>Статус подключения: Connected successfully</p>";


echo $_COOKIE["sql"];
$result  = mysqli_query($conn,$_COOKIE["sql"]);
$arrayResult = [];

if(!$result){
    print("Произошла ошибка");
}else{
    while($row = mysqli_fetch_array($result)){
        $arrayResult[] = $row;
    }
}

echo "<h3 align='center' id='table-title'>Таблица: " . $_COOKIE['title'] . "</h3>";

if(count($arrayResult) != 0) {
    echo '<table>';
    echo '<tr>';
    $key = array_keys($arrayResult[0]);
    for ($j = 0; $j < count($key); $j++) {
        if (!is_numeric($key[$j]))
            echo '<td class="col-title">' . $key[$j] . '</td>';
    }
    echo '</tr>';
    for ($i = 0; $i < count($arrayResult); $i++) {
        echo '<tr>';
        for ($j = 0; $j < count($arrayResult[$i]) / 2; $j++) {
            echo '<td>' . $arrayResult[$i][$j] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
else
    echo "<h3 align='center'>Нет подходящего результата</h3>";

?>
