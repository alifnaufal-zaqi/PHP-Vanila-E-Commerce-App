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
            <nav class="bg-white shadow-md px-16 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <div class="flex gap-5 items-center">
                    <p class="text-lg font-semibold">John Doe</p>
                    <img class="w-14" src="/assets/img/male-avatar.svg" alt="">
                </div>
            </nav>
            <section class="px-6 py-8">
                <h1 class="text-3xl font-bold mb-3">Users Data</h1>
                <div class="flex justify-between">
                    <form action="/dashboard/products" method="GET" class="w-1/4 flex justify-end gap-2 grow">
                        <input type="text" class="p-2 border-2 rounded-md w-full" name="keyword" placeholder="Search Product">
                        <button class="bg-lighSkyB p-2 rounded-md text-white cursor-pointer" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <table class="min-w-full mt-4 bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-skyB text-gray-800 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Username</th>
                            <th class="py-3 px-6 text-left">User Email</th>
                            <th class="py-3 px-6 text-left">User Address</th>
                            <th class="py-3 px-6 text-left">User Gender</th>
                            <th class="py-3 px-6 text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6"><?= $i++ ?></td>
                                <td class="py-3 px-6"><?= $user['username'] ?></td>
                                <td class="py-3 px-6"><?= $user['email'] ?></td>
                                <td class="py-3 px-6 <?= empty($user['address']) ? "italic" : ""; ?>"><?= empty($user['address']) ? 'Empty' : $user['address']; ?></td>
                                <td class="py-3 px-6 <?= empty($user['gender']) ? "italic" : ""; ?>"><?= empty($user['gender']) ? 'Empty' : $user['gender']; ?></td>
                                <td class="py-3 px-6">
                                    <div class="flex gap-4">
                                        <a class="bg-blue-500 text-white py-1 px-2 rounded-md border-2 border-blue-500 hover:bg-transparent transition-all duration-150" href="/dashboard/users/<?= $user['id_user']; ?>">Detail</a>
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
</body>

</html>