<?php

class Password{
   public $user;
    public $db;
    public $resetRequest;


    public function requestReset(string $email):bool{
$sql = "SELECT id from users where email = ? LIMIT 1";
$stmt =$this->db->prepare($sql);
$stmt->execute([$email]);

$this->user = $stmt->fetch();


if($user){
    return true;
}return false;
    }

}
