<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <main class="flex h-screen overflow-hidden">
        <section class="bg-lighSkyB w-1/6 h-full shadow-lg">
            <?php include(__DIR__ . '/../../components/sidebar.php'); ?>
        </section>
        <section class="grow h-full">
            <nav class="bg-white shadow-md px-16 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="flex gap-5 items-center">
                    <p class="text-lg font-semibold">John Doe</p>
                    <img class="w-14" src="/assets/img/male-avatar.svg" alt="">
                </div>
            </nav>
            <section class="px-6 py-8">
                <div class="shadow-md rounded-md p-5">
                    <div>
                        <h1 class="text-3xl font-bold">Form Create Product</h1>
                    </div>
                    <div class="mt-6">
                        <form action="/dashboard/products/create" method="post" enctype="multipart/form-data">
                            <div class="mb-3 flex flex-col">
                                <label for="product-name" class="text-xl font-semibold">Product Name</label>
                                <input type="text" name="product-name" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500" placeholder="Enter Product Name">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="product-category" class="text-xl font-semibold">Product Category</label>
                                <select name="product-category" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500" id="product-category">
                                    <option value="default" selected>Choose Product Category</option>
                                    <?php foreach($categorys as $category) : ?>
                                        <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="product-description" class="text-xl font-semibold">Product Description</label>
                                <textarea name="product-description" id="product-description" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500" placeholder="Enter Product Description"></textarea>
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="product-price" class="text-xl font-semibold">Product Price</label>
                                <input type="text" name="product-price" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500" placeholder="Enter Product Price">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="product-stock" class="text-xl font-semibold">Product Stock</label>
                                <input type="text" name="product-stock" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500" placeholder="Enter Product stock">
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="product-image">Product Image</label>
                                <input type="file" name="product-image" id="product-image" class="border-2 p-2 rounded-md focus:outline-offset-2 focus:outline-2 focus:outline-blue-500 file:bg-gray-500 file:p-1 file:rounded-md file:text-white file:cursor-pointer">
                            </div>
                            <div class="mb-3 flex gap-3">
                                <button type="submit" class="bg-lighSkyB text-white p-2 rounded-md font-semibold focus:outline-offset-2 focus:outline-2 focus:outline-lighSkyB active:bg-darkB cursor-pointer">Create Product</button>
                                <a href="/dashboard/products" class="bg-skyB p-2 rounded-md font-semibold hover:bg-transparent border-2 border-skyB transition-all duration-150">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </main>
</body>

</html>