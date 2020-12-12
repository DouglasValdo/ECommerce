<?php namespace Library\Model\Authentication;

use JetBrains\PhpStorm\Pure;

class AuthenticationFactory
{
    #[Pure] public static function Authenticate(string $authenticator):?IAuthenticator
    {
        switch ($authenticator)
        {
            case AuthenticatorType::defaultAuth:
                return new DefaultAuthenticator();
            default:
                return null;
        }
    }
}