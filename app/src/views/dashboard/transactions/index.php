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
                <h1 class="text-3xl font-bold mb-3">Transactions Data</h1>
                <div class="flex">
                    <form action="/dashboard/products" method="GET" class="w-1/4 flex justify-end grow gap-2">
                        <input type="text" class="p-2 border-2 rounded-md w-full" name="keyword" placeholder="Search Transaction">
                        <button class="bg-lighSkyB p-2 rounded-md text-white cursor-pointer" type="submit">Search</button>
                    </form>
                </div>
                <table class="min-w-full mt-4 bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-skyB text-gray-800 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">ID Transaction</th>
                            <th class="py-3 px-6 text-left">Username</th>
                            <th class="py-3 px-6 text-left">Transaction Date</th>
                            <th class="py-3 px-6 text-left">Total Amount</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php $i = 1; ?>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6"><?= $i++ ?></td>
                                <td class="py-3 px-6"><?= $transaction['id_transaction'] ?></td>
                                <td class="py-3 px-6"><?= $transaction['username'] ?></td>
                                <td class="py-3 px-6"><?= $transaction['transaction_date'] ?></td>
                                <td class="py-3 px-6"><?= $transaction['total_amount'] ?></td>
                                <td class="py-3 px-6">
                                    <div class="flex gap-4">
                                        <a class="bg-blue-500 p-1 text-white rounded-md border-2 border-blue-500 hover:bg-transparent hover:text-black transition-all duration-150" href="/dashboard/transactions/<?= $transaction['id_transaction'] ?>">Details</a>
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