<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Model\Pic_type;
use App\Model\Link_type;
use App\Model\Cont_type;
use App\Model\Setting;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * 共享数据
     *
     * @return void
     */
    public function boot()
    {
        $pic_types = Pic_type::get();
        $link_types = Link_type::get();
        $cont_types = Cont_type::get();
        $settings = Setting::first();
        view()->share('pic_types', $pic_types);
        view()->share('link_types', $link_types);
        view()->share('cont_types', $cont_types);
        view()->share('settings', $settings);
    }
}
