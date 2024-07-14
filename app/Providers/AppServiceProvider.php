<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Content;
use App\Models\Duration;
use App\Models\Subject;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();
        $content = Content::find(1)->first();
        view()->share('content', $content);



        $categories = Category::orderBy('order', 'ASC')->where('status', '1')->get();
        view()->share('categories', $categories);

        $subjects = Subject::orderBy('order', 'ASC')->where('status', '1')->get();
        view()->share('subjects', $subjects);

        $durations = Duration::orderBy('id', 'DESC')->where('status', '1')->get();
        view()->share('durations', $durations);


        $blogs = Blog::orderBy('id', 'DESC')->where('status', '1')->get();
        view()->share('blogs', $blogs);
    }
}