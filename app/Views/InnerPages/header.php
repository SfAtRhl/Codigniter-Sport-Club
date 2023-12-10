<header class="bg-white border-b border-gray-300">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.2.0/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Mobile phone -->
    <div id="toggle" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 text-center">
        <ul class="py-2 text-xs md:text-md text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButtontoggle">
            <?php
            if (session()->get('PseudoNom') != null) {
                // if (session()->get('PseudoNom') == "admin") {
                echo '<li>
                <a href="' . base_url('/list-reclame') . '" class="block px-4 py-2">List of Reclamation</a>
              </li>';
                // }
                if (session()->get('PseudoNom') == "admin") {
                    echo ' <li>
                        <a href="' . base_url('/event') . '" class="block px-4 py-2  ">List of Events</a>
                    </li>';
                }
                if (session()->get('PseudoNom') != "admin") {
                    echo '
                 <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('/reclame') . '" class="">Add Reclamation</a></li>
                <li class="menu-item py-2 px-4 text-gray-800">
                <a href="' . base_url('/profile') . '">Profil</a>
                </li>';
                    // . session()->get('PseudoNom')
                }
                echo '<li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>';
            } else {
                echo '
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>';
            } ?>


        </ul>
    </div>

    <div class=" mx-auto md:mx-4 p-4 flex items-center justify-between">

        <a href="<?= base_url('/') ?>">
            <img src="<?= "img/svg/logo.svg" ?>" class=" block md:h-20 h-12 lg:mr-4 md:mr-2" alt="" />
        </a>


        <button class="sm:hidden bg-transparent  text-orange-500 font-semibold  py-2 px-4 border border-orange-500 rounded" id="dropdownDefaultButtontoggle" data-dropdown-toggle="toggle">
            &#9776;
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="<?= base_url('/list-reclame') ?>" class="block px-4 py-2  ">List of Reclamation</a>
                </li>
                <?php if (session()->get('PseudoNom') != "admin") : ?>

                    <li>
                        <a href="<?= base_url('/reclame') ?>" class="block px-4 py-2 ">Add Reclamation</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/profile') ?>" class="block px-4 py-2 "> Profile</a>
                    </li>
                <?php endif; ?>


                <?php if (session()->get('PseudoNom') == "admin") : ?>
                    <li>
                        <a href="<?= base_url('/event') ?>" class="block px-4 py-2  ">List of Events</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="hidden md:flex flex-row  ">
            <?php
            if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
                if (session()->get('PseudoNom') != "admin") {
                    if (session()->get('Image') == null) {
                        echo '<img src="img/images/img-2.jpg" alt="Profile Image" class=" w-12 h-12 rounded-full object-cover " >';
                    } else {
                        echo ' <img src="' . base_url('uploads/' . session()->get('Image')) . '" alt="Profile Image" class=" w-12 h-12 rounded-full object-cover " >';
                    };
                };
                echo ' <button class="menu-item py-2 px-4 text-gray-800 mr-4 " id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">Hello ' . session()->get('PseudoNom') . '</button>';
            }

            if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
                echo '
        <ul class="hidden sm:flex space-x-4 text-sm md:text-base">
             
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 hover:text-white rounded-md py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>
        </ul>';
            } else {

                echo ' <ul class="hidden sm:flex space-x-4 text-sm md:text-base ">
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800 hover:text-white "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800  hover:text-white"><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>
        </ul></div>';
            } ?>
        </div>

</header>