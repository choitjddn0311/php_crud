<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect('localhost' , 'root' , '' , 'opentutorials');
// var_dump 는 변수형을 출력해주는 함수이다.
// var_dump(($_POST));
$sql = "insert into topic(title, description, created) 
values('{$_POST['title']}' , '{$_POST['description']}' , now())";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는데 니 비번털림 ㅅㄱㅋㅋ';
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
}
?>