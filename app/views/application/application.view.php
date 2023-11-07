<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8 text-center">
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="text-red-800"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']) ?>
        <?php endif ?>
        <div class="py-4 bg-white w-full max-w-3xl mx-auto mb-4 shadow text-blue-800">
            <a href="/checkout">View My Active Registrations</a>
        </div>
        <form method="post" action="/review"
              class="w-full max-w-3xl mx-auto p-6 bg-white rounded-md shadow-lg">
            <div class="lg:grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Child's Name:</label>
                        <input type="text" name="name" id="name" value="<?= $_SESSION['name'] ?? '' ?>" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="surname" class="block text-gray-700">Child's Surname:</label>
                        <input type="text" name="surname" id="surname" value="<?= $_SESSION['name'] ?? '' ?>" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="cellphone" class="block text-gray-700">Cellphone:</label>
                        <input type="tel" name="cellphone" id="cellphone" value="<?= $_SESSION['cellphone'] ?? '' ?>" required class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="grade">Grade</label>
                        <input type="number" min="8" max="12" id="grade" name="grade" value="<?= $_SESSION['grade'] ?? '' ?>" required class="border rounded px-4 py-2 w-full">
                    </div>
                </div>

                <div class="flex flex-col justify-center">
                    <div class="mb-4">
                        <label for="pickup_num">Bus</label>
                        <select name="bus" id="pickup_num" class="border rounded bg-white px-4 py-2 w-full" required onchange="showRoutes(this.value)">
                            <option value="">Select a Bus</option>
                            <?php foreach ($buses as $bus) : ?>
                            <option value="<?= $bus['id'] ?>">Bus <?= $bus['id'] . ' - ' . $bus['route'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4" id="routeInfo">
                        <label for="pickup_num">Pickup Point</label>
                        <select name="pickup_num" id="pickup_num" class="border rounded bg-white px-4 mb-4 py-2 w-full">
                            <option value="">Select a Pickup Point</option>
                        </select>

                        <label for="dropoff_num">Dropoff Point</label>
                        <select name="dropoff_num" id="dropoff_num" class="border rounded bg-white px-4 mb-8 py-2 w-full">
                            <option value="">Select a Dropoff Point</option>
                        </select>
                        <div class=" flex justify-center">
                            <table>
                                <tr>
                                    <th>Available Seats</th>
                                </tr>
                                <tr class="flex justify-center">
                                    <td>Select a Bus</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<script src="scripts/filterRoutes.js"></script>

<?php include base_path('/app/views/partials/footer.php'); ?>
