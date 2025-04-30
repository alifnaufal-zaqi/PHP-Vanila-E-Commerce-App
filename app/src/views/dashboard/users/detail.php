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
    <link rel="stylesheet" href="/assets/css/bootstrap-icons.css">
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
                <a href="/dashboard/users" class="bg-lighSkyB text-white p-2 rounded-md hover:bg-transparent hover:text-black border-2 border-lighSkyB transition-all duration-150">Back</a>
                <h1 class="text-3xl font-bold my-3">Detail User</h1>
                <div class="p-3 bg-neutral-50 shadow-md rounded-md">
                    <?php if(!empty($user['profile_picture'])) : ?>
                        <img src="<?= $user['profile_picture'] ?>" alt="<?= $user['username'] ?>">
                    <?php else : ?>
                        <i class="bi bi-person-circle text-5xl"></i>
                    <?php endif; ?>
                    <ul class="text-xl flex flex-col gap-2">
                        <li>Username: <?= $user['username'] ?></li>
                        <li>Email: <span class="text-blue-500"><?= $user['email'] ?></span></li>
                        <li>Address: <span class="<?= empty($user['address']) ? 'italic text-blue-400' : ''; ?>"><?= empty($user['address']) ? 'Empty' : $user['address'] ?></span></li>
                        <li>Gender: <span class="<?= empty($user['gender']) ? 'italic text-blue-400' : ''; ?>"><?= empty($user['gender']) ? 'Empty' : $user['gender'] ?></span></li>
                    </ul>
                </div>
            </section>
        </section>
    </main>
</body>

</html>