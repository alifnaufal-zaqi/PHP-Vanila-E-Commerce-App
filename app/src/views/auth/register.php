<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Register | E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <main class="bg-lighSkyB h-screen text-white">
        <section class="flex justify-center items-center h-full px-96">
            <div class="bg-darkB p-16 h-[500px] w-[400px] rounded-tl-md rounded-bl-md">
                <h1 class="text-2xl font-bold">E-Commerce Register</h1>
                <p class="mb-20">Please login to enter catalog product</p>
                <h1 class="text-4xl">Hello New User</h1>
                <p>Please enter your username, email and passwors</p>
            </div>
            <div class="bg-slate-50 p-16 h-[500px] grow rounded-tr-md rounded-br-md text-black">
                <form action="/auth/register" method="POST" class="mt-auto">
                    <div class="mb-8 flex flex-col">
                        <label for="username" class="text-lg font-semibold">Username</label>
                        <input type="username" name="username" class="p-2 border-2 rounded-md focus:outline-2 focus:outline-offset-2 focus:outline-blue-500">
                    </div>
                    <div class="mb-8 flex flex-col">
                        <label for="email" class="text-lg font-semibold">Email</label>
                        <input type="email" name="email" class="p-2 border-2 rounded-md focus:outline-2 focus:outline-offset-2 focus:outline-blue-500">
                    </div>
                    <div class="mb-5 flex flex-col">
                        <label for="password" class="text-lg font-semibold">Password</label>
                        <input type="password" name="password" class="p-2 border-2 rounded-md focus:outline-2 focus:outline-offset-2 focus:outline-blue-500">
                    </div>
                    <div class="mb-5">
                        <input type="checkbox" name="show-password" id="showPassword" class="mr-2 scale-150 hover:cursor-pointer">
                        <label for="show-password">Show Password</label>
                    </div>
                    <div class="mb-10 flex flex-col">
                        <button class="bg-lighSkyB text-white p-2 rounded-md font-semibold focus:outline-offset-2 focus:outline-2 focus:outline-lighSkyB active:bg-darkB cursor-pointer" id="startShoopingBtn">Register</button>
                        <p class="mt-1">Already have an account? <a href="/auth/login" class="text-blue-500">Sign In</a></p>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script type="module" src="/js/auth/index.js"></script>
</body>

</html>