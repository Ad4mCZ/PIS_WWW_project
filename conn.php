<?php
$conn = mysqli_connect("mariadb_pis", "root", "root", "index");
$query = "SELECT subject FROM subjects";
$data = mysqli_query($conn, $query);

print "Your IP address is ".$_SERVER['REMOTE_ADDR'];
foreach ($data as $key=>$val){
    echo "this is ".$val['subject']."<br>";
    $subj = $val['subject'];


    $queryGrades ="SELECT mark,note,date FROM grades WHERE subject='$subj'";
    $data2 = mysqli_query($conn, $queryGrades);
    while($row = mysqli_fetch_assoc($data2)) {
    echo "".$row['mark']."<br>";
    }
}

mysqli_close($conn);

?>