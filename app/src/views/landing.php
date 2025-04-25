<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <?php include('components/navbar.php'); ?>

    <main class="bg-hero">
        <!-- Hero Section -->
        <section class="flex gap-10 px-24 py-16 items-center">
            <div>
                <h1 class="text-5xl font-bold mb-10 text-lighSkyB">What's E-Commerce</h1>
                <p class="text-2xl mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, sapiente voluptatum expedita magni sint enim ex earum, non numquam mollitia dolores ipsa voluptates architecto id quaerat reprehenderit labore ea voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aut aliquid eos at voluptatum sed mollitia omnis? Veritatis cum dicta ducimus, dolorum enim minima nihil excepturi nostrum vero provident exercitationem.</p>
                <button class="bg-lighSkyB text-white p-2 rounded-md font-semibold focus:outline-offset-2 focus:outline-2 focus:outline-lighSkyB active:bg-darkB cursor-pointer">Start Shooping</button>
            </div>
            <img src="/assets/img/hero.svg" alt="hero-img" class="max-w-[600px]">
        </section>

        <!-- About Section -->
        <section class="flex gap-10 px-24 py-16 items-center">
            <img class="max-w-[600px]" src="/assets/img/shooping-cart.svg" alt="about-image">
            <div>
                <h1 class="text-4xl font-bold mb-5">About E-Commerce</h1>
                <p class="text-2xl mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eum iure obcaecati necessitatibus quam quia cumque alias aliquid, possimus aspernatur sed, repudiandae vitae. Unde dignissimos eius repellendus illum eos. Asperiores!</p>
            </div>
        </section>

        <!-- Previews Product Section -->
        <section class="bg-skyB h-fit px-24 py-16">
            <h3 class="text-center font-semibold text-3xl text-white mb-5">New Product</h3>
            <div class="grid grid-cols-3 gap-4">
                <?php foreach ($products as $product) : ?>
                    <!-- Product Card -->
                    <div class="w-3/4 bg-slate-50 rounded-md h-full mx-auto flex flex-col justify-between">
                        <!-- Card Header -->
                        <div class="w-full h-96 overflow-hidden">
                            <img src="<?= $product['product_image']; ?>" class="w-full h-full object-cover object-center" alt="">
                        </div>
                        <!-- Card Body -->
                        <div class="p-4 flex flex-col">
                            <h1 class="mb-2 font-bold text-lg"><?= $product['product_name']; ?></h1>
                            <p class="mb-2 grow"><?= $product['product_description']; ?></p>
                            <h5 class="font-bold text-xl">RP. <?= $product['products_price'] ?></h5>
                        </div>
                        <div class="p-4">
                            <button class="bg-lighSkyB p-3 w-full rounded-md text-white font-semibold focus:outline-offset-2 focus:outline-2 focus:outline-lighSkyB active:bg-darkB cursor-pointer">Buy Now</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="px-24 py-32 ">
            <h1 class="text-center font-bold mb-3 text-3xl">FAQ</h1>
            <div class="rounded-md mb-3 p-5 grid grid-cols-2 gap-4">
                <?php foreach($faq as $f) : ?>
                    <div class="bg-slate-50 rounded-md p-2 shadow-md">
                        <h2 class="text-xl font-semibold mb-3"><?= $f['question']; ?></h2>
                        <p class="text-lg"><?= $f['answer'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <p class="text-xl font-semibold text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nesciunt porro quis unde quidem accusantium voluptate nobis fugiat id ex ab placeat minus sunt, pariatur aperiam voluptas consequatur libero repellat?</p>
        </section>
    </main>

    <?php include(__DIR__ . '/components/footer.php'); ?>

    <script src="/js/index.js"></script>
</body>

</html>