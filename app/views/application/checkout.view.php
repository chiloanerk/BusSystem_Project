<?php

include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full pb-16">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
        <div class="w-3/4 mx-auto bg-white shadow">

            <!-- Parent Table -->
            <h2 class="flex justify-center font-bold">Parent Information</h2>
            <div class="w-full p-4">
                <table class="table-fixed border-collapse w-full">
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">Name:</td>
                        <td class="border px-4 py-2"><?= $parentInfo['name'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Surname:</td>
                        <td class="border px-4 py-2"><?= $parentInfo['surname'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Cellphone:</td>
                        <td class="border px-4 py-2"><?= $parentInfo['cellphone'] ?></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Email:</td>
                        <td class="border px-4 py-2"><?= $parentInfo['email'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Learner Table -->
            <h2 class="flex justify-center font-bold">Learner Information</h2>
            <?php foreach ($registrations as $registration) :
                $bus_id = $registration['bus_id'];
                $busInfo = $busModel->getBusRoute($bus_id);
                $learner_id = $registration['learner_id'];
                $learnerInfo = $learnerModel->getLearner($learner_id);
                $pickupInfo = $routeModel->getPickup($registration['pickup_num']);
                $dropoffInfo = $routeModel->getDropoff($registration['dropoff_num']);
                ?>
                <div class="w-full p-4">
                    <table class="table-fixed border-collapse w-full">
                        <tbody>
                        <tr>


                            <td class="border px-4 py-2">Name:</td>
                            <td class="border px-4 py-2"><?= $learnerInfo['name'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Surname:</td>
                            <td class="border px-4 py-2"><?= $learnerInfo['surname'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Grade:</td>
                            <td class="border px-4 py-2"><?= $learnerInfo['grade'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Bus:</td>
                            <td class="border px-4 py-2"><?= 'Bus ' . $bus_id . ' - ' . $busInfo['route'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pickup Point:</td>
                            <td class="border px-4 py-2"><?= $registration['pickup_num'] . ' - ' . $pickupInfo['pickup_name'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Pickup Time:</td>
                            <td class="border px-4 py-2"><?= $pickupInfo['pickup_time'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Dropoff Point:</td>
                            <td class="border px-4 py-2"><?= $registration['dropoff_num'] . ' - ' . $dropoffInfo['dropoff_name'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Dropoff Time:</td>
                            <td class="border px-4 py-2"><?= $dropoffInfo['dropoff_time'] ?></td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Registration Status:</td>
                            <td class="border px-4 py-2"><?= $registration['status'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
            <div class="w-full flex justify-around mb-4">
                <a href="/application">
                    <button class="bg-blue-500 py-2 px-16 font-bold text-white">Add Learner</button>
                </a>
                <a href="/final">
                    <button class="bg-green-500 py-2 px-16 font-bold text-white">Finalise</button>
                </a>

            </div>

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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
