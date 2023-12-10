<div class=" sm:mx-auto font-sans bg-gray-100 sm:px-8 lg:px-32 md:py-8 px-3 py-2">

    <div class="border-b border-gray-900/10 pb-12 ">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
            molestiae quas vel sint commodi</p>
        <div class="flesx flex-row ">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <form action="<?= base_url('/profile/upload_image') ?>" method="POST" enctype="multipart/form-data">

                        <div class="flex items-center my-6 text-center justify-center">
                            <label for="profile_image" class="relative cursor-pointer">
                                <input type="file" id="profile_image" name="profile_image" style="display: none;" accept="image/*">
                                <?php
                                if ($data['Image'] == null) {
                                    echo ' <img src="img/images/img-2.jpg" alt="Profile Image" class="w-60 h-60 rounded-full object-cover mr-4" id="preview-image">';
                                } else {
                                    echo ' <img src="' . base_url('uploads/' . $data['Image']) . '" alt="Profile Image" class="w-60 h-60 rounded-full object-cover mr-4" id="preview-image">';
                                } ?>
                                <div class="absolute top-0 left-0 right-0 bottom-0 bg-gray-800 opacity-0 hover:opacity-75 transition-opacity duration-300"></div>
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
                                    <p class="text-sm">Click to change profile picture</p>
                                </div>
                            </label>
                        </div>

                        <div>
                            <div class="flex flex-col text-center ">
                                <h2 class="text-xl font-semibold">
                                    <?= $data['Nom'] . " " . $data['Prenom']  ?>

                                </h2>
                                <p class="text-gray-600"> <?= $data['Email']   ?></p>
                            </div>

                            <div class="flex flex-row space-x-2">

                                <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-blue-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">
                                    Update Image</button>




                            </div>

                        </div>
                    </form>
                    <button class="mt-2 grow flex w-full justify-center rounded-md bg-red-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600" onclick="confirmDelete()">
                        Delete Account
                    </button>

                </div>
                <div class="sm:col-span-3">
                    <p class="mt-1 text-sm leading-6 text-gray-600 mb-2">"Enhance user information by updating the first and last names." </p>
                    <form action="<?= base_url('/profile/edit_info') ?>" method="POST">
                        <?= csrf_field() ?>

                        <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                        <div class="mt-2">
                            <input type="text" name="Prenom" id="Prenom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" value=" <?= $data['Prenom']   ?>">
                        </div>
                        <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                        <div class="mt-2">
                            <input type="text" name="Nom" id="Nom" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" value="<?= $data['Nom']   ?>">
                        </div>
                        <label for="Email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="text" name="Email" id="Email" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" value="<?= $data['Email']   ?>">
                        </div>
                        <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-orange-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Update User Info</button>
                    </form>

                    <p class="mt-6 text-sm leading-6 text-gray-600 mb-2">
                        "Enhance the security of your account by updating your password. Confirm the new password to ensure the accuracy of the changes."</p>

                    <form action="<?= base_url('/profile/edit_password') ?>" onsubmit="return validateForm()" method="POST">
                        <?= csrf_field() ?>
                        <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input type="text" name="Password" id="Password" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                        </div>
                        <label for="Nom" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                        <div class="mt-2">
                            <input type="text" name="CPassword" id="CPassword" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                        </div>
                        <button type="submit" class="mt-2 flex w-full justify-center rounded-md bg-blue-300 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-600">Update Password</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        var password = document.getElementById("Password").value;
        var confirmPassword = document.getElementById("CPassword").value;


        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        } else if (password == "" && confirmPassword == "") {
            alert("Fill in the blanck!");
            return false;
        }

        return true;
    }



    function confirmDelete() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to the delete action URL
                window.location.href = "<?= base_url('/profile/destroy') ?>";
            }
        });
    }
    document.getElementById('profile_image').addEventListener('change', function(e) {
        var previewImage = document.getElementById('preview-image');
        var fileInput = e.target;

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>