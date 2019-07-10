## RedireccIO


```composer require omatech/redireccio-laravel```

```php artisan vendor:publish```

```select -> Provider: Omatech\RedireccIO\Laravel\RedireccIOServiceProvider```

```config/redireccio.php -> token```

```app/Exceptions/Handler.php en report()```
```php
if($exception instanceof NotFoundHttpException) {
    $url = request()->fullUrl();
    $method = request()->method();

    app()->make('RedireccIO')->intercept($url, $method);
}
parent::report($exception);
```
