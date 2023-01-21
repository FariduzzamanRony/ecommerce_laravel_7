<?php

use Illuminate\Support\Facades\Route;






Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::get('testmaill', 'StripePaymentController@testmaill');



Route::get('checkout/page', 'CheckoutController@checkout');
Route::post('checkout/post', 'CheckoutController@checkout_post');
Route::post('check_out/ajax_query', 'CheckoutController@ajax_post');
Route::get('test/sms', 'CheckoutController@testsms');






Route::get('ajaxImageUpload', 'AjaxImageUploadController@ajaxImageUpload');
Route::post('ajaxImageUpload', 'AjaxImageUploadController@ajaxImageUploadPost')->name('ajaxImageUpload');
Route::delete('users/{id}', 'HomeController@destroy')->name('users.destroy');


Route::get('postinsert', 'HomeController@ajaxRequest');
Route::post('postinsert', 'HomeController@ajaxRequestPost');





Route::get('login/github', 'Guthub_Controller@redirectToProvider');
Route::get('login/github/callback', 'Guthub_Controller@handleProviderCallback');







Route::get('customer/home','Customer_Controller@Customer_index');
Route::get('customer/invoice/download/{order_id}','Customer_Controller@Customer_invoices');









Route::get('cuopon','CuoponController@cuopon');
Route::post('cuopon/post','CuoponController@cuopon_post');
//
// Route::get('all_card/product/{coupon_name}','CuoponController@cuopon_insert');
//
















Route::post('card/store','Card_Store_Controller@card_store')->name('card.store');
Route::get('all_card/product','Card_Store_Controller@all_card_product');

Route::get('all_card/product/{coupon_name}','Card_Store_Controller@all_card_product');



Route::get('product_delete/{product_delete_id}','Card_Store_Controller@product_delete');
Route::post('update.card','Card_Store_Controller@card_update')->name('update.card');














Route::get('sub/category','Sub_categoryController@sub_index')->name('sub_category');
Route::post('sub_category/post','Sub_categoryController@sub_category_post');



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'FrontendController@index')->name('index');
Route::get('Frontend/single_card/{single_slug_link}', 'FrontendController@single_card');
Route::get('all_product/{product_id}', 'FrontendController@all_product');
Route::post('review/post', 'FrontendController@review_post');
Route::post('Admin_reply/post', 'FrontendController@Admin_reply_post');
Route::get('shop_categorys/{cate_id}', 'FrontendController@shop_category');



Route::get('search', 'SerchController@search_index');









Route::get('contact/dev', 'FrontendController@contact')->name('contact/dev');
Route::post('contact_dev/post', 'FrontendController@contact_post')->name('contact_dev/post');
Route::get('contact_dev/show', 'FrontendController@contact_dev_show')->name('contact_dev/show');
Route::get('contact/file/download/{download_id}', 'FrontendController@contact_file_download');

Route::get('category/all_product', 'FrontendController@category_all_product')->name('category/all_product');
Route::get('login_Register', 'FrontendController@login_Register');
Route::post('customer/register', 'FrontendController@customer_register');
Route::get('single_blog', 'FrontendController@single_blog');
Route::get('menu_product/{id}', 'FrontendController@menu_product');
Route::get('about', 'FrontendController@about');



Route::get('offer_product', 'OfferTimeController@offer_product');
Route::post('offer/post', 'OfferTimeController@offer_post');
Route::post('offer_product/ajax_query', 'OfferTimeController@ajax_offer_post');








// product all url
Route::resource('product','ProductController');


// customer all order_deatils
Route::resource('customer_order_deatils','Customer_oreder_deatils_Cotroller');
Route::get('order_cencel/{order_id}','Customer_oreder_deatils_Cotroller@order_cencel')->name('order_cencel');





Route::get('new_register','Register_loginController@new_register');
Route::post('new/register/post','Register_loginController@register_post');
Route::get('new_login','Register_loginController@new_login');
Route::post('new_login/post','Register_loginController@new_login_post');

// Route::get('contact', function () {
//     return view('contact');
// });





Route::get('category', 'CategoryController@category');
Route::post('category/post', 'CategoryController@categorypost');
Route::get('delete/category/{category_id}', 'CategoryController@deletecategory');
Route::get('edit/category/{category_id}', 'CategoryController@editcategory');
Route::post('edit/category/post', 'CategoryController@editcategorypost');
Route::get('restore/category/{restore_id}', 'CategoryController@restorecategory');
Route::get('forcedelete/category/{forceDelete_id}', 'CategoryController@forceDeletecategory');



Route::get('contact', 'ContactController@contact_index');
Route::post('contact/post', 'ContactController@contact_post');
Route::get('contact/edit/{contact_id}', 'ContactController@contact_edit');
Route::post('contact/edit/post', 'ContactController@contact_edit_post');
Route::get('contact/delete/{contact_delete_id}', 'ContactController@contact_delete');
Route::get('contact/restore_contact/{restore_contact_delete_id}', 'ContactController@restore_contact');
Route::get('contact/hard_delete/{Hard_delete_contact_id}', 'ContactController@contact_hard_delete');




Route::get('user/profile/edit', 'Profile_editController@profile_edit');
Route::post('profile_photo/uplode', 'Profile_editController@profile_photo_uplode');
Route::post('user/profile/edit/post', 'Profile_editController@profile_edit_post');
Route::get('password/change', 'Profile_editController@password_change');
Route::post('password/change/post', 'Profile_editController@password_change_post');
// Route::get('sent/all_manber_sms', 'Profile_editController@sentall_manber_sms');
Route::get('data/table', 'Profile_editController@datatable');




Route::get('practice','PracticeController@practice');
Route::post('practice/post','PracticeController@practice_post');
Route::get('read/practice/{read_id}','PracticeController@read_practice');
Route::get('edit/practice/{edit_id}','PracticeController@edit_practice');
Route::post('edit/practice/post','PracticeController@edit_practice_post');
Route::get('Soft_Delete/practice/{Soft_Delete_id}','PracticeController@Soft_Delete_practice');
Route::get('restore/practice/{restore_id}','PracticeController@restore_practice');
Route::get('hard_delete/practice/{hard_delete_id}','PracticeController@hard_delete_practice');
Route::get('active_and_dective/practice/{active_and_dective_id}','PracticeController@active_and_dective_practice');
Route::post('mark_delete/Pretices','PracticeController@practice_mark_delete');







Route::get('my/protfilio','Rony_protfolioController@my_protfilio');
Route::post('my/protfilio/post','Rony_protfolioController@my_protfilio_post');
Route::post('mark/delete','Rony_protfolioController@mark_delete');
Route::get('potfolio/dective/{active_and_deactive_id}','Rony_protfolioController@potfolio_dective');


Route::get('blog','BlogController@blog_index')->name('blog');
Route::post('blog/post','BlogController@blog_post')->name('blog/post');
Route::get('blog/edit/{blog_edit_id}','BlogController@blog_edit')->name('blog/edit');
Route::post('blog/edit/post','BlogController@blog_edit_post')->name('blog/edit/post');


Auth::routes(['verify' => true]);

Route::get('sent/all_manber_sms', 'HomeController@sentall_manber_sms');

Route::get('/home', 'HomeController@index')->name('home');
