<?php

use App\Models\Progress;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Progress::class, 200)->create(); //200個のダミーデータを生成
    }
}
