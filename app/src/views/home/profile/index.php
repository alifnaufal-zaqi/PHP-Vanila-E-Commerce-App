<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/styles/output.css" />
    <title>Edit Profile - <?= $user['username']; ?></title>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="min-h-screen flex flex-col items-center pt-6 px-4">

        <!-- Foto Profil -->
        <div class="relative mb-6">
            <img class="w-40 h-40 object-cover rounded-full border-4 border-white shadow-md" src="<?= empty($user['profile_picture']) ? '/assets/uploads/user-profile/default-profile.jpg' : $user['profile_picture']; ?>" alt="Profile <?= $user['username']; ?>" />
            <label for="profile_picture" class="absolute bottom-0 right-0 bg-blue-600 text-white text-sm px-2 py-1 rounded-md cursor-pointer hover:bg-blue-700">
                Ganti Foto
            </label>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-xl">
            <form action="/logout" method="POST" class="flex justify-center font-bold">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700 transition">Logout</button>
            </form>

            <!-- Form Edit -->
            <form action="/profile/update" method="POST" enctype="multipart/form-data">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Profile</h2>
    
                <!-- Input file hidden untuk upload foto -->
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden">
    
                <!-- Username -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium" for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= $user['username']; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
    
                <!-- Email -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium" for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $user['email']; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
    
                <!-- Address -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium" for="address">Address</label>
                    <textarea id="address" name="address" rows="3" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required><?= $user['address']; ?></textarea>
                </div>
    
                <!-- Gender -->
                <div class="mb-6">
                    <label class="block mb-1 font-medium" for="gender">Gender</label>
                    <select id="gender" name="gender" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
    
                <!-- Tombol Submit -->
                <div class="flex gap-3 items-center">
                    <a href="/home" class="bg-lighSkyB px-6 py-2 rounded-md text-white">Back</a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">Update Profile</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>