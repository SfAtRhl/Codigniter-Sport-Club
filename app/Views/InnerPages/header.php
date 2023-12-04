<header class="bg-white border-b border-gray-300">
    <!-- Mobile phone -->
    <div id="toggle" class="z-4 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 text-center">
        <ul class="py-2 text-xs md:text-md text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButtontoggle">
            <?php
            if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
                // if (session()->get('PseudoNom') == "admin") {
                echo '<li>
                <a href="' . base_url('/list-reclame') . '" class="block px-4 py-2">List of Reclamation</a>
              </li>';
                // }
                if (session()->get('PseudoNom') != "admin") {
                    echo '
                 <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('/reclame') . '" class="">Add Reclamation</a></li>';
                }
                echo '<li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>';
            } else {
                echo '
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>';
            } ?>


        </ul>
    </div>

    <script src="
https://cdn.jsdelivr.net/npm/flowbite@2.2.0/dist/flowbite.min.js
"></script>

    <div class=" mx-auto md:mx-4 p-4 flex items-center justify-between">
        <a href="<?= base_url('/') ?>">
            <img src="<?= "img/svg/logo.svg" ?>" class=" block md:h-20 h-12  h-6 lg:mr-4 md:mr-2" alt="" />
        </a>


        <button class="sm:hidden bg-transparent  text-orange-500 font-semibold  py-2 px-4 border border-orange-500 rounded" id="dropdownDefaultButtontoggle" data-dropdown-toggle="toggle">
            &#9776;
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <?php if (session()->get('PseudoNom') != "admin") : ?>

                    <li>
                        <a href="<?= base_url('/reclame') ?>" class="block px-4 py-2 ">Add Reclamation</a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?= base_url('/list-reclame') ?>" class="block px-4 py-2  ">List of Reclamation</a>
                </li>
            </ul>
        </div>
        <?php
        if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
            echo ' <ul  class="hidden sm:flex space-x-4 text-sm md:text-base">
           <button class="menu-item py-2 px-4 text-gray-800  " id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">Hello ' . session()->get('PseudoNom') . '</button>
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 hover:text-white rounded-md py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>
        </ul>';
        } else {

            echo ' <ul  class="hidden sm:flex space-x-4 text-sm md:text-base ">
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800 hover:text-white "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800  hover:text-white"><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>
        </ul>';
        } ?>
    </div>

</header>