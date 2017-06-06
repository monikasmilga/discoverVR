<?php

use App\Models\VRCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $categories = [
                ["id" => "apie"],
                ["id" => "kontaktai"],
                ["id" => "patirciu-kambariai"],
            ];
            DB::beginTransaction ();
            try {
                foreach ($categories as $single) {
                    $categorie = VRCategories::where ('id', $single['id'])->first ();
                    if (!$categorie)
                        VRCategories::create ($single);
                }
            } catch (\Exception $e) {
                DB::rollback ();
                throw new Exception($e->getMessage ());
            }
            DB::commit ();
        }
    }
}
