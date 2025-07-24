<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;

class DatabaseConnection
{
    private Client $client;

    public function __construct()
    {
        // Connexion MongoDB locale par exemple
        $this->client = new Client("mongodb://localhost:27017");
    }

    public function getConnection(): Client
    {
        return $this->client;
    }
}
