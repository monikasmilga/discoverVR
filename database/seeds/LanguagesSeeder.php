<?php

use App\Models\VRLanguages;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ["name" => "Lietuvių", "id" => "lt"],
            ["name" => "English", "id" => "en"],
            ["name" => "Русский", "id" => "ru"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($languages as $langData) {
                $lang = VRLanguages::where ('id', $langData['id'])->first ();
                if (!$lang)
                    VRLanguages::create ($langData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }
}
