<?php namespace Library\Model\Authentication;

use Library\Model\DBase\DBaseContext;

class DefaultAuthenticator implements IAuthenticator
{
    function Login(string $email, string $password): ?ApplicationUser
    {
        if (!isset($email) || !isset($password))
            return null;

        $dBaseContext = DBaseContext::GetContext();

        $sqlQuery = "SELECT * FROM Ecommerce.Users WHERE email = :email";

        $preparedQuery = $dBaseContext->prepare($sqlQuery);

        $preparedQuery->execute(array(":email" => $email));

        if (!$preparedQuery->rowCount())
            return null;

        $currentUser = $preparedQuery->fetchObject(get_class(new ApplicationUser()));

        return password_verify($password, $currentUser->Password) ? $currentUser : null;
    }
}
