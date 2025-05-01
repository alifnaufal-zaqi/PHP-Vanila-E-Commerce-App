<nav class="bg-white shadow-md px-16 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">Dashboard</h1>
    <div class="flex gap-5 items-center">
        <p class="text-lg font-semibold"><?= $user['username']; ?></p>
        <img class="w-14" src="<?= empty($user['profile_picture']) ? '/assets/img/male-avatar.svg' : $user['profile_picture']; ?>" alt="">
    </div>
</nav>