<div class="flex flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form id="login_form" class="space-y-6" action="<?= base_url('/login') ?>" method="POST">
            <?= csrf_field() ?>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="PseudoNom" name="PseudoNom" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="text-sm">
                        <a href="#" class="font-semibold text-orange-300 hover:text-orange-500">Forgot password?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <input id="Password" name="Password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Sign in</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500 font-medium">
            Not a member?
            <a href="<?= base_url('/sign-up') ?>" class="font-semibold underline underline-offset-1 leading-6 hover:text-orange-500"> Sign Up</a>
        </p>
    </div>
</div>

<script>
    const login_form = document.getElementById('login_form');

    login_form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const username = document.getElementById('PseudoNom').value;
        const password = document.getElementById('Password').value;

        try {
            const response = await fetch(login_form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    PseudoNom: username,
                    Password: password, 
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                }),
            });

            if (response.status == 200) {
                // Success case
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                }).then(() => {
                    login_form.submit();
                });
            } else {
                // Error case
                const errorData = await response.json();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid credentials. Please try again.',
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                });
            }
        } catch (error) {
            console.error('Error during login:', error);
        }
    });
</script>