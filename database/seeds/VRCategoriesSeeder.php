<?php

use App\Models\VRCategories;
use App\Models\VRCategoriesTranslations;
use Illuminate\Database\Seeder;

class VRCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 'vr_rooms'],
        ];

        $categoriesTranslations = [
            ['name' => 'VR rooms', 'language_code' => 'en', 'record_id' => 'vr_rooms'],
            ['name' => 'VR kambariai', 'language_code' => 'lt', 'record_id' => 'vr_rooms'],
            ['name' => 'ВР комнаты', 'language_code' => 'ru', 'record_id' => 'vr_rooms'],
            ['name' => 'Chambres de RV', 'language_code' => 'fr', 'record_id' => 'vr_rooms'],
            ['name' => 'VR räume', 'language_code' => 'de', 'record_id' => 'vr_rooms'],

        ];

        DB::beginTransaction();
        try {

            foreach ($categories as $category) {
                $record = VRCategories::find($category['id']);
                if (!$record) {
                    VRCategories::create($category);
                }
            }

            foreach ($categoriesTranslations as $categoryTranslation) {
                $record = VRCategoriesTranslations::where('record_id', $categoryTranslation['record_id'])
                                                    ->where('language_code', $categoryTranslation['language_code'])
                                                    ->first();
                if (!$record) {
                    VRCategoriesTranslations::create($categoryTranslation);
                }
            }


        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure ' . $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
