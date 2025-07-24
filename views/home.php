<?php require_once __DIR__ . '/templates/header.php'; ?>

<h1 class="text-2xl font-bold mb-6">Liste des produits</h1>

<table class="table-auto w-full bg-white shadow-md rounded mb-6">
    <thead class="bg-blue-100">
        <tr>
            <th class="px-4 py-2 text-left">Nom</th>
            <th class="px-4 py-2 text-left">Quantité</th>
            <th class="px-4 py-2 text-left">Prix (€)</th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr class="border-t">
                <td class="px-4 py-2"><?= htmlspecialchars($product->getNom()) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($product->getQuantite()) ?></td>
                <td class="px-4 py-2"><?= number_format($product->getPrix(), 2, ',', ' ') ?></td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="?action=edit&id=<?= $product->getId() ?>" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Modifier</a>
                    <a href="?action=delete&id=<?= $product->getId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
