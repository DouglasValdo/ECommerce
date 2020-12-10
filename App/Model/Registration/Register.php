<?php namespace Library\Model\Registration;

use Library\Model\DBase\DBaseContext;
use PDO;

class Register
{
    private PDO $dBaseContext;

    public function __construct()
    {
        $this->dBaseContext = DBaseContext::GetContext();
    }

    public function Register(string $alias, string $email, string $password):string
    {
        if(!isset($email) || !isset($alias) || !isset($password))
            return RegisterOutcome::userInvalidEmailOrPasswordOrName;

        $userExist = $this->UserExist($email);

        if($userExist) return RegisterOutcome::userAlreadyExist;

        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $sqlQuery = "INSERT INTO Ecommerce.Users (Identifier, Email, Password, Alias) VALUES (:Identifier,:Email, :Password, :Alias)";

        $preparedQuery = $this->dBaseContext->prepare($sqlQuery);

        $preparedQuery->execute(array(
            ":Identifier" =>uniqid(md5($password)),
            ":Alias" => $alias,
            ":Email" => $email,
            ":Password" => $passwordHashed));

        if($preparedQuery->rowCount())
            return RegisterOutcome::successful;
        else
            return RegisterOutcome::failure;
    }

    private function UserExist(string $email): bool
    {
        $sqlQuery = "SELECT Identifier FROM Ecommerce.Users WHERE Email = :Email";

        $preparedQuery = $this->dBaseContext->prepare($sqlQuery);

        $preparedQuery->execute(array(":Email" => $email));

        return $preparedQuery->rowCount() ? true : false;
    }
}