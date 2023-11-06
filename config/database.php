<?php

namespace Config\Database;

class Database{
    public function Query()
    {
        return $this->getConnection();
    }
    protected function getConnection()
    {
        $wew23PXn1 = HOSTNAME;
        $wew23PXn2 = DATABASE;
        $wew23PXn3 = USERNAME;
        $wew23PXn4 = PASSWORD;

        return new \PDO("sqlsrv:Server=$wew23PXn1;Database=$wew23PXn2;LoginTimeout=5;",$wew23PXn3,$wew23PXn4);
    }
}