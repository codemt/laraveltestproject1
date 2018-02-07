<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sitemap;
//use Post;

class UserController extends Controller
{
    //
    public function index(){


    		//$posts = Post::all();
    				 // Get a general sitemap.
        Sitemap::addSitemap('/sitemaps/general');

        // You can use the route helpers too.
        Sitemap::addSitemap(route('testpage'));
        Sitemap::addSitemap(route('transfergoods'));
        Sitemap::addSitemap(route('fetchmyreviews'));
        Sitemap::addSitemap(route('testpage'));
        Sitemap::addSitemap(route('fetchgooglereviews'));

        //  foreach ($posts as $post) {
        //     Sitemap::addTag(route('fetchgooglereviews', $post), $post->updated_at, 'daily', '0.8');
        // }

        //Sitemap::addTag($location, $lastModified, $changeFrequency, $priority)

        // Return the sitemap to the client.
        //return Sitemap::index();

    		return view('welcome'); 

    }
}
