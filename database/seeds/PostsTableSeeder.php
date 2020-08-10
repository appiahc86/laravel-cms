<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create(['name'=>'Design']);
        $category2 = Category::create(['name'=>'Marketing']);
        $category3 = Category::create(['name'=>'Publishing']);

        $tag1 = Tag::create(['name'=>'Record']);
        $tag2 = Tag::create(['name'=>'Freebie']);
        $tag3 = Tag::create(['name'=>'Screenshot']);


        $author1 =    User::create([

            'name'=> 'Osie Bismark',
            'email'=>'osei@mail.com',
            'password'=> Hash::make('33333333'),
            'role'=>'writer'

        ]);

      $author2 = User::create([

            'name'=> 'Kate Perry',
            'email'=>'kate@mail.com',
            'password'=> Hash::make('44444444'),
            'role'=>'writer'

        ]);


        $post1 = $author1->posts()->create([

            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=> 'We relocated our office to a new designed garage',
            'content'=> 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
            'category_id'=> $category1->id,
            'published_at' => now(),
            'image'=> 'posts/1.jpg'

        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);

        $post2 = $author2->posts()->create([

            'title'=>'This is why it\'s time to ditch dress codes at work',
            'description'=> 'This is another description',
            'content'=> 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
            'category_id'=> $category2->id,
            'published_at' => now(),
            'image'=> 'posts/2.jpg'

        ]);

        $post2->tags()->attach([$tag3->id, $tag1->id]);

        $post3 = $author2->posts()->create([

            'title'=>'Best practices for minimalist design with example',
            'description'=> 'This is the third description',
            'content'=> 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
            'category_id'=> $category3->id,
            'published_at' => now(),
            'image'=> 'posts/3.jpg'

        ]);

        $post3->tags()->attach([$tag1->id, $tag3->id]);

        $post4 = $author1->posts()->create([

            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=> 'This is the third description',
            'content'=> 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.',
            'category_id'=> $category1->id,
            'published_at' => now(),
            'image'=> 'posts/4.jpg'

        ]);


    }
}
