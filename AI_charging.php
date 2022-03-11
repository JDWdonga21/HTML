<?php
//if(!isset($_POST['optionValue1']) || !isset($_POST['optionValue2'] || !isset($_POST['optionValue3'] || !isset($_POST['optionValue4'])) exit;
//if(!isset($_POST['optionValue5']) || !isset($_POST['optionValue6'] || !isset($_POST['optionValue7'] || !isset($_POST['optionValue8'])) exit;
$AI_Car = $_POST['cars'];
$AI_Tempp = $_POST['tempp'];
$AI_AIYears = $_POST['Years'];
$AI_AIDistance = $_POST['Distance'];
$AI_ISGoals = $_POST['ISGoals'];
$AI_AIOnP = $_POST['OnTheP'];
$AI_Drive = $_POST['DrivePatan'];
$AI_AV_Speed = $_POST['AV_Speed'];


//The Client
error_reporting(E_ALL);

$address = "222.96.135.240"; // 접속할 IP //
$port = 9998; // 접속할 PORT //
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // TCP 통신용 소켓 생성 //
if ($socket === false) {
echo "socket_create() 실패! 이유: " . socket_strerror(socket_last_error()) . "\n";
echo "<br>";
} else {
echo "socket 성공적으로 생성.\n";
echo "<br>";
}

echo "다음 IP '$address' 와 Port '$port' 으로 접속중...";
echo "<BR>";
$result = socket_connect($socket, $address, $port); // 소켓 연결 및 $result에 접속값 지정 //
if ($result === false) {
echo "socket_connect() 실패.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
echo "<br>";
} else {
echo "다음 주소로 연결 성공 : $address.\n";
echo "<br>";
}
$i = "1$".$AI_Car."$".$AI_Tempp."$".$AI_Drive."$".$AI_AIOnP."$".$AI_AIDistance."$".$AI_AIYears."$".$AI_AV_Speed."$".$AI_ISGoals; //보내고자 하는 전문 //
echo "서버로 보내는 전문 : $i|종료|.\n";

socket_write($socket, $i, strlen($i)); // 실제로 소켓으로 보내는 명령어 //
echo "<br>";
$input = socket_read($socket, 1024); // 소켓으로 부터 받은 REQUEST 정보를 $input에 지정 //
echo "<br>";

echo $input; //REQUEST 정보 출력//
session_start();
$_SESSION['AIs'] = $input;
socket_close($socket);
?>

<meta http-equiv='refresh' content='0;url=index.html'>
