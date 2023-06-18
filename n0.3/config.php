<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=project", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


/////////////////////////////////////////////////////
function Check_User($national_code,$username,$password,$email,$phone)
{
    global $conn;

    $sql = "SELECT * FROM `user` WHERE `national_code`= :national_code and username= :username and password = :password and
    email= :email and phone= :phone";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":national_code", $national_code);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user === false) {
        return null;
    }else{
        return $user;
    }
}

function Chech_voting_number($voting_number)
{
    global $conn;

    $sql = "SELECT * FROM `voting_number` WHERE `voting_number`= :voting_number";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":voting_number", $voting_number);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user === false) {
        return null;
    }else{
        return $user;
    }
}

function Check_User_login($password,$email)
{
    global $conn;

    $sql = "SELECT * FROM `user` WHERE  password = :password and email= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user === false) {
        return null;
    }else{
        return $user;
    }
}

function Insert_User($national_code,$username,$password,$email,$phone)
{
    global $conn;

    $created_at =time();
    $sql = "INSERT INTO `user`(`national_code`, `username`, `password`, `email`, `phone`, `cteated_at`) VALUES (:national_code,:username,:password,:email,:phone,:cteated_at)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":national_code", $national_code);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":cteated_at", $created_at);
    $stmt->execute();
}

function Check_Admin($username,$password) {
    global $conn;

    $sql = "SELECT * FROM `admin` WHERE  password = :password and username= :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user === false) {
        return null;
    }else{
        return $user;
    }
}

function all_namzad()
{
    global $conn;

    $sql = "SELECT * FROM `namzad`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $namzad = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $namzad;
}

function Delete_namzad($id)
{
    global $conn;

    $sql = "DELETE FROM `namzad` WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function all_voting_number()
{
    global $conn;

    $sql = "SELECT * FROM `voting_number`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $voting_number = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $voting_number;
}

function Delete_Voting_Number($id)
{
    global $conn;

    $sql = "DELETE FROM `voting_number` WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function Update_Voting_number($id,$title,$voting_number)
{
    global $conn;

    $sql = "UPDATE `voting_number` SET `title`= :title,`voting_number`= :voting_number WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":voting_number", $voting_number);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function find_voting_number($id)
{
    global $conn;

    $sql = "SELECT * FROM `voting_number` where id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

function voting_number_title($namzad_id)
{
    global $conn;

    $sql = "SELECT voting_number.* FROM voting_number INNER JOIN namzad_voting_number
    on voting_number.id = namzad_voting_number.voting_number_id 
    INNER JOIN namzad on namzad.id = namzad_voting_number.namzad_id WHERE namzad.id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $namzad_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function find_namzad($namzad_id)
{
    global $conn;

    $sql = "SELECT * FROM `namzad` where id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $namzad_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

function  Update_namzad($name_family,$age,$tahsilat,$namzad_id)
{
    global $conn;

    $sql = "UPDATE `namzad` SET `name_family`= :name_family,`age`= :age,`tahsilat` = :tahsilat WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name_family", $name_family);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":tahsilat", $tahsilat);
    $stmt->bindParam(":id", $namzad_id);
    $stmt->execute();
}

function Delete_namzad_voting_number($namzad_id)
{
    global $conn;
    $sql = "DELETE FROM `namzad_voting_number` WHERE namzad_id= :namzad_id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":namzad_id", $namzad_id);
    $stmt->execute();
}

function insert_namzad_voting_number($category_id,$namzad_id)
{
    global $conn;
    $sql = "INSERT INTO `namzad_voting_number`(`namzad_id`, `voting_number_id`) VALUES (:namzad_id,:category_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":namzad_id", $namzad_id);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->execute();
}

function check_user_national_code($national_code,$name_family)
{

    global $conn;

    $sql = "SELECT * FROM `user` where national_code = :national_code and username= :name_family";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":national_code", $national_code);
    $stmt->bindParam(":name_family", $name_family);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result === false) {
        return null;
    }else{
        return $result;
    }
}

function check_namzad($name_namzad)
{
    global $conn;

    $sql = "SELECT * FROM `namzad` where name_family = :name_family";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":name_family", $name_namzad);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result === false) {
        return null;
    }else{
        return $result;
    }

}

function check_voting_number_namzad($namzad_id,$voting_number)
{
    global $conn;

    $sql = "SELECT * FROM `namzad_voting_number` where namzad_id = :namzad_id and voting_number_id= :voting_number";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":namzad_id", $namzad_id);
    $stmt->bindParam(":voting_number", $voting_number);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result === false) {
        return null;
    }else{
        return $result;
    }

}

function insert_user_vote($national_code,$voting_number,$name_namzad)
{
    global $conn;
    $sql = "INSERT INTO `user_vote`(`national_code_user`, `voting_number`, `name_namzad`) VALUES (:national_code_user,:voting_number,:name_namzad)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":national_code_user", $national_code);
    $stmt->bindParam(":voting_number", $voting_number);
    $stmt->bindParam(":name_namzad", $name_namzad);
    $stmt->execute();
}

function all_user_vote()
{
    global $conn;

    $sql = "SELECT * FROM `user_vote`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function find_user_with_national_code($national_code_user)
{
    global $conn;

    $sql = "SELECT * FROM `user` where national_code = :national_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":national_code", $national_code_user);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result === false) {
        return null;
    }else{
        return $result;
    }
}

function find_title_voting_number($voting_number)
{
    global $conn;

    $sql = "SELECT * FROM `voting_number` where voting_number = :voting_number";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":voting_number", $voting_number);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result === false) {
        return null;
    }else{
        return $result;
    }
}
?>

