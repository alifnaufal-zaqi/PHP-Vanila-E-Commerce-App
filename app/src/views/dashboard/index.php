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
            <?php include(__DIR__ . '/../components/sidebar.php'); ?>
        </section>
        <section class="grow h-full">
            <nav class="bg-white shadow-md px-16 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="flex gap-5 items-center">
                    <p class="text-lg font-semibold">John Doe</p>
                    <img class="w-14" src="/assets/img/male-avatar.svg" alt="">
                </div>
            </nav>
            <section class="px-6 py-8 flex gap-5 h-full">
                <div>
                    <!-- Card -->
                    <div class="shadow-md p-8 rounded-md bg-darkB text-white">
                        <!-- Card Body -->
                         <div>
                            <h1 class="text-2xl font-bold">Hello Admin</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus at corrupti fugit accusantium impedit aliquam dignissimos sunt saepe aliquid fugiat, neque doloremque sit nesciunt esse odio explicabo? Quis, modi magni!</p>
                         </div>
                    </div>
                    
                    <div class="mt-6 grid grid-cols-2 gap-5">
                        <div class="shadow-md p-8 rounded-md bg-skyB text-center">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl mb-5 font-bold">Product Count</h1>
                                <p class="text-2xl font-semibold"><?= $productCount['product_count']; ?></p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-skyB text-center">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl mb-5 font-bold">Total Transactions</h1>
                                <p class="text-2xl font-semibold"><?= $transactionCount['transaction_count'] ?></p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-skyB text-center">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl mb-5 font-bold">User Count</h1>
                                <p class="text-2xl font-semibold"><?= $userCount['user_count']; ?></p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-skyB text-center">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl mb-5 font-bold">Renevue</h1>
                                <p class="text-2xl font-semibold">10</p>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/3 h-full pb-16">
                    <!-- Card -->
                    <div class="shadow-md w-full p-5 rounded-md h-full bg-lightS">
                        <!-- Card Body -->
                         <div>
                            <h1 class="text-2xl font-bold text-center">New Transaction</h1>
                            <table class="mx-auto text-center w-full">
                                <thead>
                                    <tr>
                                        <th class="p-2 mx-auto">No</th>
                                        <th class="p-2 mx-auto">User</th>
                                        <th class="p-2 mx-auto">Total Payment</th>
                                        <th class="p-2 mx-auto">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Bob</td>
                                        <td>$100</td>
                                        <td><span class="bg-green-500 p-1 rounded-md font-bold">complete</span></td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
</body>

</html>