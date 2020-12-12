<?php namespace Library\Model\DBase;

use PDO;
use Exception;

abstract class BaseDatabaseContext
{
    public PDO $DBContext;

    public function __construct()
    {
        $this->DBContext = DBaseContext::GetContext();

        if($this->DBContext == null)
            throw new Exception("No valid DataBaseConnection");
    }
}