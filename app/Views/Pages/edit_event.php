<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sport Club</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../favicon.ico">

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/output.css">
</head>
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
                 <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('/reclame') . '" class="">Add Reclamation</a></li>
                <li class="menu-item py-2 px-4 text-gray-800">
                <a href="' . base_url('/profile') . ' class="">Profil</a>
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

    <script src="
https://cdn.jsdelivr.net/npm/flowbite@2.2.0/dist/flowbite.min.js
"></script>

    <div class=" mx-auto md:mx-4 p-4 flex items-center justify-between">

        <a href="<?= base_url('/') ?>">
            <img src="<?= "../img/svg/logo.svg" ?>" class=" block md:h-20 h-12 lg:mr-4 md:mr-2" alt="" />
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
                <?php if (session()->get('PseudoNom') == "admin") : ?>
                    <li>
                        <a href="<?= base_url('/event') ?>" class="block px-4 py-2  ">List of Events</a>
                    </li>
                <?php endif; ?>
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

<body class="font-sans bg-gray-100 no-scrollbar">


    <body>
        <div class="flex flex-col justify-center px-6 py-12 lg:px-8 overflow-auto h-[500px]">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
                <div class="mt-10 md:mx-auto md:w-full md:max-w-2xl">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit <span class="underline underline-offset-3 text-orange-500">an Event</span></h2>

                    <form action="  <?= base_url('updateEvent/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <?php if (!empty($data) && $data['id']) : ?>
                            <input type="hidden" name="_method" value="PUT">
                        <?php endif; ?>

                        <label for="event_name" class="block text-sm font-medium leading-6 text-gray-900">Event Name</label>
                        <div class="mt-2">
                            <input type="text" name="event_name" id="event_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" value="<?= $data['event_name']  ?>">
                        </div>


                        <label for=" event_disc" class="block text-sm font-medium leading-6 text-gray-900">Event Description</label>
                        <div class="mt-2">
                            <textarea type="text" name="event_disc" id="event_disc" rows="4" cols="50" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"><?= $data['event_disc'] ?></textarea>
                        </div>

                        <label for="event_date" class="block text-sm font-medium leading-6 text-gray-900">Event Date</label>
                        <input type="date" name="event_date" id="event_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required value="<?= $data['event_date']  ?>">

                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>

                        <!-- <input type="file" name="image" id="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required> -->

                        <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file" required>



                        <input type="submit" class="mt-4 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600" value="Edit Event !">
                    </form>
                </div>
            </div>
        </div>
    </body>