@extends('backend.layouts.master')
@section('title','Setting')
@section('content')
    <main class="workspace">
        <form action="{{route('admin_settings_store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- Breadcrumb -->
            <section class="breadcrumb">
                <h1>Setting</h1>
                <ul>
                    <li><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                    <li class="divider la la-arrow-right"></li>
                    <li><a href="{{route('admin_settings')}}">Setting</a></li>
                </ul>
            </section>
            <!-- Tabs -->
            <div class="lg:flex lg:-mx-4 mt-5">
                <div class=" lg:px-4">
                    <div class="card p-5">
                        <h3>App Setting </h3>
                        <input type="hidden" name="active_tab" id="active_tab" value="basic_setting"> <!-- Default tab -->
                        <div class="tabs">
                            <nav class="tab-nav mt-5">
                                <p class="nav-link h5  active" data-toggle="tab" data-target="#basic_setting" onclick="setActiveTab('basic_setting')" style="cursor: pointer">Basic Setting</p>
                                <p class="nav-link h5 " data-toggle="tab" data-target="#forgot_password" onclick="setActiveTab('forgot_password')" style="cursor: pointer">Forgot Password Otp Setting</p>
                                <p class="nav-link h5 " data-toggle="tab" data-target="#forgot_password_link" onclick="setActiveTab('forgot_password_link')" style="cursor: pointer">Forgot Password Link Setting</p>
                            </nav>
                            <div class="tab-content mt-5">
                                <div id="basic_setting" class="collapse open" style="visibility: visible;">
                                    <!-- Categories -->
                                    <div class="lg:flex lg:-mx-4 mb-5 mt-5 ml-5">
                                        <div class="lg:w-1/4 lg:px-4">
                                        <div class="card p-5">
                                            <h3>Logo</h3>
                                            <div class="mt-5 leading-normal">
                                                <span class=" w-32 h-32 rounded-r-lg"><img src="{{ asset(settingKey()['app_logo'] ? 'images/setting/' . settingKey()['app_logo'] : asset('logo/secondaryLogo.png')) }}" alt="No image" id="output"></span>
                                                <hr class="my-2">
                                                <p class="flex items-center text-gray-700 dark:text-gray-500 hover:text-primary"></p>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="lg:w-1/2 xl:w-3/4 lg:px-4 w-full lg:px-4">
                                            <div class="flex gap-2">
                                                <div class="mb-5 xl:w-1/2">
                                                        <label class="label block mb-2 " for="title">App Name</label>
                                                        <input type="text" class="form-control " name="app_name" value="{{settingKey()['app_name']}}">
                                                    </div>
                                            </div>
                                            <div class="flex gap-2">
                                                    <div class="mb-5 xl:w-1/3">
                                                        <label class="label block mb-2 " for="title">FaceBook Link</label>
                                                        <input type="url" class="form-control " name="facebook_link" value="{{settingKey()['facebook_link']}}">
                                                    </div>
                                                    <div class="mb-5 xl:w-1/3">
                                                        <label class="label block mb-2 " for="title">Instagram Link</label>
                                                        <input type="url" class="form-control " name="instagram_link" value="{{settingKey()['instagram_link']}}">
                                                    </div>
                                                    <div class="mb-5 xl:w-1/3">
                                                        <label class="label block mb-2 " for="title">Twitter Link</label>
                                                        <input  type="url" class="form-control " name="twitter_link" value="{{settingKey()['twitter_link']}}">
                                                    </div>
                                                    <div class="mb-5 xl:w-1/3">
                                                        <label class="label block mb-2 " for="title">LinkedIn Link</label>
                                                        <input type="url" class="form-control " name="linkedin_link" value="{{settingKey()['linkedin_link']}}">
                                                    </div>
                                                </div>
                                            <div class="mb-5 xl:w-1/2 ">
                                                <label class="label block mb-2" for="image">Logo</label>
                                                <input type="file" name="app_logo" onchange="loadFile(event, 'output')" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-primary-400">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div id="forgot_password" class="collapse" style="visibility: visible;">
                                    <!-- Categories -->
                                    <div class="lg:flex lg:-mx-4 mb-5 mt-5 ml-5">
                                        <div class="lg:w-1/2 lg:px-4">
                                            <div class="card p-5">
                                                <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8 text-center">
                                                    <!-- Logo -->
                                                    <div class="flex justify-center">
                                                        <img src="{{ isset(settingKey()['forgot_password_template']['forgot_image']) && settingKey()['forgot_password_template']['forgot_image']
                                                            ? asset('images/setting/' . settingKey()['forgot_password_template']['forgot_image'])
                                                            : asset('logo/secondaryLogo.png') }}"
                                                             alt="No image" id="outputForgot" class="w-20 h-20">
                                                    </div>


                                                    <!-- Title -->
                                                    <h2 class="text-xl font-bold mt-4" id="preview-title"> {{settingKey()['forgot_password_template']['title'] ?? 'Forgot Password'}}</h2>
                                                    <p class="text-gray-600">Hi User,</p>
                                                    <p class="text-gray-600" id="preview-body"> {{settingKey()['forgot_password_template']['body_text'] ?? 'Use the following One-Time Password (OTP) to reset your password. Please enter this code in the designated field to proceed with resetting your password.'}}</p>

                                                    <!-- OTP Code -->
                                                    <p class="text-3xl font-bold mt-2 tracking-widest">1234</p>

                                                    <!-- Divider -->
                                                    <hr class="my-4 border-gray-300">

                                                    <!-- Message -->
                                                    <p class="text-gray-600" id="preview-footer"> {{settingKey()['forgot_password_template']['footer_text'] ?? 'Stay safe, stay secure. We are always happy to help!'}}</p>
                                                    <p class="text-gray-600"> Thanks & Regards,</p>
                                                    <p class="text-gray-800 font-semibold">{{settingKey()['app_name']}}</p>

                                                    <!-- Footer -->
                                                    <p class="text-gray-500 text-sm mt-6">Copyright {{ date('Y') }} {{settingKey()['app_name']}}. All rights reserved.</p>
                                                    @php
                                                        $icons = [
                                                            'Facebook' => 'la la-facebook text-blue-600 hover:text-blue-800',
                                                            'Instagram' => 'la la-instagram text-pink-600 hover:text-pink-800',
                                                            'Twitter' => 'la la-twitter text-blue-400 hover:text-blue-600',
                                                            'LinkedIn' => 'la la-linkedin text-blue-700 hover:text-blue-900',
                                                        ];

                                                        // Get the social links safely
                                                        $socialLinks = settingKey()['forgot_password_template']['social'] ?? [];
                                                    @endphp

                                                        <!-- Social Media Icons -->
                                                    @if (!empty($socialLinks) && is_array($socialLinks))
                                                        <div class="flex justify-center space-x-4 mt-4" id="social-icons">
                                                            @foreach ($socialLinks as $social)
                                                                @if(array_key_exists($social, $icons))
                                                                    <a href="#" target="_blank" class="hover:opacity-75">
                                                                        <i class="{{ $icons[$social] }}"></i>
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <div class="lg:w-1/2 xl:w-3/4 lg:px-4 w-full lg:px-4">
                                            <div class="flex gap-2">
                                                <div class="mb-5 xl:w-1/2">
                                                    <label class="label block mb-2" for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title-input" placeholder="Enter Title" value="{{settingKey()['forgot_password_template']['title'] ?? null}}">
                                                </div>
                                                <div class="mb-5 xl:w-1/2">
                                                    <label class="label block mb-2" for="file">Logo</label>
                                                    <input type="file" name="forgot_image" onchange="loadFile(event, 'outputForgot')" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-primary-400">
                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <label class="label block mb-2" for="body_text">Body Text</label>
                                                <textarea type="text" rows="5" class="form-control" name="body_text" id="body-text-input">{{settingKey()['forgot_password_template']['body_text'] ?? null}}</textarea>
                                            </div>

                                            <div class="mb-5">
                                                <label class="label block mb-2" for="footer_text">Footer Text</label>
                                                <input type="text" class="form-control" name="footer_text" id="footer-text-input"  value="{{settingKey()['forgot_password_template']['footer_text'] ?? null}}">
                                            </div>

                                            <div class="flex gap-2">
                                                <!-- Facebook -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="facebook-check" name="social[]" value="Facebook" {{ in_array('Facebook', settingKey()['forgot_password_template']['social'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Facebook</span>
                                                </label>

                                                <!-- Instagram -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="instagram-check" name="social[]" value="Instagram" {{ in_array('Instagram', settingKey()['forgot_password_template']['social'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Instagram</span>
                                                </label>

                                                <!-- Twitter -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="twitter-check" name="social[]" value="Twitter" {{ in_array('Twitter', settingKey()['forgot_password_template']['social'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Twitter</span>
                                                </label>

                                                <!-- LinkedIn -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="linkedin-check" name="social[]" value="LinkedIn" {{ in_array('LinkedIn', settingKey()['forgot_password_template']['social'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>LinkedIn</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="forgot_password_link" class="collapse" style="visibility: visible;">
                                    <!-- Categories -->
                                    <div class="lg:flex lg:-mx-4 mb-5 mt-5 ml-5">
                                        <div class="lg:w-1/2 lg:px-4">
                                            <div class="card p-5">
                                                <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8 text-center">
                                                    <!-- Logo -->
                                                    <div class="flex justify-center">
                                                        <img src="{{ isset(settingKey()['forgot_password_mail_template']['forgot_image_mail']) && settingKey()['forgot_password_mail_template']['forgot_image_mail']
                                                            ? asset('images/setting/' . settingKey()['forgot_password_mail_template']['forgot_image_mail'])
                                                            : asset('logo/secondaryLogo.png') }}"
                                                             alt="No image" id="outputForgotMail" class="w-20 h-20">
                                                    </div>


                                                    <!-- Title -->
                                                    <h2 class="text-xl font-bold mt-4" id="preview-title-mail"> {{settingKey()['forgot_password_mail_template']['title_mail'] ?? 'You have requested to reset your password'}}</h2>
                                                    <p class="text-gray-600">Hi User,</p>
                                                    <p class="text-gray-600" id="preview-body-mail"> {{settingKey()['forgot_password_mail_template']['body_text_mail'] ?? 'We can not just send you your old password. A unique link to reset your password has been created for you. To reset your password, click
                                        following link and follow the instructions.'}}</p>

                                                    <!-- OTP Code -->
                                                    <button id="preview-button-mail" class="btn btn_primary uppercase ltr:mr-5 rtl:ml-5 mb-5 mt-5"> {{settingKey()['forgot_password_mail_template']['button_text_mail'] ?? 'Reset your password'}}</button>

                                                    <!-- Divider -->
                                                    <hr class="my-4 border-gray-300">

                                                    <!-- Message -->
                                                    <p class="text-gray-600" id="preview-footer-mail"> {{settingKey()['forgot_password_mail_template']['footer_text_mail'] ?? 'Stay safe, stay secure. We are always happy to help!'}}</p>
                                                    <p class="text-gray-600"> Thanks & Regards,</p>
                                                    <p class="text-gray-800 font-semibold">{{settingKey()['app_name']}}</p>

                                                    <!-- Footer -->
                                                    <p class="text-gray-500 text-sm mt-6">Copyright {{ date('Y') }} {{settingKey()['app_name']}}. All rights reserved.</p>
                                                    @php
                                                        $iconsMail = [
                                                            'Facebook' => 'la la-facebook text-blue-600 hover:text-blue-800',
                                                            'Instagram' => 'la la-instagram text-pink-600 hover:text-pink-800',
                                                            'Twitter' => 'la la-twitter text-blue-400 hover:text-blue-600',
                                                            'LinkedIn' => 'la la-linkedin text-blue-700 hover:text-blue-900',
                                                        ];

                                                        // Get the social links safely
                                                        $socialLinksMail = settingKey()['forgot_password_mail_template']['social_mail'] ?? [];
                                                    @endphp

                                                        <!-- Social Media Icons -->
                                                    @if (!empty($socialLinksMail) && is_array($socialLinksMail))
                                                        <div class="flex justify-center space-x-4 mt-4" id="social-icons-mail">
                                                            @foreach ($socialLinksMail as $socialM)
                                                                @if(array_key_exists($socialM, $iconsMail))
                                                                    <a href="#" target="_blank" class="hover:opacity-75">
                                                                        <i class="{{ $iconsMail[$socialM] }}"></i>
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <div class="lg:w-1/2 xl:w-3/4 lg:px-4 w-full lg:px-4">
                                            <div class="flex gap-2">
                                                <div class="mb-5 xl:w-1/2">
                                                    <label class="label block mb-2" for="title">Title</label>
                                                    <input type="text" class="form-control" name="title_mail" id="title-input-mail" placeholder="Enter Title" value="{{settingKey()['forgot_password_mail_template']['title_mail'] ?? null}}">
                                                </div>
                                                <div class="mb-5 xl:w-1/2">
                                                    <label class="label block mb-2" for="file">Logo</label>
                                                    <input type="file" name="forgot_image_mail" onchange="loadFile(event, 'outputForgotMail')" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-primary-400">
                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <label class="label block mb-2" for="body_text">Body Text</label>
                                                <textarea type="text" rows="5" class="form-control" name="body_text_mail" id="body-text-input-mail">{{settingKey()['forgot_password_mail_template']['body_text_mail'] ?? null}}</textarea>
                                            </div>

                                            <div class="mb-5">
                                                <label class="label block mb-2" for="footer_text">Footer Text</label>
                                                <input type="text" class="form-control" name="footer_text_mail" id="footer-text-input-mail"  value="{{settingKey()['forgot_password_mail_template']['footer_text_mail'] ?? null}}">
                                            </div>
                                            <div class="mb-5">
                                                <label class="label block mb-2" for="footer_text">Button Text</label>
                                                <input type="text" class="form-control" name="button_text_mail" id="button-text-input-mail"  value="{{settingKey()['forgot_password_mail_template']['button_text_mail'] ?? null}}">
                                            </div>

                                            <div class="flex gap-2">
                                                <!-- Facebook -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="facebook-check-mail" name="social_mail[]" value="Facebook" {{ in_array('Facebook', settingKey()['forgot_password_mail_template']['social_mail'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Facebook</span>
                                                </label>

                                                <!-- Instagram -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="instagram-check-mail" name="social_mail[]" value="Instagram" {{ in_array('Instagram', settingKey()['forgot_password_mail_template']['social_mail'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Instagram</span>
                                                </label>

                                                <!-- Twitter -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="twitter-check-mail" name="social_mail[]" value="Twitter" {{ in_array('Twitter', settingKey()['forgot_password_mail_template']['social_mail'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>Twitter</span>
                                                </label>

                                                <!-- LinkedIn -->
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" id="linkedin-check-mail" name="social_mail[]" value="LinkedIn" {{ in_array('LinkedIn', settingKey()['forgot_password_mail_template']['social_mail'] ?? []) ? 'checked' : '' }}>
                                                    <span></span>
                                                    <span>LinkedIn</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button class="mt-5 btn btn_outlined btn_secondary uppercase" type="submit">Save Changes</button>
            </div>

        </form>
        @include('backend.layouts.footer')
    </main>

@endsection

@section('script')
    <script>
        function setActiveTab(tabId) {
            document.getElementById('active_tab').value = tabId;
        }
    </script>
    <script>
        function loadFile(event, outputId) {
            var output = document.getElementById(outputId);
            if (output) {
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src); // Free memory
                };
            } else {
                console.log("Error: Element with ID " + outputId + " not found.");
            }
        }
    </script>


    <script>
        // Function to update the preview text in real-time
        document.getElementById('title-input').oninput = function () {
            document.getElementById('preview-title').textContent = this.value || "Forgot Password";
        };

        document.getElementById('body-text-input').oninput = function () {
            document.getElementById('preview-body').textContent = this.value || "Use the following One-Time Password (OTP) to reset your password. Please enter this code in the designated field to proceed with resetting your password.";
        };

        document.getElementById('footer-text-input').oninput = function () {
            document.getElementById('preview-footer').textContent = this.value || "Thanks & Regards,";
        };

        // Function to toggle social media icons
        function toggleSocialIcons() {
            let iconsContainer = document.getElementById('social-icons');
            iconsContainer.innerHTML = ""; // Clear previous icons

            if (document.getElementById('facebook-check').checked) {
                iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-600 hover:text-blue-800"><i class="icon la la-facebook"></i></a>';
            }
            if (document.getElementById('instagram-check').checked) {
                iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-pink-600 hover:text-pink-800"><i class="icon la la-instagram"></i></a>';
            }
            if (document.getElementById('twitter-check').checked) {
                iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-400 hover:text-blue-600"><i class="icon la la-twitter"></i></a>';
            }
            if (document.getElementById('linkedin-check').checked) {
                iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-700 hover:text-blue-900"><i class="icon la la-linkedin"></i></a>';
            }
        }

        // Add event listeners for checkbox changes
        document.getElementById('facebook-check').addEventListener('change', toggleSocialIcons);
        document.getElementById('instagram-check').addEventListener('change', toggleSocialIcons);
        document.getElementById('twitter-check').addEventListener('change', toggleSocialIcons);
        document.getElementById('linkedin-check').addEventListener('change', toggleSocialIcons);
    </script>

    <script>
        // document.getElementById('title-input-mail').oninput = function () {
        //     document.getElementById('preview-title-mail').textContent = this.value || "Forgot Password";
        // };
        //
        // document.getElementById('body-text-input-mail').oninput = function () {
        //     document.getElementById('preview-body-mail').textContent = this.value || "Use the following One-Time Password (OTP) to reset your password. Please enter this code in the designated field to proceed with resetting your password.";
        // };
        //
        // document.getElementById('footer-text-input-mail').oninput = function () {
        //     document.getElementById('preview-footer-mail').textContent = this.value || "Stay safe, stay secure. We are always happy to help!";
        // };
        //
        // document.getElementById('button-text-input-mail').oninput = function () {
        //     document.getElementById('preview-button-mail').textContent = this.value || "Reset your password";
        // };
        //
        // // Function to toggle social media icons
        // function toggleSocialIconsMail() {
        //     let iconsContainer = document.getElementById('social-icons-mail');
        //     iconsContainer.innerHTML = ""; // Clear previous icons
        //
        //     if (document.getElementById('facebook-check-mail').checked) {
        //         iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-600 hover:text-blue-800"><i class="la la-facebook"></i></a>';
        //     }
        //     if (document.getElementById('instagram-check-mail').checked) {
        //         iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-pink-600 hover:text-pink-800"><i class="la la-instagram"></i></a>';
        //     }
        //     if (document.getElementById('twitter-check-mail').checked) {
        //         iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-400 hover:text-blue-600"><i class="la la-twitter"></i></a>';
        //     }
        //     if (document.getElementById('linkedin-check-mail').checked) {
        //         iconsContainer.innerHTML += '<a href="#" target="_blank" class="text-blue-700 hover:text-blue-900"><i class="la la-linkedin"></i></a>';
        //     }
        // }
        //
        // // Add event listeners for checkbox changes
        // document.getElementById('facebook-check-mail').addEventListener('change', toggleSocialIconsMail);
        // document.getElementById('instagram-check-mail').addEventListener('change', toggleSocialIconsMail);
        // document.getElementById('twitter-check-mail').addEventListener('change', toggleSocialIconsMail);
        // document.getElementById('linkedin-check-mail').addEventListener('change', toggleSocialIconsMail);


            document.addEventListener("DOMContentLoaded", function () {
            // Update Title in Real-time
            document.getElementById("title-input-mail").addEventListener("input", function () {
                document.getElementById("preview-title-mail").innerText = this.value || "Forgot Password";
            });

            // Update Body Text in Real-time
            document.getElementById("body-text-input-mail").addEventListener("input", function () {
            document.getElementById("preview-body-mail").innerText = this.value || "Use the following One-Time Password (OTP) to reset your password.";
        });

            // Update Footer Text in Real-time
            document.getElementById("footer-text-input-mail").addEventListener("input", function () {
            document.getElementById("preview-footer-mail").innerText = this.value || "Stay safe, stay secure. We are always happy to help!";
        });

            // Update Button Text in Real-time
            document.getElementById("button-text-input-mail").addEventListener("input", function () {
            document.getElementById("preview-button-mail").innerText = this.value || "Reset your password";
        });

            // Update Image in Real-time
            document.querySelector('input[name="forgot_image_mail"]').addEventListener("change", function (event) {
            let output = document.getElementById("outputForgotMail");
            let file = event.target.files[0];
            if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
            output.src = e.target.result;
        };
            reader.readAsDataURL(file);
        }
        });

            // Update Social Media Icons in Real-time
            function updateSocialIcons() {
            let iconsContainer = document.getElementById("social-icons-mail");
            if (!iconsContainer) return;

            iconsContainer.innerHTML = ""; // Clear previous icons

            let icons = {
            "Facebook": "la la-facebook text-blue-600 hover:text-blue-800",
            "Instagram": "la la-instagram text-pink-600 hover:text-pink-800",
            "Twitter": "la la-twitter text-blue-400 hover:text-blue-600",
            "LinkedIn": "la la-linkedin text-blue-700 hover:text-blue-900",
        };

            let selectedSocials = document.querySelectorAll('input[name="social_mail[]"]:checked');
            selectedSocials.forEach(input => {
            let social = input.value;
            if (icons[social]) {
            let iconElement = `<a href="#" target="_blank" class="hover:opacity-75"><i class="${icons[social]}"></i></a>`;
            iconsContainer.innerHTML += iconElement;
        }
        });
        }

            // Attach event listeners to social media checkboxes
            document.querySelectorAll('input[name="social_mail[]"]').forEach(checkbox => {
            checkbox.addEventListener("change", updateSocialIcons);
        });

            // Initialize icons on page load
            updateSocialIcons();
        });




    </script>
@endsection


