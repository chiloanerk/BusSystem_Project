<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-center ">
            <?php if (!isset($_SESSION['role'])) : ?>
                <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 mx-4 text-sm font-medium"
                   aria-current="page">Home</a>
            <?php endif; ?>

            <a href="/application"
               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 mx-4 text-sm font-medium">Applications</a>
            <?php if (isset($_SESSION['role'])) : ?>
                <a href="/logout"
                   class="text-gray-300 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 mx-4 text-sm font-medium">Logout</a>
            <?php else : ?>
                <a href="/login"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 mx-4 text-sm font-medium">Login</a>
            <?php endif; ?>
            </a>
        </div>
    </div>
</nav>


