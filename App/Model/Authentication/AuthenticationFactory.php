<?php namespace Library\Model\Authentication;

class AuthenticationFactory
{
    public static function Authenticate(string $authenticator):?IAuthenticator
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