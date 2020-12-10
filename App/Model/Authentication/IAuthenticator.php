<?php namespace Library\Model\Authentication;

interface IAuthenticator
{
    function Login(string $email, string $password):?ApplicationUser;
}