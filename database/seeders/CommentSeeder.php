<?php

namespace Database\Seeders;

use App\Models\Comment;
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
        $sql = File::get('database/seeders/sql/comments_db.sql');
        DB::unprepared($sql);


        // $comments = Comment::whereBetween('id', [1, 8000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [8001, 16000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [16001, 24000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [24001, 32000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [32001, 40000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [40001, 48000])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }

        // $comments = Comment::whereBetween('id', [48001, 54065])->get();

        // foreach ($comments as $key => $comment) {
        //     $user_id = fake()->numberBetween(1, 23);
        //     $date = fake()->dateTimeBetween('2019-01-01', '2020-02-01');

        //     $comment->update([
        //         'user_id' => $user_id,
        //         'created_at' => $date,
        //         'updated_at' => $date,
        //     ]);
        // }


        // $sql = File::get('database/seeders/sql/commentsof1_2.sql');
        // DB::unprepared($sql);

        // $sql = File::get('database/seeders/sql/comments-1.sql');
        // DB::unprepared($sql);
        //
        // $sql = File::get('database/seeders/sql/comments-2.sql');
        // DB::unprepared($sql);

        // $sql = File::get('database/seeders/sql/comments-3.sql');
        // DB::unprepared($sql);
        //
        // $sql = File::get('database/seeders/sql/comments-4.sql');
        // DB::unprepared($sql);
        //
        // $sql = File::get('database/seeders/sql/comments-5.sql');
        // DB::unprepared($sql);
    }
}
