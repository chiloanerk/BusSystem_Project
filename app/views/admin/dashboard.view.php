<?php use app\controllers\admin\AdminController;
use app\models\Bus;
use app\models\BusRegistration;
use app\models\BusRoutes;
use app\models\Database;
use app\models\Learner;
use app\models\Parents;

include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>
<?php
$db = new Database();
$parent = new Parents($db);
$learner = new Learner($db);
$bus = new Bus($db);
$route = new BusRoutes($db);
$admin = new AdminController();
$registrations = new BusRegistration($db);
?>

<main class="p-4 min-h-full pb-16">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-center bg-white shadow">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">MIS REPORTS</h1>

        <div
        ">
        <!-- Daily MIS Reports -->
        <div class="border p-4 rounded-lg shadow mb-4">
            <h2 class="text-xl font-semibold">Daily MIS Reports</h2>
            <div class="mt-4 border-b border-dashed pb-4">
                <!-- Report 1: Learners on Waiting List -->
                <h3 class="text-lg font-medium">Learners on Waiting List</h3>

                <div class="mt-4 w-1/2 mx-auto">
                    <!-- Bus Number Select Input -->
                    <div class="flex-1">
                        <label for="bus-number" class="block text-sm font-medium text-gray-700">Bus Number:</label>
                        <select id="bus-number" class="w-full border border-gray-300 rounded-md px-4 py-2" required
                                onchange="showByBus(this.value)">
                            <option value="all">All Buses</option>
                            <option value="1">Bus 1</option>
                            <option value="2">Bus 2</option>
                            <option value="3">Bus 3</option>
                        </select>
                    </div>
                </div>
                <table class="w-full border-collapse border border-gray-300 mt-2">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">Learner Name</th>
                        <th class="border border-gray-300 px-4 py-2">Cellphone</th>
                        <th class="border border-gray-300 px-4 py-2">Grade</th>
                        <th class="border border-gray-300 px-4 py-2">Pickup Number</th>
                        <th class="border border-gray-300 px-4 py-2">Dropoff Number</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th> <!-- Add Actions column -->
                    </tr>
                    </thead>
                    <tbody id="waiting_list">
                    <?php foreach ($waitingList as $list) : ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['name'] . ' ' . $learner->getLearner($list['learner_id'])['surname'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['cellphone'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['grade'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $list['pickup_num'] . ' - ' . $route->getPickup($list['pickup_num'])['pickup_name'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $list['dropoff_num'] . ' - ' . $route->getDropoff($list['dropoff_num'])['dropoff_name'] ?></td>
                            <form action="/approve " method="get">
                            <input type="hidden" name="learner_id" value="<?= $list['learner_id'] ?>">
                            <td class="border border-gray-300 px-4 py-2">
                                <button type="submit" class="text-blue-600 hover:underline">Approve</button>
                            </td>
                            </form>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="mt-4">
                <!-- Report 2: Learners Using Bus Transport for Today -->
                <h3 class="text-lg font-medium">Learners Using Bus Transport Today</h3>
                <table class="w-full border-collapse border border-gray-300 mt-2">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">Learner Name</th>
                        <th class="border border-gray-300 px-4 py-2">Cellphone</th>
                        <th class="border border-gray-300 px-4 py-2">Grade</th>
                        <th class="border border-gray-300 px-4 py-2">Times</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($approvedList as $list) : ?>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['name'] . ' ' . $learner->getLearner($list['learner_id'])['surname'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['cellphone'] ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?= $learner->getLearner($list['learner_id'])['grade'] ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <?php
                                if (!empty($list['pickup_num']) && !empty($list['dropoff_num'])) {
                                    echo "Morning and Afternoon";
                                } elseif (!empty($list['pickup_num'])) {
                                    echo "Morning";
                                } elseif (!empty($list['dropoff_num'])) {
                                    echo "Afternoon";
                                }
                                ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Weekly MIS Reports -->
        <div class="border p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold">Weekly MIS Reports</h2>
            <div class="mt-4">
                <!-- Report 3: Total Learners Using Bus Transport This Week -->
                <h3 class="text-lg font-medium">Total Learners Using Bus Transport This Week</h3>
                <table class="w-full border-collapse border border-gray-300 mt-2">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">Bus ID</th>
                        <th class="border border-gray-300 px-4 py-2">Morning</th>
                        <th class="border border-gray-300 px-4 py-2">Afternoon</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $buses = $bus->getBuses() ?>
                    <?php foreach ($buses as $list) : ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?= 'Bus ' . $list['id'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $registrations->getWeeklyMorningCount($list['id'])['morning_trip_count'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $registrations->getWeeklyAfternoonCount($list['id'])['afternoon_trip_count'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Additional Reports -->
        <div class="border p-4 rounded-lg mt-4 shadow">
            <h2 class="text-xl font-semibold">Additional Reports</h2>
            <div class="mt-4">
                <!-- Report 4: Bus Occupancy Report -->
                <h3 class="text-lg font-medium">Bus Occupancy Report</h3>
                <table class="w-full border-collapse border border-gray-300 mt-2">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">Bus ID</th>
                        <th class="border border-gray-300 px-4 py-2">Seats Taken</th>
                        <th class="border border-gray-300 px-4 py-2">Seats Left</th>
                        <th class="border border-gray-300 px-4 py-2">Capacity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($buses as $list) : ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Bus <?= $list['id'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $registrations->getRegistrationsPerBus($list['id']) ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $registrations->availableSeats($list['id']) ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $list['capacity'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
<script src="scripts/filterByBus.js"></script>

<?php include base_path('/app/views/partials/footer.php'); ?>
