<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl font-bold mb-4">Verify Information</h2>

        <div class="w-full max-w-3xl mx-auto p-6 bg-white rounded-md shadow-lg">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Child's Name:</strong> <?= $name ?></p>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Child's Surname:</strong> <?= $surname ?></p>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Cellphone:</strong> <?= $cellphone ?></p>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Grade:</strong> <?= $grade ?></p>
                    </div>
                </div>

                <div class="flex flex-col justify-center">
                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Bus Route:</strong> <?= $bus ?></p>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Pickup Point:</strong> <?= $pickupPoint ?></p>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700"><strong>Dropoff Point:</strong> <?= $dropoffPoint ?></p>
                    </div>

                    <div class="text-center">
                        <a href="/checkout" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Edit</a>
                        <form method="post" action="/complete" style="display: inline;">
                            <button type="submit" name="complete" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Complete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
