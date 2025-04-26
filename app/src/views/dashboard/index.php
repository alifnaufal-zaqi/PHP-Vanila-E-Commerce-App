<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Login | E-Commerce App Using PHP</title>
    <link rel="stylesheet" href="/styles/output.css">
</head>

<body class="font-abel">
    <main class="flex h-screen">
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
                        <div class="shadow-md p-8 rounded-md bg-darkB text-white">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl font-bold">Hello Admin</h1>
                                <p>10</p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-darkB text-white">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl font-bold">Hello Admin</h1>
                                <p>10</p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-darkB text-white">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl font-bold">Hello Admin</h1>
                                <p>10</p>
                             </div>
                        </div>
                        <div class="shadow-md p-8 rounded-md bg-darkB text-white">
                            <!-- Card Body -->
                             <div>
                                <h1 class="text-2xl font-bold">Hello Admin</h1>
                                <p>10</p>
                             </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h1 class="text-2xl font-bold mb-5">New Products</h1>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">No</th>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">Product Name</th>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">Product Category</th>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">Product Description</th>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">Product Price</th>
                                    <th class="p-2 border-b-1 border-r-1 mx-auto">Product Stock</th>
                                    <th class="p-2 border-b-1 mx-auto">Product Image</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="w-1/3 h-full">
                    <!-- Card -->
                    <div class="shadow-md w-full p-5 rounded-md h-full bg-lightS">
                        <!-- Card Body -->
                         <div>
                            <h1 class="text-2xl font-bold text-center">Todo List</h1>
                            <table class="mx-auto text-center w-full">
                                <thead>
                                    <tr>
                                        <th class="p-2 mx-auto">No</th>
                                        <th class="p-2 mx-auto">Todo</th>
                                        <th class="p-2 mx-auto">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Add New Product</td>
                                        <td>
                                            <form action="">
                                                <input type="hidden" name="">
                                                <button class="px-2 rounded-md cursor-pointer bg-green-500" type="submit">v</button>
                                            </form>
                                        </td>
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