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

            ['id' => 'EN','language_code' => 'EN', 'name' => 'English'],
            ['id' => 'LT','language_code' => 'LT', 'name' => 'Lietuvių'],
            ['id' => 'RU','language_code' => 'RU', 'name' => 'Русский'],
            ['id' => 'DE','language_code' => 'DE', 'name' => 'Deutsch'],
            ['id' => 'FR','language_code' => 'FR', 'name' => 'Français'],

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
