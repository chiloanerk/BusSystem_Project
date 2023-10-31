<?php

require_once '../app/helpers/functions.php';

spl_autoload_register(function ($className) {
    // Define the base directory for your classes
    $baseDir = __DIR__ . '/../';

    // Convert namespace separators to directory separators
    $className = str_replace('\\', '/', $className);

    // Build the full path to the class file
    $file = $baseDir . $className . '.php';

    // Include the class file if it exists
    if (file_exists($file)) {
        require_once $file;
    }
});

$db = new \app\models\Database();
$parent = new \app\models\Parents($db);
$learner = new \app\models\Learner($db);
$bus = new \app\models\Bus($db);
$route = new \app\models\BusRoutes($db);
$admin = new \app\controllers\admin\AdminController();
$registration = new \app\models\BusRegistration($db);
$waitingList = $admin->waitingList();



if (isset($_GET['bus_num'])) : ?>
    <?php $bus_num = $_GET['bus_num'];
    $filteredLearners = $registration->getWaitingListByBus($bus_num); ?>

<div>
    <?php
    foreach ($filteredLearners as $list) : ?>
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
    <?php endforeach; ?>
</div>

<?php else: ?>

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
    <?php endforeach; ?>
<?php endif; ?>