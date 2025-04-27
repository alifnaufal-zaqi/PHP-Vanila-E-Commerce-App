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
                <a href="/dashboard/transactions" class="bg-lighSkyB text-white p-2 rounded-md hover:bg-transparent hover:text-black border-2 border-lighSkyB transition-all duration-150">Back</a>
                <h1 class="text-3xl font-bold my-3">Detail Transactions</h1>
                <div class="p-3 bg-neutral-50 shadow-md rounded-md">
                    <ul class="text-xl flex flex-col gap-2">
                        <li>ID Transaction: <?= $transaction['id_transaction'] ?></li>
                        <li>Username: <?= $transaction['username'] ?></li>
                        <li>Email: <span class="text-blue-500"><?= $transaction['email'] ?></span></li>
                        <li>Transaction Date: <?= $transaction['transaction_date'] ?></li>
                        <li>Total Amount: <?= $transaction['total_amount'] ?></li>
                    </ul>
                    <table class="min-w-full mt-4 bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-skyB text-gray-800 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">No</th>
                                <th class="py-3 px-6 text-left">Product Name</th>
                                <th class="py-3 px-6 text-left">Price Per Item</th>
                                <th class="py-3 px-6 text-left">Quantity</th>
                                <th class="py-3 px-6 text-left">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <?php $i = 1; ?>
                            <?php foreach ($transactionItems as $ti) : ?>
                                <tr class="border-b border-gray-300 hover:bg-gray-100">
                                    <td class="py-3 px-6"><?= $i++ ?></td>
                                    <td class="py-3 px-6"><?= $ti['product_name'] ?></td>
                                    <td class="py-3 px-6"><?= $ti['price_per_item'] ?></td>
                                    <td class="py-3 px-6"><?= $ti['quantity'] ?></td>
                                    <td class="py-3 px-6"><?= $ti['subtotal'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                            <a class="mx-1 px-3 py-1 border <?= ($i == $page) ? 'bg-lighSkyB text-white' : 'bg-white text-black' ?>" href="/dashboard/products?page=<?= $i ?>"><?= $i; ?></a>
                        <?php endfor; ?>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <script type="module" src="/js/dashboard/index.js"></script>
</body>

</html>