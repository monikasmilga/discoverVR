<?php

use App\Models\VRPages;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ["category_id" => "apie", "id" => "apie"],

            ["category_id" => "kontaktai", "id" => "kontaktai"],


            ["category_id" => "patirciu-kambariai", "id" => "the_lab"],


            ["category_id" => "patirciu-kambariai", "id" => "fruit_ninja"],


            ["category_id" => "patirciu-kambariai", "id" => "space_pirate_trainer"],


            ["category_id" => "patirciu-kambariai", "id" => "tilt_brush"],


            ["category_id" => "patirciu-kambariai", "id" => "merry_snowballs"],


            ["category_id" => "patirciu-kambariai", "id" => "samsung_irklavimas"],


            ["category_id" => "patirciu-kambariai", "id" => "hurl"],


            ["category_id" => "patirciu-kambariai", "id" => "final_goalie_football_simulator"],

            ["category_id" => "patirciu-kambariai", "id" => "project_cars"],


            ["category_id" => "patirciu-kambariai", "id" => "ktu_parasparnis"],

        ];

        DB::beginTransaction ();
        try {
            foreach ($pages as $pageData) {
                $page = VRPages::where ('id', $pageData['id'])->first ();
                if (!$page)
                    VRPages::create ($pageData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }

}
