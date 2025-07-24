<?php

require_once __DIR__ . '/../product.php';
require_once __DIR__ . '/../../lib/database.php';

use MongoDB\BSON\ObjectId;
use MongoDB\Client;
use MongoDB\Collection;

class ProductRepository
{
    public DatabaseConnection $connection;
    private Collection $collection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
        $client = $this->connection->getConnection(); // MongoDB\Client
        $this->collection = $client->testdb->produits; // base + collection
    }

    public function getAll(): array
    {
        $cursor = $this->collection->find();
        $products = [];
        foreach ($cursor as $doc) {
            $product = new Product();
            $product->setId((string)$doc->_id);
            $product->setNom($doc->nom);
            $product->setQuantite($doc->quantite);
            $product->setPrix($doc->prix);
            $products[] = $product;
        }
        return $products;
    }

    public function getById(string $id): ?Product
    {
        $doc = $this->collection->findOne(['_id' => new ObjectId($id)]);
        if (!$doc) {
            return null;
        }
        $product = new Product();
        $product->setId((string)$doc->_id);
        $product->setNom($doc->nom);
        $product->setQuantite($doc->quantite);
        $product->setPrix($doc->prix);
        return $product;
    }

    public function create(Product $product): bool
    {
        $result = $this->collection->insertOne([
            'nom' => $product->getNom(),
            'quantite' => $product->getQuantite(),
            'prix' => $product->getPrix()
        ]);
        return $result->getInsertedCount() === 1;
    }

    public function update(Product $product): bool
    {
        if (!$product->getId()) {
            throw new Exception("L'id est nécessaire pour la mise à jour");
        }
        $result = $this->collection->updateOne(
            ['_id' => new ObjectId($product->getId())],
            ['$set' => [
                'nom' => $product->getNom(),
                'quantite' => $product->getQuantite(),
                'prix' => $product->getPrix()
            ]]
        );
        return $result->getModifiedCount() === 1;
    }

    public function delete(string $id): bool
    {
        $result = $this->collection->deleteOne(['_id' => new ObjectId($id)]);
        return $result->getDeletedCount() === 1;
    }
}
