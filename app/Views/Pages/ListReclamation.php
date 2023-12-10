<div class="flex flex-col justify-center px-6 py-12 lg:px-8 h-[500px] text-xs md:text-sm lg:text-lg mt-4">
    <h2 class="text-center  md:text-2xl text-lg  font-bold leading-9 tracking-tight text-gray-900">List of <span class="underline underline-offset-3 text-orange-500 relative">Reclamation</span></h2>
    <?php if (session()->get('PseudoNom') == "admin") : ?>
        <div class="flex  justify-end">
            <button type="submit" class="flex  justify-center rounded-md px-2 py-1 bg-green-500 md:px-3 md:py-1.5 text-xs  md:text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 mt-1" id="dropdownDefaultButton1" data-dropdown-toggle="dropdown1">
                Export Reclamation
            </button>
        </div>
    <?php endif; ?>
    <div id="dropdown1" class="z-4 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 text-center">
        <ul class="py-2 text-xs md:text-md text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton1">
            <?php
            if (session()->get('PseudoNom') != null) {
                if (session()->get('PseudoNom') == "admin") {
                    echo '
                 <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('/export') . '" class="">Export as xlxs</a></li>
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('/exportpdf') . '" class="">Export as PDF</a></li>';
                }
            } ?>


        </ul>
    </div>


    <div class="mt-8 text-[10px]  md:text-base lg:text-lg ">
        <div class="bg-white border-2 border-orange-500 h-16 w-full rounded-md flex items-center justify-between px-4 gap-1">
            <div class="md:w-24 w-12 text-center ">Date</div>
            <div class="grow  text-center">Reclamation</div>
            <div class="md:w-36 w-16  text-center">Utilisateur</div>


            <?php if (session()->get('PseudoNom') == "admin") : ?>
                <div class="md:w-44 text-center rounded-md bg-red-300 md:px-3 px-1 md:py-1.5 md:text-sm  font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">Actions</div>
            <?php endif; ?>

        </div>
        <div class="h-72 overflow-auto py-2 rounded-md no-scrollbar space-y-2 ">

            <?php foreach ($data as $reclam) : ?>
                <div class="bg-white border-2 border-orange-500 h-auto w-full rounded-md flex items-center justify-between px-4 gap-1 py-4">
                    <div class="md:w-24 w-12  text-center"><?= $reclam['DateReclamation'] ?></div>
                    <div class="w-48 sm:w-4/6 text-center "><?= $reclam['CorpReclamation'] ?></div>
                    <div class="md:w-36 w-16 text-center"><?= $reclam['PseudoNom'] ?></div>
                    <?php if (session()->get('PseudoNom') == "admin") : ?>
                        <div class="md:w-44 w-18 flex md:flex-row flex-col  md:space-x-2  ">
                            <button type="submit" class="flex w-full justify-center rounded-md bg-blue-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">
                                <a href="<?php echo base_url("/send/accept/" . $reclam['NumReclamation']); ?>">
                                    Accept
                                </a>
                            </button>
                            <button type="" onclick="changefirst1();" class="flex w-full justify-center rounded-md bg-red-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 mt-[2px] md:mt-0 "><a href="
                            ">Decline</a></button>
                        </div>
                        <!-- <?php echo base_url("/send/decline/" . $reclam['NumReclamation']); ?> -->

                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

        </div>

    </div>

</div>

<form class=" font-sans bg-gray-100  md:py-2 px-3 py-2 mx-4" onsubmit="return validateForm()" action="<?= base_url('/send/decline') ?>" method="POST">
    <?= csrf_field() ?>
    <input type="hidden" name="NumReclamation" value="<?= $reclam['NumReclamation'] ?>">
    <div class="w-full" style="display:none" id="open1">
        <!-- <div class="grow  text-center">Explications</div> -->
        <h6 class="text-center  md:text-lg text-base  font-semibold  text-gray-900 underline  underline-offset-3 ">Explications</h6>
        <textarea rows="4" id="Explications" name="Explications" type="text" required class="pt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" placeholder="Your message..."></textarea>
        <!-- <button onclick="changefirst()"   >Send</button> -->
        <button type="submit" onclick="changefirst()" class="flex w-20 justify-center rounded-md px-4 py-2 bg-orange-300 md:px-3 md:py-1.5  md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 mt-2 ">
            Send
        </button>
    </div>
</form>



</div>


</div>
</div>


<!-- script -->
<script>
    var isButtonVisible = true;

    function changefirst1() {
        event.preventDefault();
        var c = document.getElementById("open1");
        // c.style.display = "block";
        // var button = document.getElementById("myButton");

        if (isButtonVisible) {
            c.style.display = "none";
        } else {
            c.style.display = "block";
        }

        // Toggle the state
        isButtonVisible = !isButtonVisible;
    }

    function changefirst() {
        var c = document.getElementById("open1");
        c.style.display = "none";
    }
</script>