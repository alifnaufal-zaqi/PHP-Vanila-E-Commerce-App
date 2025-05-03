<?php 
require_once __DIR__ . '/../../../middleware/authMiddleware.php';

authMiddleware();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Product | E-Commerce</title>
    <link rel="stylesheet" href="/styles/output.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons.css">
</head>
<body class="font-abel">
    <header class="px-16 py-7 bg-white shadow-md">
        <nav class="flex justify-between items-center">
            <h1 class="text-3xl font-bold">E-Commerce</h1>
            <div class="flex items-center gap-10">
                <form action="">
                    <input type="text" name="product-name" class="border-2 px-6 py-2 rounded-md" placeholder="Serach Product">
                    <button type="submit" class="py-2 px-6 text-lg hover:cursor-pointer bg-darkB text-white rounded-md"><i class="bi bi-search"></i></button>
                </form>
                <img src="/assets/img/male-avatar.svg" class="w-14 hover:cursor-pointer" alt="profile-image" id="profile-widget">
            </div>
        </nav>
    </header>
    <main>
        <section class="px-16 py-8 grid grid-cols-4 gap-5 place-content-center">
            <?php foreach($products as $product) : ?>
                <!-- Card -->
                <div class="shadow-md rounded-md flex flex-col justify-between">
                    <!-- Card Header -->
                     <div class="w-full">
                        <img class="h-96 object-cover rounded-t-md" src="<?= $product['product_image'] ?>" alt="product-image">
                     </div>
                     <!-- Card Body -->
                      <div class="p-3">
                        <h1 class="text-xl font-bold mb-3"><?= $product['product_name'] ?></h1>
                        <h4 class="text-lg font-semibold">$<?= $product['products_price'] ?></h4>
                        <p><?= $product['product_description'] ?></p>
                      </div>
                     <!-- Card Footer -->
                      <div class="p-3 w-full">
                        <a href="/home/<?= $product['id_product'] ?>" class="bg-lighSkyB w-full block text-white text-center p-2 rounded-md">Detail Product</a>
                      </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <script>
        const profileImageWidget = document.getElementById('profile-widget');

        profileImageWidget.addEventListener('click', () => {
            window.location.href = '/home/profile';
        })
    </script>
</body>
</html>