<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

    <main class="p-4 min-h-full">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-center">
            <form method="post" action="/<?= $action; ?>>"
                  class="w-full max-w-md mx-auto p-6 bg-white rounded-md shadow-lg">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" required class="w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" required class="w-full p-2 border rounded-md">
                </div>

                <div class="text-center">
                    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                           value="Login">
                </div>
            </form>
        </div>
    </main>


<?php include base_path('/app/views/partials/footer.php'); ?>