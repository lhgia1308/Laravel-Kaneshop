<?php

namespace App\Http\Controllers\api\v1;
use Illuminate\Routing\Controller;
use App\CPU\Helpers;

class AppLanguageController extends Controller
{
    public function get_languages() {
        try {

            $app_languages = Helpers::get_business_settings('app_language');
            return response()->json(
                $app_languages
            );

        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 403);
        }
    }
    public function get_language($code) {
        try {

            $language = include(base_path('resources/app-lang/'. $code . '/messages.php'));
            return response()->json($language);

        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 403);
        }
    }
}