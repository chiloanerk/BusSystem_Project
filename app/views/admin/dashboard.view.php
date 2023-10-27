<?php include base_path('/app/views/partials/head.php'); ?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full pb-16">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 text-center bg-white shadow">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-4">MIS Dashboard</h1>

        <div class="grid grid-cols-2 gap-4">
            <!-- Daily MIS Reports -->
            <div class="border p-4 rounded-lg shadow">
                <h2 class="text-xl font-semibold">Daily MIS Reports</h2>
                <div class="mt-4">
                    <!-- Report 1: Learners on Waiting List -->
                    <h3 class="text-lg font-medium">Learners on Waiting List</h3>
                    <div class="mt-4 flex flex-wrap gap-4">
                        <!-- Bus Number Select Input -->
                        <div class="flex-1">
                            <label for="bus-number" class="block text-sm font-medium text-gray-700">Bus Number:</label>
                            <select id="bus-number" class="w-full border border-gray-300 rounded-md px-4 py-2">
                                <option value="">All Buses</option>
                                <option value="Bus A">Bus A</option>
                                <option value="Bus B">Bus B</option>
                                <!-- Add options for other buses as needed -->
                            </select>
                        </div>

                        <!-- Parent Surname Search Input -->
                        <div class="flex-1">
                            <label for="parent-surname" class="block text-sm font-medium text-gray-700">Parent Surname:</label>
                            <input type="text" id="parent-surname" class="w-full border border-gray-300 rounded-md px-4 py-1.5" placeholder="Search by parent surname">
                        </div>
                    </div>

                    <table class="w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Learner Name</th>
                            <th class="border border-gray-300 px-4 py-2">Parent Name</th>
                            <th class="border border-gray-300 px-4 py-2">Bus ID</th>
                            <th class="border border-gray-300 px-4 py-2">Pickup Number</th>
                            <th class="border border-gray-300 px-4 py-2">Dropoff Number</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th> <!-- Add Actions column -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">John Doe</td>
                            <td class="border border-gray-300 px-4 py-2">Jane Doe</td>
                            <td class="border border-gray-300 px-4 py-2">Bus A</td>
                            <td class="border border-gray-300 px-4 py-2">1</td>
                            <td class="border border-gray-300 px-4 py-2">3</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button class="text-blue-600 hover:underline">Approve</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Alice Smith</td>
                            <td class="border border-gray-300 px-4 py-2">Bob Smith</td>
                            <td class="border border-gray-300 px-4 py-2">Bus B</td>
                            <td class="border border-gray-300 px-4 py-2">2</td>
                            <td class="border border-gray-300 px-4 py-2">4</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button class="text-blue-600 hover:underline">Approve</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="mt-4">
                    <!-- Report 2: Learners Using Bus Transport for Today -->
                    <h3 class="text-lg font-medium">Learners Using Bus Transport Today</h3>
                    <table class="w-full border-collapse border border-gray-300 mt-2">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Learner Name</th>
                            <th class="border border-gray-300 px-4 py-2">Bus ID</th>
                            <th class "border border-gray-300 px-4 py-2">Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Eva Johnson</td>
                            <td class="border border-gray-300 px-4 py-2">Bus A</td>
                            <td class="border border-gray-300 px-4 py-2">Morning</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Mike Brown</td>
                            <td class="border border-gray-300 px-4 py-2">Bus B</td>
                            <td class="border border-gray-300 px-4 py-2">Afternoon</td>
                        </tr>
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
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Bus A</td>
                            <td class="border border-gray-300 px-4 py-2">12</td>
                            <td class="border border-gray-300 px-4 py-2">15</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Bus B</td>
                            <td class="border border-gray-300 px-4 py-2">14</td>
                            <td class="border border-gray-300 px-4 py-2">13</td>
                        </tr>
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
                            <th class="border border-gray-300 px-4 py-2">Current Occupancy</th>
                            <th class="border border-gray-300 px-4 py-2">Capacity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Bus A</td>
                            <td class="border border-gray-300 px-4 py-2">28</td>
                            <td class="border border-gray-300 px-4 py-2">30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Bus B</td>
                            <td class="border border-gray-300 px-4 py-2">18</td>
                            <td class="border border-gray-300 px-4 py-2">25</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
