<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full pb-16">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
        <div class="w-3/4 mx-auto bg-white shadow">

            <!-- Parent Table -->
            <h2 class="flex justify-center">Parent Information</h2>
            <div class="w-full p-4">
                <table class="table-fixed border-collapse w-full">
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">Name:</td>
                        <td class="border px-4 py-2">John Doe</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Surname:</td>
                        <td class="border px-4 py-2">Smith</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Cellphone:</td>
                        <td class="border px-4 py-2">(123) 456-7890</td>
                    </tr>
                    <!-- Add more parent details as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Learner Table -->
            <h2 class="flex justify-center">Learner Information</h2>
            <div class="w-full p-4">
                <table class="table-fixed border-collapse w-full">
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">Name:</td>
                        <td class="border px-4 py-2">Emily Doe</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Surname:</td>
                        <td class="border px-4 py-2">Doe</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Grade:</td>
                        <td class="border px-4 py-2">5</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Bus ID:</td>
                        <td class="border px-4 py-2">Bus123</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Pickup Point:</td>
                        <td class="border px-4 py-2">Bus Stop A</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Dropoff Point:</td>
                        <td class="border px-4 py-2">School</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Registration Status:</td>
                        <td class="border px-4 py-2">Approved</td>
                    </tr>
                    <!-- Add more learner details as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Bank Table -->
            <h2 class="flex justify-center">Bank Information</h2>
            <div class="w-full p-4">
                <table class="table-fixed border-collapse w-full">
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">Bank Name:</td>
                        <td class="border px-4 py-2">Example Bank</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Account Number:</td>
                        <td class="border px-4 py-2">1234567890</td>
                    </tr>
                    <!-- Add more bank details as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
