<?php
include base_path('/app/views/partials/head.php');
?>
<?php include base_path('/app/views/partials/nav.php'); ?>
<?php include base_path('/app/views/partials/header.php'); ?>

<main class="p-4 min-h-full pb-16">
    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl mb-4 font-bold text-gray-900">Registration Completed</h1>
            <p class="mt-2 text-sm text-gray-600">Thank you for registering for the school bus service. Your registration has been successfully processed.</p>
            <p class="mt-2 text-sm text-gray-600">You will receive an email confirmation on <span class="font-bold"><?= $parent_email ?></span> shortly.</p>

            <div class="mt-6">
                <a href="/logout" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg">Logout</a>
            </div>
        </div>
    </div>
</main>

<?php include base_path('/app/views/partials/footer.php'); ?>
