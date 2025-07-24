<?php

class Product
{
    private ?string $id = null;
    private string $nom = '';
    private int $quantite = 0;
    private float $prix = 0.0;

    public function getId(): ?string
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }
}
