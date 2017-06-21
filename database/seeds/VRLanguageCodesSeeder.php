<?php

use App\Models\VRLanguageCodes;
use Illuminate\Database\Seeder;

class VRLanguageCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [

            ['id' => 'lt','language_code' => 'lt', 'name' => 'Lietuvių'],
            ['id' => 'en','language_code' => 'en', 'name' => 'English'],
            ['id' => 'ru','language_code' => 'ru', 'name' => 'Русский'],
            ['id' => 'de','language_code' => 'de', 'name' => 'Deutsch'],
            ['id' => 'fr','language_code' => 'fr', 'name' => 'Français'],

        ];
        DB::beginTransaction();
        try {
            foreach ($languages as $language) {
                $record = VRLanguageCodes::find($language['id']);
                if (!$record) {
                    VRLanguageCodes::create($language);
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
