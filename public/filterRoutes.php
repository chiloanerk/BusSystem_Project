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
$busRoute = new \app\models\BusRoutes($db);
$busModel = new \app\models\Bus($db);
$registration = new \app\models\BusRegistration($db);

if (isset($_GET['bus_num'])) : ?>
    <?php $bus_num = $_GET['bus_num'];
    $routes = $busRoute->getRoutesByBus($bus_num);
    $capacity = $busModel->getCapacity($bus_num);
    $seats = $registration->availableSeats($bus_num);
    ?>

        <label for="pickup_num">Pickup Point</label>
        <select name="pickup_num" id="pickup_num" class="border rounded px-4 mb-4 py-2 w-full" required>
            <option value="">Select a Pickup Point</option>
            <?php foreach ($routes as $pickup) : ?>
            <option value="<?= $pickup['pickup_num'] ?>"><?= $pickup['pickup_name'] . ' @ ' . $pickup['pickup_time'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="dropoff_num">Dropoff Point</label>
        <select name="dropoff_num" id="dropoff_num" class="border rounded px-4 mb-8 py-2 w-full" required>
            <option value="">Select a Dropoff Point</option>
            <?php foreach ($routes as $dropoff) : ?>
                <option value="<?= $dropoff['dropoff_num'] ?>"><?= $dropoff['dropoff_name'] . ' @ ' . $dropoff['dropoff_time'] ?></option>
            <?php endforeach; ?>
        </select>
    <div class=" flex justify-center">
        <table>
            <tr>
                <th>Available Seats</th>
            </tr>
            <tr>
                <td><?= $seats . ' / ' . $capacity['capacity']; ?></td>
            </tr>
        </table>
    </div>
<?php endif ?>







