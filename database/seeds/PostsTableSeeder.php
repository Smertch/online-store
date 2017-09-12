<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            array(
                [
                    'title' => "Php is awesome",
                    'alias' => "php_is_awesome",
                    'intro' => "Assum typi non habent claritatem insitam est usus legentis",
                    'body' => "Assum typi non habent claritatem insitam est usus legentis, in iis qui facit eorum claritatem. Quod ii legunt saepius claritas est etiam processus dynamicus qui."
                ],
                [
                    'title' => "Laravel 5.4",
                    'alias' => "laravel54",
                    'intro' => "Assum typi non habent claritatem insitam est usus legentis",
                    'body' => "Assum typi non habent claritatem insitam est usus legentis, in iis qui facit eorum claritatem. Quod ii legunt saepius claritas est etiam processus dynamicus qui."
                ],
                [
                    'title' => "Thanks to seeds",
                    'alias' => "seeds",
                    'intro' => "Assum typi non habent claritatem insitam est usus legentis",
                    'body' => "Assum typi non habent claritatem insitam est usus legentis, in iis qui facit eorum claritatem. Quod ii legunt saepius claritas est etiam processus dynamicus qui."
                ]
            )
        );
    }
}
