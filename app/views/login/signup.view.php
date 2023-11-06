<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-center">
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="text-red-800"><?= $_SESSION['error'] ?></p>
        <?php endif ?>

        <form method="post" action="/signup" class="w-full max-w-md mx-auto p-6 bg-white rounded-md shadow-lg">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" required class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="surname" class="block text-gray-700">Surname:</label>
                <input type="text" name="surname" id="surname" required class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" name="email" id="email" required class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="cellphone" class="block text-gray-700">Cellphone Number:</label>
                <input type="text" name="cellphone" id="cellphone" required class="w-full p-2 border rounded-md">
            </div>

            <div class="text-center">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                       value="Signup">
            </div>
        </form>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
