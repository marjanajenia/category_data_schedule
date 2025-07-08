<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sync Data Between Projects via Scheduler
Setup API Routes in Both Projects:

In Project 1:( create POST route to accept data)
Route::post('/import-categories', function (Request $request) {
    foreach ($request->all() as $item) {
        \App\Models\Category::updateOrCreate(['name' => $item['name']], [
            'push_time' => $item['push_time'],
        ]);
    }
    return response()->json(['message' => 'Imported']);
});
same in Project 2

Create Laravel Command for Scheduling
php artisan make:command SyncToProject2

Run the scheduler 
php artisan schedule:work
