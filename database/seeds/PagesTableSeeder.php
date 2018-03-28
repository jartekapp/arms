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
                'content' => '<h1 class="page-title text-shadow" style="text-align: center;"><span style="color: rgb(255, 255, 255);"><strong>ARMS</strong></span></h1>

<h3 class="text-shadow" style="text-align: center; font-size: 3rem;"><span style="color: rgb(255, 255, 255);">Holding hands, holding each other, holding hands, together</span></h3>
',
            ],
            [
                'order' => 2,
                'slug' => 'about-us',
                'name' => 'About Us',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">About Us</h2>

<p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<p style="margin-top:0;">Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis. Vivamus pulvinar metus ipsum, quis vestibulum turpis vulputate quis. Nulla interdum orci ut luctus condimentum. Maecenas pretium ante quis faucibus tristique.</p>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
</div>
',
            ],
            [
                'order' => 3,
                'slug' => 'our-values',
                'name' => 'Our Values',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">Our Values</h2>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<h3 style="margin-top:0;">Value number one is blah</h3>

		<p style="margin-top:0;">Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis. Vivamus pulvinar metus ipsum, quis vestibulum turpis vulputate quis. Nulla interdum orci ut luctus condimentum. Maecenas pretium ante quis faucibus tristique.</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<h3 style="margin-top:0;">Value number two is blah</h3>

		<p style="margin-top:0;">Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis. Vivamus pulvinar metus ipsum, quis vestibulum turpis vulputate quis. Nulla interdum orci ut luctus condimentum. Maecenas pretium ante quis faucibus tristique.</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<h3 style="margin-top:0;">Value number three is blah</h3>

		<p style="margin-top:0;">Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis. Vivamus pulvinar metus ipsum, quis vestibulum turpis vulputate quis. Nulla interdum orci ut luctus condimentum. Maecenas pretium ante quis faucibus tristique.</p>
	</div>
</div>
',
            ],
            [
                'order' => 4,
                'slug' => 'projects',
                'name' => 'Projects',
                'type' => 'wysiwyg',
                'content' => '<h2 class="page-section-title">Projects</h2>

<p class="lead">Working in - Orphanage empowerment, Medical Care, Foster Care, Volunteer Program and Wellspring Resource Center...Click to read more about each one.</p>
<div class="row">
	<div class="col-sm-6"><img src="/img/placeholder.png" class="img-responsive">

		<h4>Orphanage Empowerment</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
	<div class="col-sm-6"><img src="/img/placeholder.png" class="img-responsive">

		<h4>Medical Care</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
	<div class="col-sm-6"><img src="/img/placeholder.png" class="img-responsive">

		<h4>Foster Care</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
	<div class="col-sm-6"><img src="/img/placeholder.png" class="img-responsive">

		<h4>Volunteer Program</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
	<div class="col-sm-6"><img src="/img/placeholder.png" class="img-responsive">

		<h4>Wellspring Resource Center</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
</div>
',
            ],
            [
                'order' => 5,
                'slug' => 'affiliations',
                'name' => 'Affiliations',
                'type' => 'wysiwyg',
                'content' => '<h2>ARMS is an Aid and Development Agency that partners with people from all walks of life.</h2>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<h4>We are also registered as an Australian NGO</h4>

		<p>Ut aliquam erat at volutpat consectetur. Suspendisse iaculis porttitor lorem sit amet auctor. Nunc condimentum quam nec fermentum auctor. Vestibulum id nisl nibh. Vestibulum in urna dignissim, aliquam quam non, ullamcorper mi. Pellentesque tincidunt lorem ut nisi luctus, sed fermentum nisl vehicula.</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-4"><img class="img-responsive" src="/img/placeholder.png"></div>
	<div class="col-sm-8">

		<h4>We are also registered as a Chinese NGO</h4>

		<p>Donec placerat turpis a magna eleifend vulputate. Integer aliquet nulla eget dui mattis hendrerit eu id quam. Duis in viverra ante, fringilla volutpat magna. Fusce porta auctor iaculis.</p>
	</div>
</div>
',
            ],
        ];
    }
}
