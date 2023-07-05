<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('admin.dashboard');
// });


Route::get('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.login.store');
Route::get('/admin/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/item', [ItemController::class, 'index'])->name('item');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');


    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');
    //blog
    // Route::get('/admin/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog');
    // Route::get('/admin/create/blog', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');
    // Route::post('/admin/store/blog', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.store');
    // Route::get('/admin/edit/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
    // Route::post('/admin/update/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');
    // Route::get('/admin/delete/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('admin.blog.delete');

    //products
    Route::get('/admin/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/create/products', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/store/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/edit/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/update/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/admin/delete/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.delete');

    //category
    Route::get('/admin/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/create/category', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/store/category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/edit/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/update/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/delete/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');


    Route::get('/admin/order', [\App\Http\Controllers\Admin\OrderController::class, 'order'])->name('admin.order');

    Route::get('/admin/contacts', [\App\Http\Controllers\Admin\HomeController::class, 'contacts'])->name('admin.contact');
});
Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/about', [\App\Http\Controllers\PagesController::class, 'about'])->name('about');
// Route::get('/tour', [\App\Http\Controllers\PagesController::class, 'tour'])->name('tour');
Route::get('/product', [\App\Http\Controllers\PagesController::class, 'product'])->name('product');
Route::get('/product/{id}', [\App\Http\Controllers\PagesController::class, 'product_details'])->name('product.details');
// Route::get('/favourite/{id}', [\App\Http\Controllers\PagesController::class, 'blog_single'])->name('blog.single');
// // Route::get('/blog', [\App\Http\Controllers\PagesController::class, 'index'])->name('index');
Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Route::post('/contact/store', [\App\Http\Controllers\PagesController::class, 'contact_store'])->name('contact.store');
// Route::post('/contact', [\App\Http\Controllers\PagesController::class, 'contact_store'])->name('contact.store');
//cart
Route::get('cart', [\App\Http\Controllers\PagesController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [\App\Http\Controllers\PagesController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [\App\Http\Controllers\PagesController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [\App\Http\Controllers\PagesController::class, 'remove'])->name('remove_from_cart');

Route::get('checkout', [\App\Http\Controllers\PagesController::class, 'checkout'])->name('checkout');
Route::post('place/order', [\App\Http\Controllers\PagesController::class, 'place_order'])->name('place.order');

Route::get('/payment-stripe', [\App\Http\Controllers\PagesController::class, 'stripe'])->name('stripe');
Route::post('/stripe/post', [\App\Http\Controllers\StripeController::class, 'stripePyament'])->name("stripe.post");


Route::post('/member/post', [\App\Http\Controllers\MemberController::class, 'store_member'])->name("member.store");

//search
Route::get('/search', [\App\Http\Controllers\PagesController::class, 'search'])->name("search");
