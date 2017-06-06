<?php

use App\Models\VRMenus;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            ["id" => "pradinis", "new_window" => 0, "parent" => "", "sequence" => 1],
            ["id" => "apie", "new_window" => 0, "parent" => "", "sequence" => 2],
            ["id" => "virtualus_kambariai", "new_window" => 0, "parent" => "", "sequence" => 3],

            ["id" => "the_lab", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 4],
            ["id" => "fruit_ninja", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 5],
            ["id" => "space_pirate_trainer", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 6],
            ["id" => "tilt_brush", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 7],
            ["id" => "merry_snowballs", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 8],
            ["id" => "samsung_irklavimas", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 9],
            ["id" => "ktu_parasparnis", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 10],
            ["id" => "hurl", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 11],
            ["id" => "final_goalie_football_simulator", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 12],
            ["id" => "project_cars", "new_window" => 0, "parent" => "Virtualūs Kambariai", "sequence" => 13],

            ["id" => "vieta_laikas", "new_window" => 0, "parent" => "", "sequence" => 14],
            ["id" => "bilietai", "new_window" => 0, "parent" => "", "sequence" => 15],
            ["id" => "remejai", "new_window" => 0, "parent" => "", "sequence" => 16],
            ];

        DB::beginTransaction ();
        try {
            foreach ($menu as $menuData) {
                $menu = VRMenus::where ('id', $menuData['id'])->first ();
                if (!$menu)
                    VRMenus::create ($menuData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }
}
