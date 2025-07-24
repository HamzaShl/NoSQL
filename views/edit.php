<?php require_once __DIR__ . '/templates/header.php'; ?>

<h1 class="text-2xl font-bold mb-6">Modifier le produit</h1>

<form method="POST" action="?action=update" class="bg-white p-6 rounded shadow-md max-w-md mx-auto">
    <input type="hidden" name="id" value="<?= htmlspecialchars($product->getId()) ?>">

    <div class="mb-4">
        <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom du produit</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($product->getNom()) ?>" required
               class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label for="quantite" class="block text-gray-700 font-semibold mb-2">Quantité</label>
        <input type="number" name="quantite" id="quantite" min="0"
               value="<?= htmlspecialchars($product->getQuantite()) ?>" required
               class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-6">
        <label for="prix" class="block text-gray-700 font-semibold mb-2">Prix (€)</label>
        <input type="number" step="0.01" name="prix" id="prix" min="0"
               value="<?= htmlspecialchars($product->getPrix()) ?>" required
               class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="flex justify-between">
        <a href="?action=index" class="text-blue-600 hover:underline">← Annuler</a>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Enregistrer</button>
    </div>
</form>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
