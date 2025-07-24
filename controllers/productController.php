<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/repositories/ProductRepository.php';

class ProductController
{
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    // Affiche la liste des produits
    public function index()
    {
        $products = $this->productRepository->getAll();
        require_once __DIR__ . '/../views/home.php';
    }

    // Affiche un produit en détail
    public function show(string $id)
    {
        $product = $this->productRepository->getById($id);
        if (!$product) {
            $this->forbidden();
            return;
        }
        require_once __DIR__ . '/../views/show.php';
    }

    // Affiche le formulaire de création
    public function create()
    {
        require_once __DIR__ . '/../views/create.php';
    }

    // Traite la création en base
    public function store()
    {
        $product = new Product();
        $product->setNom($_POST['nom'] ?? '');
        $product->setQuantite(intval($_POST['quantite'] ?? 0));
        $product->setPrix(floatval($_POST['prix'] ?? 0));

        $this->productRepository->create($product);

        header('Location: ?action=index');
        exit;
    }

    // Affiche le formulaire d'édition
    public function edit(string $id)
    {
        $product = $this->productRepository->getById($id);
        if (!$product) {
            $this->forbidden();
            return;
        }
        require_once __DIR__ . '/../views/edit.php';
    }

    // Traite la mise à jour en base
    public function update()
    {
        $product = new Product();
        $product->setId($_POST['id'] ?? '');
        $product->setNom($_POST['nom'] ?? '');
        $product->setQuantite(intval($_POST['quantite'] ?? 0));
        $product->setPrix(floatval($_POST['prix'] ?? 0));

        $this->productRepository->update($product);

        header('Location: ?action=index');
        exit;
    }

    // Supprime un produit
    public function delete(string $id)
    {
        $this->productRepository->delete($id);

        header('Location: ?action=index');
        exit;
    }

    // Page 404
    public function forbidden()
    {
        http_response_code(404);
        require_once __DIR__ . '/../views/404.php';
    }
}
