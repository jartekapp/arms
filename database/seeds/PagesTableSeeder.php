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
        collect($this->getSeedData())->each(function ($pageData) {
            $page = Page::firstOrCreate(['slug' => $pageData['slug']], ['name' => $pageData['name']]);

            collect($pageData['fields'])->each(function ($field) use ($page) {
                if (!$page->fields()->where(['slug' => $field['slug']])->exists()) {
                    if (!isset($field['content'])) {
                        $field['content'] = file_get_contents(resource_path('statics/' . $page->slug . '/' . $field['slug'] . '.html'));
                    }

                    $page->fields()->create($field);
                }
            });
        });
    }

    private function getSeedData()
    {
        return [
            $this->getHomePage(),
            $this->getProjectsPage(),
            $this->getContactPage(),
            $this->getSearchPage(),
        ];
    }

    private function getHomePage()
    {
        return [
            'slug' => 'home',
            'name' => 'Home',
            'fields' => [
                [
                    'order' => 1,
                    'slug' => 'landing-cover-text',
                    'name' => 'Landing cover text',
                    'type' => 'wysiwyg',
                ],
                [
                    'order' => 2,
                    'slug' => 'about-us',
                    'name' => 'About Us',
                    'type' => 'wysiwyg',
                ],
                [
                    'order' => 3,
                    'slug' => 'our-values',
                    'name' => 'Our Values',
                    'type' => 'wysiwyg',
                ],
                [
                    'order' => 4,
                    'slug' => 'projects',
                    'name' => 'Projects',
                    'type' => 'wysiwyg',
                ],
                [
                    'order' => 5,
                    'slug' => 'affiliations',
                    'name' => 'Affiliations',
                    'type' => 'wysiwyg',
                ],
            ],
        ];
    }

    public function getProjectsPage()
    {
        return [
            'slug' => 'projects',
            'name' => 'Projects',
            'fields' => [
                [
                    'order' => 1,
                    'slug' => 'page-body',
                    'name' => 'Page Body',
                    'type' => 'wysiwyg',
                ],
            ],
        ];
    }

    public function getContactPage()
    {
        return [
            'slug' => 'contact',
            'name' => 'Contact Us',
            'fields' => [
                [
                    'order' => 1,
                    'slug' => 'info',
                    'name' => 'Info',
                    'type' => 'wysiwyg',
                ],
            ],
        ];
    }

    public function getSearchPage()
    {
        return [
            'slug' => 'search',
            'name' => 'Disability Services Search',
            'fields' => [
                [
                    'order' => 1,
                    'slug' => 'introduction',
                    'name' => 'Introduction',
                    'type' => 'wysiwyg',
                ],
            ],
        ];
    }
}
