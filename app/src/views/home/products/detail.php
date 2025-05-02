<?php 
require_once __DIR__ . '/../../../middleware/authMiddleware.php';

authMiddleware();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/output.css">
    <title>Detaiil Product <?= $product['product_name']; ?></title>
</head>
<body>
    <main class="h-screen">
        <section class="px-16 py-32 h-full flex gap-8">
            <div class="basis-1/2">
                <img class="w-full h-96 object-contain" src="<?= $product['product_image'] ?>" alt="">
            </div>
            <div class="basis-2/3">
                <h1 class="text-2xl font-semibold"><?= $product['product_name']; ?></h1>
                <h4 class="text-3xl mt-3">$<?= $product['products_price'] ?>.00</h4>
                <h6 class="mt-4 text-lg">Category : </h6>
                <p class="font-semibold text-3xl"><?= $product['category_name']; ?></p>

                <h6 class="mt-16 text-2xl font-bold">Description Products : </h6>
                <p class="text-xl"><?= $product['product_description']; ?></p>
                <div class="w-full flex gap-4 mt-3 items-center">
                    <a href="/home" class="bg-skyB p-2 text-center basis-1/2 rounded-md text-lg">Back</a>
                    <button class="bg-lighSkyB p-2 text-lg rounded-md hover:cursor-pointer text-white basis-1/2">Buy</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>