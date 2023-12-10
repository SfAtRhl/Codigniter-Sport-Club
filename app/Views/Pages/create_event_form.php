<body>
    <div class="flex flex-col justify-center px-6 py-12 lg:px-8 overflow-auto h-[500px]">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
            <div class="mt-10 md:mx-auto md:w-full md:max-w-2xl">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Post <span class="underline underline-offset-3 text-orange-500">an Event</span></h2>

                <form action="  <?= base_url('/create_event_form') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>


                    <!-- <label for="event_name">Event Name:</label></br>
                    <input type="text" name="event_name" id="event_name" required><br> -->

                    <label for="event_name" class="block text-sm font-medium leading-6 text-gray-900">Event Name</label>
                    <div class="mt-2">
                        <input type="text" name="event_name" id="event_name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                    </div>

                    <!-- <label for="event_disc">Event Description:</label><br>
                    <textarea name="event_disc" id="event_disc" rows="4" cols="50" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"></textarea><br><br> -->

                    <label for="event_disc" class="block text-sm font-medium leading-6 text-gray-900">Event Description</label>
                    <div class="mt-2">
                        <textarea type="text" name="event_disc" id="event_disc" rows="4" cols="50" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"><?= !empty($data) ? $data['event_disc'] : '' ?></textarea>
                    </div>

                    <!-- <label for="event_date">Event Date:</label> -->
                    <label for="event_date" class="block text-sm font-medium leading-6 text-gray-900">Event Date</label>
                    <input type="date" name="event_date" id="event_date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>

                    <!-- <label for="image">Image:</label> -->
                    <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>

                    <!-- <input type="file" name="image" id="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required> -->
                    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file" required>

                    <input type="submit" class="mt-4 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600" value="Post!">
                </form>
            </div>
        </div>
    </div>
</body>