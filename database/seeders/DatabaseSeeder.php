<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table("tasks")->insert([
            "name" => "牛乳を買う",
            "date_on" => Carbon::now(),
            "body" => "牛乳を買いに行く"
        ]);
        DB::table("tasks")->insert([
            "name" => "旅行の予定を立てる",
            "date_on" => Carbon::now(),
            "body" => "友達との旅行の相談を Zoom で"
        ]);
        DB::table("tasks")->insert([
            "name" => "試験の勉強を進める",
            "date_on" => Carbon::now(),
            "body" => "対策本を早めにやりきる"
        ]);
    }
}
