<?php

/*
|--------------------------------------------------------------------------
| Site - Added support for multiple languages
|--------------------------------------------------------------------------
*/

$languages = DB::table('languages')->where('status','=','1')->orderBy('sort','ASC')->lists('language_code','id_language'); 

foreach ($languages as $language)
{
    Route::group(array('prefix' => $language,'before'=>'changeLanguage'), function()
    {

// Begin

/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/

Route::get('/', 'Site_HomeController@index');

/*
|--------------------------------------------------------------------------
| Site - Turkish language structure was used !
|--------------------------------------------------------------------------
*/

// Search

Route::get('q', 'Site_CatalogController@search');

// Catalog

Route::get('urunler', 'Site_CatalogController@showcase');
Route::get('products', 'Site_CatalogController@showcase');
Route::get('u/{sef_url}/{id}', 'Site_CatalogController@product');
Route::get('k/{sef_url}/{id}', 'Site_CatalogController@category');

// Other

Route::get('s/{sef_url}', 'Site_PageController@index');
Route::get('iletisim','Site_PageController@contact');
Route::get('contact','Site_PageController@contact');
Route::post('gonder', 'Site_PageController@formsend');

// End

    });
};

/*
|--------------------------------------------------------------------------
| Panel - Login
|--------------------------------------------------------------------------
*/

Route::get('Pv3', 'Panel_LoginController@index');
Route::post('Pv3/login', 'Panel_LoginController@login');
Route::get('Pv3/logout', 'Panel_LoginController@logout');

/*
|--------------------------------------------------------------------------
| Panel - Administrator Tools
|--------------------------------------------------------------------------
*/

Route::group(array('before'=>'authAdministrator'), function()
{
Route::get('Pv3/Dashboard', 'Panel_DashboardController@index');
Route::controller('Pv3/brand','Panel_BrandController');
Route::controller('Pv3/setting','Panel_SettingController');
Route::controller('Pv3/banner','Panel_BannerController');
Route::controller('Pv3/banner-brand','Panel_BannerBrandController');
Route::controller('Pv3/banner-box','Panel_BannerBoxController');
Route::controller('Pv3/banner-sub','Panel_BannerSubController');
Route::controller('Pv3/banner-category','Panel_BannerCategoryController');
Route::controller('Pv3/design','Panel_DesignController');
Route::controller('Pv3/page','Panel_PageController');
Route::controller('Pv3/section','Panel_SectionController');
Route::controller('Pv3/user','Panel_UserController');
Route::controller('Pv3/product','Panel_ProductController');
Route::controller('Pv3/gallery','Panel_GalleryController');
Route::controller('Pv3/category','Panel_CategoryController');
Route::controller('Pv3/menu','Panel_MenuController');
Route::controller('Pv3/footer','Panel_FooterController');
Route::controller('Pv3/profile','Panel_ProfileController');
Route::controller('Pv3/photo','Panel_PhotoController');
Route::controller('Pv3/photo-item','Panel_PhotoitemController');
Route::controller('Pv3/language','Panel_LanguageController');
});