<form class=" sm:mx-auto font-sans bg-gray-100 sm:px-8 lg:px-32 md:py-8 px-3 py-2" action="<?= base_url('/create') ?>" method="POST" id="create_form">
    <?= csrf_field() ?>

    <div class=" border-b border-gray-900/10 pb-12 ">
        <h2 class=" text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input type="text" name="PseudoNom" id="PseudoNom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                    <input type="text" name="Nom" id="Nom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                    <input type="text" name="Prenom" id="Prenom" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>
            <div class="sm:col-span-3 ">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                <div class="mt-2">
                    <select id="Sexe" name="Sexe" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3 sm:col-start-1">
                <label for="email-address" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="email" name="Email" id="Email" autocomplete="email-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                <div class="mt-2">
                    <input type="text" name="Adresse" id="Adresse" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>

            <div class="sm:col-span-3 sm:col-start-1">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Profession</label>
                <div class="mt-2">
                    <input type="text" name="Profession" id="Profession" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>

            <div class="sm:col-span-3   ">
                <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Date Naissance</label>
                <div class="mt-2">
                    <input type="date" name="DateNaissance" id="DateNaissance" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>


            <div class="sm:col-span-3 ">
                <label for="password-code" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input type="text" name="Password" id="Password" autocomplete="password-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>

            </div>
            <div class="sm:col-span-3 ">
                <label for="cpassword-code" class="block text-sm font-medium leading-6 text-gray-900">Confime Password</label>
                <div class="mt-2">
                    <input type="text" name="CPassword" id="CPassword" autocomplete="cpassword-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required>
                </div>
            </div>

        </div>



    </div>
    <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Submit</button>
</form>

<script>
    const create_form = document.getElementById('create_form');

    create_form.addEventListener('submit', (e) => {
        e.preventDefault();

        const password = document.getElementById('Password').value;
        const passwordConfirmation = document.getElementById('CPassword').value;


        if (password === null || password === '' || password !== passwordConfirmation) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something Went Wrong !!!',
                footer: '<a href="#" class="font-bold underline underline-offset-1">Why do I have this issue?</a>',
                confirmButtonColor: "#DD6B55",
                denyButtonColor: "#DD6FF5",
                cancelButtonColor: "#DD6BFF",
                showClass: {
                    popup: `
                animate__animated
                animate__fadeInUp
                animate__faster
                `
                },
                hideClass: {
                    popup: `
                animate__animated
                animate__fadeOutDown
                animate__faster
    `
                }
            });
        } else {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Created with Success.',
                showConfirmButton: false,
                timer: 500,
            }).then(() => {
                create_form.submit();
            });
        }
    });
</script>