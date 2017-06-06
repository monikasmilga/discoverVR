<?php

use App\Models\VRMenusTranslations;
use Illuminate\Database\Seeder;

class MenuTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuTranslation = [
            ["menu_id" => "apie", "language_id" => 'lt', "name" => "Apie", "slug" => "apie"],
            ["menu_id" => "apie", "language_id" => 'en', "name" => "About", "slug" => "about"],
            ["menu_id" => "apie", "language_id" => 'ru', "name" => "O проекте", "slug" => "O_проекте"],

            ["menu_id" => "pradinis", "language_id" => 'lt', "name" => "Pradinis", "slug" => "pradinis"],
            ["menu_id" => "pradinis", "language_id" => 'en', "name" => "Home", "slug" => "home"],
            ["menu_id" => "pradinis", "language_id" => 'ru', "name" => "домашняя страница", "slug" => "домашняя_страница"],

            ["menu_id" => "virtualus_kambariai", "language_id" => 'lt', "name" => "Virtualūs Kambariai", "slug" => "virtualus_kambariai"],
            ["menu_id" => "virtualus_kambariai", "language_id" => 'en', "name" => "Virtual Rooms", "slug" => "virtual_rooms"],
            ["menu_id" => "virtualus_kambariai", "language_id" => 'ru', "name" => "виртуальные номера", "slug" => "виртуальные_номера"],

            ["menu_id" => "the_lab", "language_id" => 'lt', "name" => "The Lab", "slug" => "the_lab_lt"],
            ["menu_id" => "the_lab", "language_id" => 'en', "name" => "The Lab", "slug" => "the_lab_en"],
            ["menu_id" => "the_lab", "language_id" => 'ru', "name" => "The Lab", "slug" => "the_lab_ru"],

            ["menu_id" => "fruit_ninja", "language_id" => 'lt', "name" => "Fruit Ninja", "slug" => "fruit_ninja_lt"],
            ["menu_id" => "fruit_ninja", "language_id" => 'en', "name" => "Fruit Ninja", "slug" => "fruit_ninja_en"],
            ["menu_id" => "fruit_ninja", "language_id" => 'ru', "name" => "Fruit Ninja", "slug" => "fruit_ninja_ru"],

            ["menu_id" => "space_pirate_trainer", "language_id" => 'lt', "name" => "Space Pirate Trainer", "slug" => "space_pirate_trainer_lt"],
            ["menu_id" => "space_pirate_trainer", "language_id" => 'en', "name" => "Space Pirate Trainer", "slug" => "space_pirate_trainer_en"],
            ["menu_id" => "space_pirate_trainer", "language_id" => 'ru', "name" => "Space Pirate Trainer", "slug" => "space_pirate_trainer_ru"],

            ["menu_id" => "tilt_brush", "language_id" => 'lt', "name" => "Tilt Brush", "slug" => "tilt_brush_lt"],
            ["menu_id" => "tilt_brush", "language_id" => 'en', "name" => "Tilt Brush", "slug" => "tilt_brush_en"],
            ["menu_id" => "tilt_brush", "language_id" => 'ru', "name" => "Tilt Brush", "slug" => "tilt_brush_ru"],

            ["menu_id" => "merry_snowballs", "language_id" => 'lt', "name" => "Merry Snowballs", "slug" => "merry_snowballs_lt"],
            ["menu_id" => "merry_snowballs", "language_id" => 'en', "name" => "Merry Snowballs", "slug" => "merry_snowballs_en"],
            ["menu_id" => "merry_snowballs", "language_id" => 'ru', "name" => "Merry Snowballs", "slug" => "merry_snowballs_ru"],

            ["menu_id" => "samsung_irklavimas", "language_id" => 'lt', "name" => "Samsung irklavimas", "slug" => "samsung_irklavimas_lt"],
            ["menu_id" => "samsung_irklavimas", "language_id" => 'en', "name" => "Samsung Rowing", "slug" => "samsung_irklavimas_en"],
            ["menu_id" => "samsung_irklavimas", "language_id" => 'ru', "name" => "Samsung гребля", "slug" => "samsung_irklavimas_ru"],

            ["menu_id" => "ktu_parasparnis", "language_id" => 'lt', "name" => "KTU Parasparnis", "slug" => "ktu_parasparnis_lt"],
            ["menu_id" => "ktu_parasparnis", "language_id" => 'en', "name" => "KTU Glider", "slug" => "ktu_parasparnis_en"],
            ["menu_id" => "ktu_parasparnis", "language_id" => 'ru', "name" => "KTU планер", "slug" => "ktu_parasparnis_ru"],

            ["menu_id" => "hurl", "language_id" => 'lt', "name" => "Hurl", "slug" => "hurl_lt"],
            ["menu_id" => "hurl", "language_id" => 'en', "name" => "Hurl", "slug" => "hurl_en"],
            ["menu_id" => "hurl", "language_id" => 'ru', "name" => "Hurl", "slug" => "hurl_ru"],

            ["menu_id" => "final_goalie_football_simulator", "language_id" => 'lt', "name" => "Final Goalie: Football Simulator", "slug" => "final_goalie_football_simulator_lt"],
            ["menu_id" => "final_goalie_football_simulator", "language_id" => 'en', "name" => "Final Goalie: Football Simulator", "slug" => "final_goalie_football_simulator_en"],
            ["menu_id" => "final_goalie_football_simulator", "language_id" => 'ru', "name" => "Final Goalie: Football Simulator", "slug" => "final_goalie_football_simulator_ru"],

            ["menu_id" => "project_cars", "language_id" => 'lt', "name" => "Project Cars", "slug" => "project_cars_lt"],
            ["menu_id" => "project_cars", "language_id" => 'en', "name" => "Project Cars", "slug" => "project_cars_en"],
            ["menu_id" => "project_cars", "language_id" => 'ru', "name" => "Project Cars", "slug" => "project_cars_ru"],

            ["menu_id" => "vieta_laikas", "language_id" => 'lt', "name" => "Vieta ir Laikas", "slug" => "vieta_ir_laikas"],
            ["menu_id" => "vieta_laikas", "language_id" => 'en', "name" => "Location and Time", "slug" => "location_time"],
            ["menu_id" => "vieta_laikas", "language_id" => 'ru', "name" => "Место и время", "slug" => "Место_и_время"],

            ["menu_id" => "bilietai", "language_id" => 'lt', "name" => "Bilietai", "slug" => "bilietai"],
            ["menu_id" => "bilietai", "language_id" => 'en', "name" => "Tickets", "slug" => "tickets"],
            ["menu_id" => "bilietai", "language_id" => 'ru', "name" => "билеты", "slug" => "билеты"],

            ["menu_id" => "remejai", "language_id" => 'lt', "name" => "Rėmėjai", "slug" => "remejai"],
            ["menu_id" => "remejai", "language_id" => 'en', "name" => "Supporters", "slug" => "supporters"],
            ["menu_id" => "remejai", "language_id" => 'ru', "name" => "поддержка", "slug" => "поддержка"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($menuTranslation as $menuTranslationData) {
                $menuTranslation = VRMenusTranslations::where ('slug', $menuTranslationData['slug'])->first ();
                if (!$menuTranslation)
                    VRMenusTranslations::create ($menuTranslationData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();

    }
}
