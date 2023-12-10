<body>
    <div class="flex flex-col justify-center px-6 py-12 lg:px-8 h-[500px] text-xs md:text-sm lg:text-lg mt-14">
        <h2 class="text-center  md:text-2xl text-lg  font-bold leading-9 tracking-tight text-gray-900">List of <span class="underline underline-offset-3 text-orange-500 ">Events</span></h2>
        <div class="flex flex-row justify-end">
            <?php if (session()->get('PseudoNom') == "admin") : ?>
                <button class="mt-2 flex md:w-32 justify-center rounded-md bg-orange-300 md:px-3 px-2 md:py-1.5 py-1 text-xs  font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">
                    <a href="<?php echo base_url('/create_event_form'); ?>">
                        Add events
                    </a>
                </button>

            <?php endif; ?>
        </div>


        <div class="mt-8 text-[10px]  md:text-base lg:text-lg ">
            <div class="bg-white border-2 border-orange-500 h-16 w-full rounded-md flex items-center justify-between px-4 gap-1">

                <!-- <div class="md:w-10 w-6 text-center ">ID</div> -->

                <div class="md:w-32 w-24  text-center">Event Name</div>

                <div class="grow w-44   text-center">Event Discription</div>

                <div class="  w-36 text-center">Event Poster</div>

                <div class="w-36   text-center">Event Date</div>

                <div class="md:w-44 text-center rounded-md bg-red-300 md:px-3 px-1 md:py-1 md:text-sm  font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">Actions</div>




            </div>
            <div class="h-96 overflow-auto py-2 rounded-md no-scrollbar space-y-2">


                <?php foreach ($events as $event) : ?>

                    <div class="bg-white border-2 border-orange-500 h-32 w-full rounded-md flex items-center justify-between px-4 gap-1">
                        <!-- <div class="md:w-10 w-6 text-center"><?= $event['id']; ?></div> -->
                        <div class="md:w-32 w-24   text-center"><?= $event['event_name']; ?></div>
                        <div class="grow   text-center"><?= $event['event_disc']; ?></div>
                        <div class="  w-36 text-center flex justify-center">
                            <img src="<?= base_url('uploads/' . $event['image']); ?>" alt="Image" class="w-24 h-28 object-cover">
                        </div>
                        <div class="w-36   text-center"><?= $event['event_date']; ?></div>
                        <div class="md:w-44 w-18 flex md:flex-row flex-col  md:space-x-2  ">


                            <button href="<?= base_url('editEvent/' . $event['id']); ?>" class="flex w-full justify-center rounded-md bg-blue-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">
                                <a href="<?= base_url('editEvent/' . $event['id']); ?>">

                                    Edit</a>
                            </button>
                            <button class="flex w-full justify-center rounded-md bg-red-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">
                                <a href="<?= base_url('deleteEvent/' . $event['id']); ?>"> Delete</a>
                            </button>

                        </div>
                        <!-- <div class="md:w-44 flex flex-row md:space-x-2  ">
                            <button class=" w-1/2 text-white bg-red-300 hover:bg-red-500 px-4 py-2 rounded-md"> <a href="<?= base_url('/EventController/deleteEvent/' . $event['id']); ?>"> Edit</a></button>
                            <button class=" w-1/2 text-white bg-red-300 hover:bg-red-500 px-4 py-2 rounded-md"> <a href="<?= base_url('/EventController/deleteEvent/' . $event['id']); ?>"> Delete</a></button>
                        </div> -->
                    </div>
                <?php endforeach; ?>

            </div>



        </div>
    </div>

</body>