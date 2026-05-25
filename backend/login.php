<?php
require_once 'db_connect.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if(empty($email) || empty($password)){
        $response['error'] = true;
        $response['message'] = "Empty fields";
    } else {
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $db_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $db_password)) {
                $response['error'] = false;
                $response['message'] = "Login successful";
                $response['user'] = array("id" => $id, "name" => $name, "email" => $email);
            } else {
                $response['error'] = true;
                $response['message'] = "Invalid password";
            }
        } else {
            $response['error'] = true;
            $response['message'] = "User not found";
        }
    }
} else {
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);
?>
