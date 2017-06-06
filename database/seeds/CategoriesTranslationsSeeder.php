<?php

use App\Models\VRCategoriesTranslations;
use Illuminate\Database\Seeder;

class CategoriesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "Apie", "slug" => "apie", "category_id" => "apie", "language_id" => "lt"],
            ["name" => "About", "slug" => "about", "category_id" => "apie", "language_id" => "en"],
            ["name" => "O проекте", "slug" => "o проекте", "category_id" => "apie", "language_id" => "ru"],
            ["name" => "Kontaktai", "slug" => "kontaktai", "category_id" => "kontaktai", "language_id" => "lt"],
            ["name" => "Contacts", "slug" => "contacts", "category_id" => "kontaktai", "language_id" => "en"],
            ["name" => "Kонтакты", "slug" => "контакты", "category_id" => "kontaktai", "language_id" => "ru"],
            ["name" => "Patirčių-kambariai", "slug" => "patirciu-kambariai", "category_id" => "patirciu-kambariai", "language_id" => "lt"],
            ["name" => "Experience-rooms", "slug" => "experience-rooms", "category_id" => "patirciu-kambariai", "language_id" => "en"],
            ["name" => "Kомнаты опытa", "slug" => "kомнаты опытa", "category_id" => "patirciu-kambariai", "language_id" => "ru"],
        ];

        DB::beginTransaction();
        try {
            foreach ($categories as $one) {
                $categorie = VRCategoriesTranslations::where('slug', $one['slug'])->first();
                if (!$categorie)
                    VRCategoriesTranslations::create($one);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
        DB::commit();


    }
}
