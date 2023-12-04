<div class="flex flex-col justify-center px-6 py-12 lg:px-8 h-[500px] text-xs md:text-sm lg:text-lg mt-14">
    <h2 class="text-center  md:text-2xl text-lg  font-bold leading-9 tracking-tight text-gray-900">List of <span class="underline underline-offset-3 text-orange-500 ">Reclamation</span></h2>

    <div class="mt-8 text-[10px]  md:text-base lg:text-lg ">
        <div class="bg-white border-2 border-orange-500 h-16 w-full rounded-md flex items-center justify-between px-4 gap-1">
            <div class="md:w-24 w-12 text-center ">Date</div>
            <div class="grow  text-center">Reclamation</div>
            <div class="md:w-36 w-16  text-center">Utilisateur</div>


            <?php if (session()->get('PseudoNom') == "admin") : ?>
                <div class="md:w-44 text-center rounded-md bg-red-300 md:px-3 px-1 md:py-1.5 md:text-sm  font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 ">Actions</div>
            <?php endif; ?>

        </div>
        <div class="h-96 overflow-auto py-2 rounded-md no-scrollbar space-y-2 ">

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
                            <button type="" class="flex w-full justify-center rounded-md bg-red-300 md:px-3 md:py-1.5 px-1 md:text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600 mt-[2px] md:mt-0 "><a href="<?php echo base_url("/send/decline/" . $reclam['NumReclamation']); ?>">Decline</a></button>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</div>