<?php

namespace App\Http\Controllers\web\v1\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function Index()
    {
        return view('backend.admin.settings.index');
    }

    //store
    public function Store(Request $request)
    {
        try {

            if($request->active_tab == 'basic_setting'){

                if($request->has('app_logo')){
                    $oldLogo = settingKey()['app_logo'] ?? null;
                    $appLogo = ImageService::updateImage('images/setting', $request->app_logo, $oldLogo,'app_logo_');
                }else{
                    $appLogo = settingKey()['app_logo'] ?? null;
                }


                $basicSettings = [
                    'app_name' => $request->app_name ?? null,
                    'facebook_link' => $request->facebook_link ?? null,
                    'linkedin_link' => $request->linkedin_link ?? null,
                    'instagram_link' => $request->instagram_link ?? null,
                    'twitter_link' => $request->twitter_link ?? null,
                    'app_logo' => $appLogo ?? null

                ];

                foreach ($basicSettings as $key => $value) {
                    Setting::updateOrInsert(
                        ['key' => $key],
                        ['value' => $value, 'updated_at' => now()]
                    );
                }
            }elseif ($request->active_tab == 'forgot_password') {
                if($request->has('forgot_image')){
                    $oldImage = settingKey()['forgot_password_template']['forgot_image'] ?? null;
                    $forgotImage = ImageService::updateImage('images/setting', $request->forgot_image, $oldImage,'forgot_password_');
                }else{
                    $forgotImage = settingKey()['forgot_password_template']['forgot_image'] ?? null;
                }
                // Store all data in a single variable as JSON
                $forgotPasswordTemplate = [
                    'title' => $request->title ?? null,
                    'body_text' => $request->body_text ?? null,
                    'footer_text' => $request->footer_text ?? null,
                    'forgot_image' => $forgotImage ?? null,
                    'social' => $request->social ?? [] // Default to empty array if no checkboxes selected
                ];
                // Store in the settings table
                Setting::updateOrInsert(
                    ['key' => 'forgot_password_template'],
                    ['value' => json_encode($forgotPasswordTemplate), 'updated_at' => now()]
                );

            }elseif ($request->active_tab == 'forgot_password_link'){
                if($request->has('forgot_image_mail')){
                    $oldImage = settingKey()['forgot_password_mail_template']['forgot_image_mail'] ?? null;
                    $forgotPasswordLinkImage = ImageService::updateImage('images/setting', $request->forgot_image_mail, $oldImage,'forgot_password_link_');
                }else{
                    $forgotPasswordLinkImage = settingKey()['forgot_password_mail_template']['forgot_image_mail'] ?? null;
                }
                // Store all data in a single variable as JSON
                $forgotPasswordLinkTemplate = [
                    'title_mail' => $request->title_mail ?? null,
                    'body_text_mail' => $request->body_text_mail ?? null,
                    'footer_text_mail' => $request->footer_text_mail ?? null,
                    'button_text_mail' => $request->button_text_mail ?? null,
                    'forgot_image_mail' => $forgotPasswordLinkImage ?? null,
                    'social_mail' => $request->social_mail ?? [] // Default to empty array if no checkboxes selected
                ];
                // Store in the settings table
                Setting::updateOrInsert(
                    ['key' => 'forgot_password_mail_template'],
                    ['value' => json_encode($forgotPasswordLinkTemplate), 'updated_at' => now()]
                );

            }

//            return redirect()->back()->with('success', 'update setting ');

            $notification = array(
                'message' => 'Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
