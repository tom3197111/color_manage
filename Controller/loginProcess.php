<?php
require_once dirname(dirname(__FILE__)).'/Service/AdminService.class.php';
// 接收用戶的數據
// 1.id
$id = strtoupper($_POST['id']);
// 2.PassWord
$password = strtoupper($_POST['password']);
// 3.獲取用戶是否選中了保存ID
// if (empty($keep = $_POST['keep'])) {
//     if (! empty($_COOKIE['id'])) {
//         setcookie("id", $id, time(), - 100);
//     }
// } else {
//     setcookie("id", $id, time() + 7 * 2 * 24 * 3600);
// }

// 實例化一個AdminService方法

$adminService = new AdminService();
if ($name = $adminService->ChekAdmin($id, $password)) {
    session_start();
    $_SESSION['loginuser'] = $name;

    header("Location: ../views/color_list.php?name=$name");
    exit();
} else {
    // 非法
    header("Location: ../index.php?error=1");
    exit();
}

?>