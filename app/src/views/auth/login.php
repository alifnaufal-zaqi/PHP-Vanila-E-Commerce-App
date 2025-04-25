<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <main class="bg-lighSkyB h-screen text-white">
        <section class="flex justify-center items-center h-full px-96">
            <div class="bg-darkB p-16 h-[500px] w-[400px] rounded-tl-md rounded-bl-md">
                <h1 class="text-2xl font-bold">E-Commerce Login</h1>
                <p class="mb-20">Please login to enter catalog product</p>
                <h1 class="text-4xl">Hello Welcome Back</h1>
                <p>Please enter your email and passwors</p>
            </div>
            <div class="bg-slate-50 p-16 h-[500px] grow rounded-tr-md rounded-br-md text-black">
                <form action="/auth/login" method="POST" class="mt-auto">
                    <div class="mb-8 flex flex-col">
                        <label for="email" class="text-lg font-semibold">Email</label>
                        <input type="email" name="email" class="p-2 border-2 rounded-md focus:outline-2 focus:outline-offset-2 focus:outline-blue-500">
                    </div>
                    <div class="mb-5 flex flex-col">
                        <label for="password" class="text-lg font-semibold">Password</label>
                        <input type="password" name="password" class="p-2 border-2 rounded-md focus:outline-2 focus:outline-offset-2 focus:outline-blue-500">
                    </div>
                    <div class="mb-5">
                        <input type="checkbox" name="show-password" id="showPassword" class="mr-2 scale-150">
                        <label for="show-password">Show Password</label>
                    </div>
                    <div class="mb-10 flex flex-col">
                        <button class="bg-lighSkyB text-white p-2 rounded-md font-semibold focus:outline-offset-2 focus:outline-2 focus:outline-lighSkyB active:bg-darkB cursor-pointer" id="startShoopingBtn">Login</button>
                        <p class="mt-1">Dont have an account? <a href="/auth/register" class="text-blue-500">Register</a></p>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script type="module" src="/js/auth/index.js"></script>
</body>

</html>