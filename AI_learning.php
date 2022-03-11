<?php
//if(!isset($_POST['optionValue1']) || !isset($_POST['optionValue2'] || !isset($_POST['optionValue3'] || !isset($_POST['optionValue4'])) exit;
//if(!isset($_POST['optionValue5']) || !isset($_POST['optionValue6'] || !isset($_POST['optionValue7'] || !isset($_POST['optionValue8'])) exit;
$learning_1 = $_POST['learn1']; //1
$Dropout1 = $_POST['Drop1']; //2
$learning_2 = $_POST['learn2']; //3
$Dropout2 = $_POST['Drop2']; //4
$learning_3 = $_POST['learn3']; //5
$Dropout3 = $_POST['Drop3']; //6
$learning_L = $_POST['learnL']; //7
$Loss = $_POST['Loss']; //8
$Metrics = $_POST['Metrics']; //9
$optimizer = $_POST['optimizer']; //10
$Callbacks = $_POST['Callbacks']; //11
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
$i = "2$".$learning_1."$".$Dropout1."$".$learning_2."$".$Dropout2."$".$learning_3."$".$Dropout3."$".$learning_L."$".$Loss."$".$Metrics."$".$optimizer."$".$Callbacks; //보내고자 하는 전문 //
echo "서버로 보내는 전문 : $i|종료|.\n";

socket_write($socket, $i, strlen($i)); // 실제로 소켓으로 보내는 명령어 //
echo "<br>";
$input = socket_read($socket, 1024); // 소켓으로 부터 받은 REQUEST 정보를 $input에 지정 //
echo "<br>";

echo $input; //REQUEST 정보 출력//
session_start();
$_SESSION['Learning_R'] = $input;
socket_close($socket);
?>

<meta http-equiv='refresh' content='0;url=index.html'>
