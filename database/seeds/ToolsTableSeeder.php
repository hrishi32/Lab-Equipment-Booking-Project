<?php

use Illuminate\Database\Seeder;

class ToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tools')->insert(
        //     [
        //         'tl_name'=>'20 mm microScope',
        //         'tl_desc'=>'Not that much Precise microscope'
        //     ]
        // );

        factory(App\Tools::class)
                ->times(9)
                ->create();
    }
}
