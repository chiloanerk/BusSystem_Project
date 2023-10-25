<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8 text-center">
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="text-red-800"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>
        <form method="post" action="/checkout"
              class="w-full max-w-3xl mx-auto p-6 bg-white rounded-md shadow-lg">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Child's Name:</label>
                        <input type="text" name="name" id="name" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="surname" class="block text-gray-700">Child's Surname:</label>
                        <input type="text" name="surname" id="surname" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="cellphone" class="block text-gray-700">Cellphone:</label>
                        <input type="tel" name="cellphone" id="cellphone" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="grade">Grade</label>
                        <input type="number" id="grade" name="grade" required class="border rounded px-4 py-2 w-full">
                    </div>
                </div>

                <div class="flex flex-col justify-center">
                    <div class="mb-4">
                        <label for="pickup-point">Bus Route</label>
                        <select name="bus" id="pickup-point" class="border rounded px-4 py-2 w-full" required>
                            <option value="">Select a Bus</option>
                            <option value="1">Bus 1</option>
                            <option value="2">Bus 2</option>
                            <option value="3">Bus 3</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="pickup-point">Pickup Point</label>
                        <select name="pickup-point" id="pickup-point" class="border rounded px-4 py-2 w-full" required>
                            <option value="">Select a Pickup Point</option>
                            <option value="1">Corner 1</option>
                            <option value="2">Corner 2</option>
                            <option value="3">Corner 3</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="dropoff-point">Dropoff Point</label>
                        <select name="dropoff-point" id="dropoff-point" class="border rounded px-4 py-2 w-full" required>
                            <option value="">Select a Dropoff Point</option>
                            <option value="1">Corner 1</option>
                            <option value="2">Corner 2</option>
                            <option value="3">Corner 3</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
