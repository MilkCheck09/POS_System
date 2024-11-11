<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
//exit();

session_start();
if (isset($_POST['mem_username'])) {
    // เชื่อมต่อฐานข้อมูล
    include("condb.php");

    // รับค่า user & mem_password       
    $mem_username = mysqli_real_escape_string($condb, $_POST['mem_username']);
    $mem_password = mysqli_real_escape_string($condb, sha1($_POST['mem_password']));
    $chk = trim($mem_username) OR trim($mem_password);

    if ($chk == '') {
        echo '<script>';
        echo "alert(\" username หรือ  mem_password ไม่ถูกต้อง\");"; 
        echo "window.history.back()";
        echo '</script>';
    } else {
        // query 
        $sql = "SELECT * FROM tbl_member 
                WHERE mem_username='" . $mem_username . "' 
                AND mem_password='" . $mem_password . "' ";
        $result = mysqli_query($condb, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            // เก็บข้อมูล session
            $_SESSION["mem_id"] = $row["mem_id"];
            $_SESSION["mem_name"] = $row["mem_name"];
            $_SESSION["ref_l_id"] = $row["ref_l_id"];
            $_SESSION["mem_img"] = $row["mem_img"];
            $_SESSION["mem_address"] = $row["mem_address"];

            // ตรวจสอบสิทธิ์ (role) ของผู้ใช้
            if ($_SESSION["ref_l_id"] == "1") { 
                // ถ้าเป็น admin ให้กระโดดไปหน้า admin
                Header("Location: admin/");
            } elseif ($_SESSION["ref_l_id"] == "2") {
                // ถ้าเป็น user ให้กระโดดไปหน้า user
                Header("Location: user/"); // เปลี่ยนเป็นหน้า user ที่เหมาะสม
            } else {
                // ถ้าไม่มีสิทธิ์ที่ตรงกับการกำหนด
                echo "<script>";
                echo "alert(\"คุณไม่มีสิทธิ์เข้าถึง\");"; 
                echo "window.history.back()";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert(\" username หรือ mem_password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
            echo "</script>";
        }
    }
} else {
    Header("Location: login.php"); // user & mem_password incorrect back to login again
}
?>
