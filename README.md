Sync Data Between Projects via Scheduler
(A) Setup API Routes
 create POST route to accept data:

In Project 1:
Route::post('/import-categories', function (Request $request) {
    foreach ($request->all() as $item) {
        \App\Models\Category::updateOrCreate(['name' => $item['name'], [
            'push_time' => $item['push_time'],
        ]);
    }
    return response()->json(['message' => 'Imported']);
});
