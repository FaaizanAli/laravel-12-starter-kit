<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .otp {
            font-size: 32px;
            font-weight: bold;
            color: #0e4739;
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .social-icons {
            margin-top: 15px;
        }
        .social-icons a {
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
            color: #555;
        }
        .social-icons a:hover {
            color: #000;
        }
    </style>
</head>
<body>
<div class="container">
    <img src="{{ isset(settingKey()['forgot_password_template']['forgot_image']) && settingKey()['forgot_password_template']['forgot_image']
                                                            ? asset('images/setting/' . settingKey()['forgot_password_template']['forgot_image'])
                                                            : asset('logo/secondaryLogo.png') }}" alt="User Avatar" style="border-radius: 50%; width: 20%; height: 20%">
    <p class="header">{{settingKey()['forgot_password_template']['title'] ?? 'Forgot Password'}}</p>
    <p>Hi User,</p>
    <p>{{settingKey()['forgot_password_template']['body_text'] ?? 'Use the following One-Time Password (OTP) to reset your password. Please enter this code in the designated field to proceed with resetting your password.'}}</p>
    <p class="otp">4452</p>
    <hr>
    <p class="footer">{{settingKey()['forgot_password_template']['footer_text'] ?? 'Stay safe, stay secure. We are always happy to help!'}}<br><strong>Thanks & Regards,<br></strong><strong>{{settingKey()['app_name']}}</strong><br>Copyright {{ date('Y') }} {{settingKey()['app_name']}}. All rights reserved.</p>
    @php
        // Define social media icons using FontAwesome
        $icons = [
            'Facebook' => 'fa-brands fa-facebook',
            'Instagram' => 'fa-brands fa-instagram',
            'Twitter' => 'fa-brands fa-twitter',
            'LinkedIn' => 'fa-brands fa-linkedin',
        ];

        // Fetch social media links from settings, fallback to '#'
        $socialLinks = [
            'Facebook' => settingKey()['facebook_link'] ?? '#',
            'Instagram' => settingKey()['instagram_link'] ?? '#',
            'Twitter' => settingKey()['twitter_link'] ?? '#',
            'LinkedIn' => settingKey()['linkedin_link'] ?? '#',
        ];

        // Get the social links from forgot_password_template (if exists)
        $enabledSocials = settingKey()['forgot_password_template']['social'] ?? [];
    @endphp

    <div class="social-icons flex space-x-4">
        @foreach ($enabledSocials as $social)
            @if(array_key_exists($social, $icons))
                <a href="{{ $socialLinks[$social] ?? '#' }}" target="_blank" class="{{ strtolower($social) }} hover:opacity-75">
                    <i class="{{ $icons[$social] }}"></i>
                </a>
            @endif
        @endforeach
    </div>


</div>
</body>
</html>
