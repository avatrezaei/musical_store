<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Category;
use \App\Models\Product;
use \App\Models\User;
use \App\Models\Banner;

class HomeController extends \Core\Controller
{
    public function indexAction()
    {
        $products = (new Product)->fetchAll();
        $banners = (new Banner)->fetchAll();
        $categories = (new Category)->fetchAll();
        

        foreach ($categories as $key => $category) {
            $categories[$key]['products'] = Product::countByCategory($category['id']);
        }
        // New Arrivals products
        $newArrivals = (new Product)
            ->where(['new_arrival' => 1])
            ->limit(8)
            ->fetchAll();
        // Trending products
        $trending = (new Product)
            ->where(['trending' => 1])
            ->limit(8)
            ->fetchAll();
        // Top Rated products
        $topRated = (new Product)
            ->order(['rating' => 'DESC'])
            ->limit(8)
            ->fetchAll();

        $newArrivals = array_chunk($newArrivals, 4);
        $trending = array_chunk($trending, 4);
        $topRated = array_chunk($topRated, 4);

        // Deal of the day
        $dealOfTheDay = (new Product)
            ->where(['deal_of_the_day' => 1])
            ->limit(2)
            ->fetchAll();

        // BEST SELLERS
        $bestSellers = (new Product)
            ->order(['sold' => 'DESC'])
            ->limit(8)
            ->fetchAll();

        View::renderTemplate('home/index.php', [
            'products' => $products,
            'banners' => $banners,
            'categories' => $categories,
            'newArrivals' => $newArrivals,
            'trending' => $trending,
            'topRated' => $topRated,
            'dealOfTheDay' => $dealOfTheDay,
            'bestSellers' => $bestSellers
        ]);
    }
}