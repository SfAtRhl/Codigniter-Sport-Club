<main>
    <div class="h-96 relative text-white ">
        <img src="img/images/1.jpg" alt="" class="object-cover h-full w-full ">
        <div class="p-6 md:p-10 text-center z-10 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-40 rounded-lg w-3/4">
            <h1 class="text-lg md:text-5xl font-bold mb-2 md:mb-4">Welcome to Sport Club</h1>
            <p class="text-sm md:text-xl">Experience the thrill of <span class="font-bold text-orange-500 underline underline-offset-2"> Sport Club</span> like never before. Join us on the journey of <span class="font-bold "> "teamwork, dedication, and victory!"</span></p>
        </div>
    </div>
    <!-- CONTENT -->
    <h2 class="text-2xl font-bold text-black underline underline-offset-1 ml-4 md:ml-14 mt-4 " id="Event">Upcoming Events</h2>

    <section class="md:container mx-auto md:mt-2  px-16 pb-4">

        <!-- Upcoming Events -->
        <div class=" flex md:flex-row flex-col">
            <?php if (!empty($events)) : ?>
                <div class="flex flex-wrap justify-center space-x-2">
                    <?php foreach ($events as $event) : ?>
                        <div class="m-1 mb-2 flex flex-col items-center justify-center pt-4">
                            <img class="md:w-52 md:h-72 w-44 h-60 object-cover rounded-md" src="<?= base_url('uploads/' . $event['image']); ?>" alt="">
                            <h3 class="text-sm font-semibold mt-1"> <?= $event['event_name']; ?></h3>
                            <p class="text-xs">Date: <span class="font-semibold"> <?= $event['event_date']; ?></span></p>
                            <p class=" w-52 text-xs text-center">Event Description</br><span class="font-semibold"> <?= $event['event_disc']; ?></span></p>
                        </div>
                    <?php endforeach; ?>



                </div>
            <?php else : ?>
                <div class="flex  justify-center text-center w-full">
                    <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">No <span class="underline underline-offset-3 text-orange-500">Events</span> Yet :(</h2>
                </div>

            <?php endif; ?>
        </div>
    </section>
    <?php
    echo view('Components/gallery.php');
    ?>
    <?php
    echo view('Components/about.php');

    ?>
</main>