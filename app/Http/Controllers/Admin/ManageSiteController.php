<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageSite;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManageSiteController extends Controller
{
    function index(): View
    {
        // $manage_site = new ManageSite();
        // $manage_site->key = "four_three_column";
        // $value = [
        //     'image1' => '$filename1',
        //     'image2' => '$filename2',
        //     'image3' => '$filename3',
        //     'title1' => '$request->title1',
        //     'title2' => '$request->title2',
        //     'sub_title1' => '$request->sub_title1',
        //     'sub_title2' => '$request->sub_title2',
        //     'url1' => '$request->url1',
        //     'title3' => '$request->title3',
        //     'sub_title3' => '$request->sub_title3',
        //     'url3' => '$request->url3',
        //     'url2' => '$request->url2',
        // ];
        // $manage_site->value = json_encode($value);
        // $manage_site->save();

        $basic_setting = ManageSite::where('key', 'basic_setting')->first();
        $home_page_setting = ManageSite::where('key', 'home_page')->first();
        $media_setting = ManageSite::where('key', 'media')->first();
        $seo_setting = ManageSite::where('key', 'seo')->first();
        $first_three_column = ManageSite::where('key', 'first_three_column')->first();
        $second_three_column = ManageSite::where('key', 'second_three_column')->first();
        $third_two_column = ManageSite::where('key', 'third_two_column')->first();
        $four_three_column = ManageSite::where('key', 'four_three_column')->first();
        $footer_setting = ManageSite::where('key', 'footer')->first();

        return view('admin.setting.manage-site', compact(
            'basic_setting',
            'home_page_setting',
            'media_setting',
            'seo_setting',
            'footer_setting',
            'first_three_column',
            'second_three_column',
            'four_three_column',
            'third_two_column',
        ));
    }

    function update_manage_site(Request $request): RedirectResponse
    {
        // dd($request->key);
        $manage_site = ManageSite::where('key', $request->key)->first();
            if ($request->key == 'basic_setting') {
            $value = [
                'app_name' => $request->app_name,
                'home_page_title' => $request->home_page_title,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'media') {
            $logo = '';
            if ($request->file('logo')) {
                $logo = $request->file('logo')->store('media', 'public');
            } else {
                $logo = $request->old_logo;
            }
            $favicon = '';
            if ($request->file('favicon')) {
                $favicon = $request->file('favicon')->store('media', 'public');
            } else {
                $favicon = $request->old_favicon;
            }
            $loader = '';
            if ($request->file('loader')) {
                $loader = $request->file('loader')->store('media', 'public');
            } else {
                $loader = $request->old_loader;
            }
            $value = [
                'logo' => $logo,
                'favicon' => $favicon,
                'loader' => $loader,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'seo') {
            $value = [
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'footer') {

            // $filename = '';
            // if ($request->file('image')) {
            //     $filename = $request->file('image')->store('footer', 'public');
            // } else {
            //     $filename = $request->old_gateway_image;
            // }
            $value = [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'home_page') {

            $filename1 = '';
            if ($request->file('image1')) {
                $filename1 = $request->file('image1')->store('home_page', 'public');
            } else {
                $filename1 = $request->old_image1;
            }

            $filename2 = '';
            if ($request->file('image2')) {
                $filename2 = $request->file('image2')->store('home_page', 'public');
            } else {
                $filename2 = $request->old_image2;
            }
            $value = [
                'image1' => $filename1,
                'image2' => $filename2,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'url1' => $request->url1,
                'url2' => $request->url2,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'first_three_column') {
            $filename1 = '';
            if ($request->file('image1')) {
                $filename1 = $request->file('image1')->store('home_page', 'public');
            } else {
                $filename1 = $request->old_image1;
            }

            $filename2 = '';
            if ($request->file('image2')) {
                $filename2 = $request->file('image2')->store('home_page', 'public');
            } else {
                $filename2 = $request->old_image2;
            }
            $filename3 = '';
            if ($request->file('image3')) {
                $filename3 = $request->file('image3')->store('home_page', 'public');
            } else {
                $filename3 = $request->old_image3;
            }
            $value = [
                'image1' => $filename1,
                'image2' => $filename2,
                'image3' => $filename3,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'url1' => $request->url1,
                'title3' => $request->title3,
                'sub_title3' => $request->sub_title3,
                'url3' => $request->url3,
                'url2' => $request->url2,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'second_three_column') {

            $filename1 = '';
            if ($request->file('image1')) {
                $filename1 = $request->file('image1')->store('home_page', 'public');
            } else {
                $filename1 = $request->old_image1;
            }

            $filename2 = '';
            if ($request->file('image2')) {
                $filename2 = $request->file('image2')->store('home_page', 'public');
            } else {
                $filename2 = $request->old_image2;
            }
            $filename3 = '';
            if ($request->file('image3')) {
                $filename3 = $request->file('image3')->store('home_page', 'public');
            } else {
                $filename3 = $request->old_image3;
            }
            $value = [
                'image1' => $filename1,
                'image2' => $filename2,
                'image3' => $filename3,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'url1' => $request->url1,
                'title3' => $request->title3,
                'sub_title3' => $request->sub_title3,
                'url3' => $request->url3,
                'url2' => $request->url2,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'third_two_column') {

            $filename1 = '';
            if ($request->file('image1')) {
                $filename1 = $request->file('image1')->store('home_page', 'public');
            } else {
                $filename1 = $request->old_image1;
            }

            $filename2 = '';
            if ($request->file('image2')) {
                $filename2 = $request->file('image2')->store('home_page', 'public');
            } else {
                $filename2 = $request->old_image2;
            }
            $value = [
                'image1' => $filename1,
                'image2' => $filename2,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'url1' => $request->url1,
                'url2' => $request->url2,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        } elseif ($request->key == 'four_three_column') {

            $filename1 = '';
            if ($request->file('image1')) {
                $filename1 = $request->file('image1')->store('home_page', 'public');
            } else {
                $filename1 = $request->old_image1;
            }

            $filename2 = '';
            if ($request->file('image2')) {
                $filename2 = $request->file('image2')->store('home_page', 'public');
            } else {
                $filename2 = $request->old_image2;
            }
            $filename3 = '';
            if ($request->file('image3')) {
                $filename3 = $request->file('image3')->store('home_page', 'public');
            } else {
                $filename3 = $request->old_image3;
            }
            $value = [
                'image1' => $filename1,
                'image2' => $filename2,
                'image3' => $filename3,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'sub_title1' => $request->sub_title1,
                'sub_title2' => $request->sub_title2,
                'url1' => $request->url1,
                'title3' => $request->title3,
                'sub_title3' => $request->sub_title3,
                'url3' => $request->url3,
                'url2' => $request->url2,
            ];
            $manage_site->value = json_encode($value);
            $manage_site->save();
        }

        return redirect()->back()->with('success', $request->key . ' Update Successfully');
    }
}
