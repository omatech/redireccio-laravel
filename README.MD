1.- composer require omatech/redireccio-laravel
2.- php artisan vendor:publish
3.-  select -> Provider: Omatech\RedireccIO\Laravel\RedireccIOServiceProvider
4.- config/redireccio.php -> token
5.- app/Exceptions/Handler.php en report()

        if($exception instanceof NotFoundHttpException) {
            $url = request()->fullUrl();
            $method = request()->method();

            app()->make('RedireccIO')->intercept($url, $method);
        }
        parent::report($exception);
        
