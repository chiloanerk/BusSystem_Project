<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full">
    <div class="mx-auto max-w-5xl py-2 bg-gray-50 sm:px-6 lg:px-8 text-center">
        <p class="text-center text-red-800"><?= isset($_SESSION['error']) ?? '' ?></p>
        <table class="mx-auto bg-white table-auto w-3/4 border-collapse shadow-lg">
            <thead>
            <tr>
                <th class="border-b bg-gray-200 px-4 py-2 text-left">Description</th>
                <th class="border-b bg-gray-200 px-4 py-2 text-left">Captured Data</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border-b px-4 py-2">Name</td>
                <td class="border-b px-4 py-2"><?= $name ?></td>
            </tr>
            <!-- ... (other table rows) ... -->
            <tr>
                <td class="border-b px-4 py-2">Surname</td>
                <td class="border-b px-4 py-2"><?= $surname ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Cellphone</td>
                <td class="border-b px-4 py-2"><?= $cellphone ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Grade</td>
                <td class="border-b px-4 py-2"><?= $grade ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Bus Route</td>
                <td class="border-b px-4 py-2"><?= $route ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Pickup Point</td>
                <td class="border-b px-4 py-2"><?= $pickup_num ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Pickup Name</td>
                <td class="border-b px-4 py-2"><?= $pickup['pickup_name'] ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Pickup Time</td>
                <td class="border-b px-4 py-2"><?= $pickup['pickup_time'] ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Dropoff Point</td>
                <td class="border-b px-4 py-2"><?= $dropoff_num ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Dropoff Name</td>
                <td class="border-b px-4 py-2"><?= $dropoff['dropoff_name'] ?></td>
            </tr>
            <tr>
                <td class="border-b px-4 py-2">Dropoff Time</td>
                <td class="border-b px-4 py-2"><?= $dropoff['dropoff_time'] ?></td>
            </tr>
            </tbody>
        </table>

            <form method="post" action="/complete" class="text-center mx-auto justify-between w-2/3 mt-4 flex">
                <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded cursor-pointer"><a href="/application">Edit</a></div>
                <button type="submit" name="complete"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                    Submit
                </button>
            </form>
    </div>
</main>


