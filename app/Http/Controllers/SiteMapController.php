<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sitemap;
use DateTime;
use Refinery29\Sitemap\Component;
use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;
use Spatie\Sitemap\Tags\Url;


class SiteMapController extends Controller
{
    //

    public function index()
	{


			$url = new Component\Url('http://www.example.org/foo/bar.html');

			$url = $url
			    ->withLastModified(new DateTime())
			    ->withChangeFrequency(Component\Url::CHANGE_FREQUENCY_MONTHLY)
			    ->withPriority(0.8)
			;
			echo "<pre>";
			print_r($url);
			die;


			 // Get a general sitemap.
        // Sitemap::addSitemap('/sitemaps/general');

        // // You can use the route helpers too.
        // Sitemap::addSitemap(route('testpage'));
        // Sitemap::addSitemap(route('transfergoods'));
        // Sitemap::addSitemap(route('fetchmyreviews'));
        // Sitemap::addSitemap(route('testpage'));
        // Sitemap::addSitemap(route('fetchgooglereviews'));

        // // Return the sitemap to the client.
        // return Sitemap::index();

        //return Sitemap::xml();

    }

    public function generate()
    {


                    // Sitemap::create()->add(Url::create('/home')->setLastModificationDate(Carbon::yesterday())->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY) ->setPriority(0.1))->writeToFile(public_path('sitemap.xml'));


            //$path;
   //      Sitemap::create()

   //  ->add(Url::create('/home')
   //      ->setLastModificationDate(Carbon::yesterday())
   //      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
   //      ->setPriority(0.1))

   // ->writeToFile(public_path('testsitemap.xml'));

        SitemapGenerator::create('http://localhost:8000/')->writeToFile(public_path('thismap.xml'));

        //echo \Helldar\Sitemap\Factory::generate('myfile.xml');
        // print_r($path);
        // die;

    }
}
