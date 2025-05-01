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
            <?php include(__DIR__ . '/../../components/dashboard_nav.php') ?>
            <section class="px-6 py-8">
                <a href="/dashboard/users" class="bg-lighSkyB text-white p-2 rounded-md hover:bg-transparent hover:text-black border-2 border-lighSkyB transition-all duration-150">Back</a>
                <h1 class="text-3xl font-bold my-3">Detail User</h1>
                <div class="p-3 bg-neutral-50 shadow-md rounded-md">
                    <?php if(!empty($userD['profile_picture'])) : ?>
                        <img src="<?= $userD['profile_picture'] ?>" alt="<?= $userD['username'] ?>">
                    <?php else : ?>
                        <i class="bi bi-person-circle text-5xl"></i>
                    <?php endif; ?>
                    <ul class="text-xl flex flex-col gap-2">
                        <li>Username: <?= $userD['username'] ?></li>
                        <li>Email: <span class="text-blue-500"><?= $userD['email'] ?></span></li>
                        <li>Address: <span class="<?= empty($userD['address']) ? 'italic text-blue-400' : ''; ?>"><?= empty($userD['address']) ? 'Empty' : $userD['address'] ?></span></li>
                        <li>Gender: <span class="<?= empty($userD['gender']) ? 'italic text-blue-400' : ''; ?>"><?= empty($userD['gender']) ? 'Empty' : $userD['gender'] ?></span></li>
                    </ul>
                </div>
            </section>
        </section>
    </main>
</body>

</html>