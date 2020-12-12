<?php namespace Library\Model\Authentication;

use Library\Model\DBase\BaseDatabaseContext;

class DefaultAuthenticator extends BaseDatabaseContext implements IAuthenticator
{
    function Login(string $email, string $password): ?ApplicationUser
    {
        if (!isset($email) || !isset($password))
            return null;

        $sqlQuery = "SELECT * FROM Ecommerce.Users WHERE email = :email";

        $preparedQuery = $this->DBContext->prepare($sqlQuery);

        $preparedQuery->execute(array(":email" => $email));

        if (!$preparedQuery->rowCount())
            return null;

        $currentUser = $preparedQuery->fetchObject(get_class(new ApplicationUser()));

        return password_verify($password, $currentUser->Password) ? $currentUser : null;
    }
}
