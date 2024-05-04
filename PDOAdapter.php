<?php

namespace vBulletin\Search;

class PDOAdapter implements DatabaseContract
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function execute($query, $params)
    {
        $sth = $this->pdo->prepare($query);
        $sth->execute($params);
        return $sth->fetchAll();
    }
}