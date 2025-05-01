<?php 
require(__DIR__ . '/../../../middleware/authMiddleware.php');
require(__DIR__ . '/../../../middleware/checkRole.php');

authMiddleware();
checkRole();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <main class="flex h-screen overflow-hidden">
        <section class="bg-lighSkyB w-1/6 h-full shadow-lg">
            <?php include(__DIR__ . '/../../components/sidebar.php'); ?>
        </section>
        <section class="grow h-full">
            <?php include(__DIR__ . '/../../components/dashboard_nav.php') ?>
            <section class="px-6 py-8">
                <h1 class="text-3xl font-bold mb-3">Products Data</h1>
                <div class="flex justify-between">
                    <a class="bg-skyB p-2 rounded-md font-semibold hover:bg-transparent border-2 border-skyB transition-all duration-150" href="/dashboard/products/create">Add Product <i class="bi bi-plus-circle-fill"></i></a>
                    <form action="/dashboard/products" method="GET" class="w-1/4 flex justify-end gap-2">
                        <input type="text" class="p-2 border-2 rounded-md w-full" name="keyword" placeholder="Search Product">
                        <button class="bg-lighSkyB p-2 rounded-md text-white cursor-pointer" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <table class="min-w-full mt-4 bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-skyB text-gray-800 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Product Image</th>
                            <th class="py-3 px-6 text-left">Product Name</th>
                            <th class="py-3 px-6 text-left">Product Category</th>
                            <th class="py-3 px-6 text-left">Product Description</th>
                            <th class="py-3 px-6 text-left">Product Price</th>
                            <th class="py-3 px-6 text-left">Product Stok</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php $i = 1; ?>
                        <?php foreach ($products as $product) : ?>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6"><?= $i++ ?></td>
                                <td class="py-3 px-6">
                                    <img class="w-1/2" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                </td>
                                <td class="py-3 px-6"><?= $product['product_name'] ?></td>
                                <td class="py-3 px-6"><?= $product['category_name'] ?></td>
                                <td class="py-3 px-6"><?= $product['product_description'] ?></td>
                                <td class="py-3 px-6"><?= $product['products_price'] ?></td>
                                <td class="py-3 px-6"><?= $product['products_stock'] ?></td>
                                <td class="py-3 px-6">
                                    <div class="flex gap-4">
                                        <a class="bg-yellow-500 text-black py-1 px-2 rounded-md border-2 border-yellow-500 hover:bg-transparent transition-all duration-150" href="/dashboard/products/update/<?= $product['id_product'] ?>"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="/dashboard/products/delete/<?= $product['id_product']; ?>" method="POST" id="deleteProduct">
                                            <button class="bg-red-500 text-white py-1 px-2 rounded-md border-2 border-red-500 hover:bg-transparent hover:text-black transition-all duration-150" type="submit"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="flex justify-center mt-4">
                    <?php for($i = 1; $i <= $totalPage; $i++) : ?>
                        <a class="mx-1 px-3 py-1 border <?= ($i == $page) ? 'bg-lighSkyB text-white' : 'bg-white text-black' ?>" href="/dashboard/products?page=<?= $i ?>"><?= $i; ?></a>
                    <?php endfor; ?>
                </div>
            </section>
        </section>
    </main>

    <script type="module" src="/js/dashboard/index.js"></script>
</body>

</html>