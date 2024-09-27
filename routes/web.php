<?php


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('search', 'PagesController@search')->name('search');
    Route::get('about', 'PagesController@about')->name('about');
    Route::get('contact', 'PagesController@contact')->name('contact');
    Route::post('contact', 'PagesController@postcontact')->name('contact');
    Route::get('privacy-policies', 'PagesController@privacyPolicies')->name('privacy-policies');


    Route::group(['middleware' => ['auth']], function () {
        Route::get('profile', 'PagesController@profile')->name('profile');
        Route::get('profile/user-information', 'PagesController@userInformation')->name('userInformation');
        Route::get('bookings', 'PagesController@bookings')->name('bookings');
        Route::get('checkout', 'PagesController@checkout')->name('checkout');
        Route::get('checkout/success', 'PagesController@checkoutSuccess')->name('checkout.success');
        Route::get('checkout/cancel', 'PagesController@checkoutCancel')->name('checkout.cancel');
    });
});


Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => true]);
Route::get('/auth/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/auth/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::resource('testimonials', 'TestimonialsController');

    // Facility
    Route::delete('facilities/destroy', 'FacilityController@massDestroy')->name('facilities.massDestroy');
    Route::resource('facilities', 'FacilityController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Van
    Route::delete('vans/destroy', 'VanController@massDestroy')->name('vans.massDestroy');
    Route::post('vans/media', 'VanController@storeMedia')->name('vans.storeMedia');
    Route::post('vans/ckmedia', 'VanController@storeCKEditorImages')->name('vans.storeCKEditorImages');
    Route::resource('vans', 'VanController');

    // Extra
    Route::delete('extras/destroy', 'ExtraController@massDestroy')->name('extras.massDestroy');
    Route::resource('extras', 'ExtraController');

    // Booking
    Route::delete('bookings/destroy', 'BookingController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingController');

    // Booking Status
    Route::delete('booking-statuses/destroy', 'BookingStatusController@massDestroy')->name('booking-statuses.massDestroy');
    Route::post('booking-statuses/media', 'BookingStatusController@storeMedia')->name('booking-statuses.storeMedia');
    Route::post('booking-statuses/ckmedia', 'BookingStatusController@storeCKEditorImages')->name('booking-statuses.storeCKEditorImages');
    Route::resource('booking-statuses', 'BookingStatusController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
