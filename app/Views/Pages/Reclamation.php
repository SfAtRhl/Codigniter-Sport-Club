<div class="flex flex-col justify-center px-6 py-12 lg:px-8 overflow-auto h-[500px]">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Post a <span class="underline underline-offset-3 text-orange-500">Reclamation</span></h2>
    </div>

    <div class="mt-10 md:mx-auto md:w-full md:max-w-2xl">
        <form class="space-y-6" action="<?= !empty($data) ? base_url('/reclame/update/' . $data['NumReclamation']) : base_url('/reclame/create') ?>" method="post">
            <?= csrf_field() ?>
            <?php if (!empty($data) && $data['NumReclamation']) : ?>
                <input type="hidden" name="_method" value="PUT">
            <?php endif; ?>

            <div>
                <div class="mt-2">
                    <textarea id="CorpReclamation" name="CorpReclamation" rows="5" cols="50" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6"><?= !empty($data) ? $data['CorpReclamation'] : '' ?></textarea>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Post</button>
            </div>
        </form>

    </div>
</div>