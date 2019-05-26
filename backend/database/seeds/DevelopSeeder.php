<?php

use Illuminate\Database\Seeder;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Interest;
use App\Models\Tag;
use App\Models\User;

class DevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables();
        $this->setData();
    }

    private function truncateTables()
    {
        Article::truncate();
        Comment::truncate();
        Interest::truncate();
        Tag::truncate();
        User::truncate();
    }

    private function setData()
    {
        $admin_user = User::create([
            'name' => 'admin1',
            'display_name' => '管理者1',
            'type' => 1,
        ]);

        $general_user = User::create([
            'name' => 'general1',
            'display_name' => '一般ユーザー1',
            'type' => 0,
        ]);

        for ($i = 1; $i <= 20; $i ++) {
            Tag::create([
                'name' => 'タグ' . $i                
            ]);
        }

        for ($i = 1; $i <= 50; $i ++) {
            $article = $general_user->articles()->create([
                'title' => '記事' . $i,
                'text' => '本文' . $i,
            ]);
            $article->tags()->attach($i % 20 + 1);
            if ($i <= 40) {
                $comment = $article->comments()->create([
                    'user_id' => $general_user->id,
                    'reply_target_id' => null,
                    'text' => 'コメント本文' . $i,
                ]);
                $article->interests()->create([
                    'user_id' => $general_user->id,
                    'type' => 1,
                ]);
                if ($i <= 20) {
                    $article->comments()->create([
                        'user_id' => $general_user->id,
                        'reply_target_id' => $comment->id,
                        'text' => 'コメント返事本文' . $i,
                    ]);
                }
            }

        }
    }

}
