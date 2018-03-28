<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = Page::firstOrCreate(['slug' => 'home'], ['name' => 'Home']);

        collect($this->getHomePageFields())->each(function ($field) use ($homePage) {
            if (! $homePage->fields()->where(['slug' => $field['slug']])->exists()) {
                $homePage->fields()->create($field);
            }
        });
    }

    private function getHomePageFields()
    {
        return [
            [
                'order' => 1,
                'slug' => 'landing-cover-text',
                'name' => 'Landing cover text',
                'type' => 'wysiwyg',
                'content' => '<h1 class="page-title text-shadow" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><strong>ARMS</strong></span></h1><h3 class="text-shadow" style="text-align: center; font-size: 3rem;"><span style="color: rgb(255, 255, 255);">Holding hands, holding each other, holding hands, together</span></h3>',
            ],
            [
                'order' => 2,
                'slug' => 'about-us',
                'name' => 'About Us',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">About Us</h2><p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum, massa vel eleifend lacinia, arcu dui vestibulum est.</p><div class="row"><div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png" /></div><div class="col-sm-8">Donec placerat rtupis a magna eliffend vulputate.</div></div>',
            ],
            [
                'order' => 3,
                'slug' => 'our-values',
                'name' => 'Our Values',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">Our Values</h2><p>Lorem ipsum</p>',
            ],
            [
                'order' => 4,
                'slug' => 'projects',
                'name' => 'Projects',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">Projects</h2><p>Lorem ipsum</p>',
            ],
            [
                'order' => 5,
                'slug' => 'affiliations',
                'name' => 'Affiliations',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">Affiliations</h2><p>Lorem ipsum</p>',
            ],
        ];
    }
}
