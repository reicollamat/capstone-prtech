<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = File::get('database/seeders/sql/comments-1.sql');
        DB::unprepared($sql);

        $sql = File::get('database/seeders/sql/comments-2.sql');
        DB::unprepared($sql);

        $sql = File::get('database/seeders/sql/comments-3.sql');
        DB::unprepared($sql);

        $sql = File::get('database/seeders/sql/comments-4.sql');
        DB::unprepared($sql);

        $sql = File::get('database/seeders/sql/comments-5.sql');
        DB::unprepared($sql);
    }
}
