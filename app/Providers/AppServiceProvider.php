<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DanhMuc;
use App\Models\TheLoai;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('vi');
        View::composer('*', function ($view) {
            $theloai = TheLoai::orderBy('id', 'ASC')->get();
            $danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
            $view->with(compact('theloai', 'danhmuc'));
        });
    }
}
