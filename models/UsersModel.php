<?php

/**
 * @return bool false if user is not found
 * @return array if user is found
 * @return string if a error is throw
 */
function getUserByUsername(PDO $db, string $username) : array | bool | string{

    $sql = "SELECT * FROM users WHERE username = ?";

    try {
        $prepare = $db->prepare($sql);
        $prepare->execute([$username]);
        if($prepare->rowCount() < 1) return false;
        return $prepare->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }

    return false;
}

function userConnect(PDO $db, string $user) : bool|string{
    $bddUser = getUserByUsername($db, $user);
    if(!is_array($bddUser)) return $bddUser;
    if(!password_verify($_POST['password'], $bddUser['password'])) return false;
    $_SESSION['connected'] = true;
    header("Location: /");
    die();
}

function userDisconnect(){
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Finally, destroy the session.
    session_destroy();
    header("Location: /");
    die();
}