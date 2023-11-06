<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

    <main class="p-4 min-h-full">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-center">
            <?php if (isset($_SESSION['error'])) : ?>
                <p class="text-red-800 my-2"><?= $_SESSION['error'] ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif ?>
            <?php if (isset($_SESSION['message'])) : ?>
                <p class="text-green-700 my-2"><?= $_SESSION['message'] ?></p>
            <?php unset($_SESSION['message']); ?>
            <?php endif ?>

            <form method="post" action="/login"
                  class="w-full max-w-md mx-auto p-6 bg-white rounded-md shadow-lg">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" required class="w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" required class="w-full p-2 border rounded-md">
                </div>

                <div class="flex space-x-2 justify-evenly mb-4">
                    <label for="role-parent">
                        <input type="radio" name="role" id="role-parent" value="parent" class="mx-2" required>Parent
                    </label>

                    <label for="role-admin">
                        <input type="radio" name="role" id="role-admin" value="admin" class="mx-2" required>Admin
                    </label>
                </div>
                <div class="text-center">
                    <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                           value="Login">
                </div>
            </form>
            <p class="text-gray-700 mt-4">Don't have an account? <a href="/signup" class="text-blue-500 hover:underline">Sign up here</a></p>
        </div>
    </main>


<?php include base_path('/app/views/partials/footer.php'); ?>