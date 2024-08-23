<?php
use App\Models\ShipmentCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\apps\Chat;
use App\Http\Controllers\pages\Faq;
use App\Http\Controllers\apps\Email;
use App\Http\Controllers\apps\Kanban;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\maps\Leaflet;
use App\Http\Controllers\apps\Calendar;
use App\Http\Controllers\apps\UserList;
use App\Http\Controllers\dashboard\Crm;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\charts\ChartJs;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\apps\InvoiceAdd;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\UserTeams;
use App\Http\Controllers\apps\AccessRoles;
use App\Http\Controllers\apps\InvoiceEdit;
use App\Http\Controllers\apps\InvoiceList;
use App\Http\Controllers\extended_ui\Misc;
use App\Http\Controllers\extended_ui\Tour;
use App\Http\Controllers\layouts\Vertical;
use App\Http\Controllers\apps\InvoicePrint;
use App\Http\Controllers\cards\CardActions;
use App\Http\Controllers\cards\CardAdvance;
use App\Http\Controllers\charts\ApexCharts;
use App\Http\Controllers\icons\FontAwesome;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\pages\UserProfile;
use App\Http\Controllers\apps\AcademyCourse;
use App\Http\Controllers\extended_ui\Avatar;
use App\Http\Controllers\layouts\Horizontal;
use App\Http\Controllers\layouts\NavbarFull;
use App\Http\Controllers\modal\ModalExample;
use App\Http\Controllers\pages\UserProjects;
use App\Http\Controllers\apps\InvoicePreview;
use App\Http\Controllers\apps\LogisticsFleet;
use App\Http\Controllers\cards\CardAnalytics;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\extended_ui\BlockUI;
use App\Http\Controllers\front_pages\Landing;
use App\Http\Controllers\front_pages\Payment;
use App\Http\Controllers\front_pages\Pricing;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\apps\UserViewAccount;
use App\Http\Controllers\apps\UserViewBilling;
use App\Http\Controllers\cards\CardStatistics;
use App\Http\Controllers\extended_ui\Treeview;
use App\Http\Controllers\form_elements\Extras;
use App\Http\Controllers\form_elements\Picker;
use App\Http\Controllers\front_pages\Checkout;
use App\Http\Controllers\front_pages\Invoices;
use App\Http\Controllers\pages\MiscComingSoon;
use App\Http\Controllers\apps\AcademyDashboard;
use App\Http\Controllers\apps\AccessPermission;
use App\Http\Controllers\apps\UserViewSecurity;
use App\Http\Controllers\form_elements\Editors;
use App\Http\Controllers\form_elements\Selects;
use App\Http\Controllers\form_elements\Sliders;
use App\Http\Controllers\layouts\CollapsedMenu;
use App\Http\Controllers\layouts\ContentNavbar;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\pages\UserConnections;
use App\Http\Controllers\tables\DatatableBasic;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\extended_ui\SweetAlert;
use App\Http\Controllers\form_elements\Switches;
use App\Http\Controllers\front_pages\Categories;
use App\Http\Controllers\front_pages\HelpCenter;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\apps\EcommerceDashboard;
use App\Http\Controllers\apps\EcommerceOrderList;
use App\Http\Controllers\apps\EcommerceReferrals;
use App\Http\Controllers\apps\LogisticsDashboard;
use App\Http\Controllers\cards\CardGamifications;
use App\Http\Controllers\extended_ui\DragAndDrop;
use App\Http\Controllers\extended_ui\MediaPlayer;
use App\Http\Controllers\extended_ui\StarRatings;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\pages\MiscNotAuthorized;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\apps\EcommerceProductAdd;
use App\Http\Controllers\apps\UserViewConnections;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\FileUpload;
use App\Http\Controllers\tables\DatatableAdvanced;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\apps\AcademyCourseDetails;
use App\Http\Controllers\apps\EcommerceCustomerAll;
use App\Http\Controllers\apps\EcommerceProductList;
use App\Http\Controllers\extended_ui\TimelineBasic;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\layouts\ContentNavSidebar;
use App\Http\Controllers\layouts\NavbarFullSidebar;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\wizard_example\CreateDeal;
use App\Http\Controllers\apps\EcommerceOrderDetails;
use App\Http\Controllers\apps\UserViewNotifications;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\LoginCover;
use App\Http\Controllers\form_layouts\StickyActions;
use App\Http\Controllers\form_validation\Validation;
use App\Http\Controllers\pages\MiscUnderMaintenance;
// myContro
use App\Http\Controllers\tables\DatatableExtensions;
use App\Http\Controllers\apps\EcommerceManageReviews;
use App\Http\Controllers\form_elements\CustomOptions;

use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\my_controller\RoleController;
use App\Http\Controllers\my_controller\UserController;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsBilling;
use App\Http\Controllers\apps\EcommerceProductCategory;
use App\Http\Controllers\apps\EcommerceSettingsDetails;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\RegisterCover;
use App\Http\Controllers\authentications\TwoStepsBasic;
use App\Http\Controllers\authentications\TwoStepsCover;
use App\Http\Controllers\front_pages\HelpCenterArticle;
use App\Http\Controllers\pages\AccountSettingsSecurity;
use App\Http\Controllers\pages\Pricing as PagesPricing;
use App\Http\Controllers\apps\EcommerceSettingsCheckout;
use App\Http\Controllers\apps\EcommerceSettingsPayments;
use App\Http\Controllers\apps\EcommerceSettingsShipping;
use App\Http\Controllers\extended_ui\TimelineFullscreen;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\wizard_example\PropertyListing;
use App\Http\Controllers\apps\EcommerceSettingsLocations;
use App\Http\Controllers\my_controller\VehicleController;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\authentications\VerifyEmailBasic;
use App\Http\Controllers\authentications\VerifyEmailCover;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\my_controller\OrderShipController;
use App\Http\Controllers\authentications\RegisterMultiSteps;
use App\Http\Controllers\authentications\ResetPasswordBasic;
use App\Http\Controllers\authentications\ResetPasswordCover;
use App\Http\Controllers\my_controller\PermissionController;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\apps\EcommerceSettingsNotifications;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\authentications\ForgotPasswordCover;
use App\Http\Controllers\front_pages\ShippingpriceController;
use App\Http\Controllers\my_controller\AddInvoicesController;
use App\Http\Controllers\apps\EcommerceCustomerDetailsBilling;
use App\Http\Controllers\form_wizard\Icons as FormWizardIcons;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\apps\EcommerceCustomerDetailsOverview;
use App\Http\Controllers\apps\EcommerceCustomerDetailsSecurity;
use App\Http\Controllers\my_controller\CategoryDetailController;
use App\Http\Controllers\my_controller\ShipmentCategoryController;
use App\Http\Controllers\wizard_example\Checkout as WizardCheckout;
use App\Http\Controllers\apps\EcommerceCustomerDetailsNotifications;
use App\Http\Controllers\form_wizard\Numbered as FormWizardNumbered;
// Admin Route
Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
  'role:المشرف|موظف إدارة الشحن|موظف خدمات اللوجستية|موظف خدمات',
  'auth',
])->group(function () {
  Route::get('/dashboard/analytics', [Analytics::class, 'index'])->name('dashboard-analytics');
  Route::get('/dashboard/crm', [Crm::class, 'index'])->name('dashboard-crm');
  //home

  Route::get('/hom', function () {
    return view('home');
  })->name('dashboard-crm');

  // locale
  Route::get('lang/{locale}', [LanguageController::class, 'swap']);

  ////////////product/////////
  Route::get('/app/ecommerce/product/list', [EcommerceProductList::class, 'index'])->name('app-ecommerce-product-list');
  Route::resource('/ecommerce-product-list', CategoryDetailController::class);
  /////////////////////category/////////////
  Route::get('/app/ecommerce/product/category', [EcommerceProductCategory::class, 'index'])->name(
    'app-ecommerce-product-category'
  );
  Route::resource('/product-category', ShipmentCategoryController::class);
  // apps
  Route::get('/app/email', [Email::class, 'index'])->name('app-email');
  Route::get('/app/chat', [Chat::class, 'index'])->name('app-chat');
  Route::get('/app/calendar', [Calendar::class, 'index'])->name('app-calendar');
  Route::get('/app/kanban', [Kanban::class, 'index'])->name('app-kanban');
  Route::get('/app/ecommerce/dashboard', [EcommerceDashboard::class, 'index'])->name('app-ecommerce-dashboard');
  Route::get('/app/ecommerce/product/list', [EcommerceProductList::class, 'index'])->name('app-ecommerce-product-list');

  Route::get('/app/ecommerce/product/category', [EcommerceProductCategory::class, 'index'])->name(
    'app-ecommerce-product-category'
  );
  Route::resource('/product-category', ShipmentCategoryController::class);

  Route::get('/app/ecommerce/order/list', [EcommerceOrderList::class, 'index'])->name('app-ecommerce-order-list');
  Route::get('app/ecommerce/order/details', [EcommerceOrderDetails::class, 'index'])->name(
    'app-ecommerce-order-details'
  );
  Route::get('/app/ecommerce/customer/all', [EcommerceCustomerAll::class, 'UserManagement'])->name(
    'app-users-customer-all'
  );
  Route::resource('/customer/all', EcommerceCustomerAll::class);
  Route::get('app/ecommerce/customer/details/overview', [EcommerceCustomerDetailsOverview::class, 'index'])->name(
    'app-ecommerce-customer-details-overview'
  );
  Route::get('app/ecommerce/customer/details/security', [EcommerceCustomerDetailsSecurity::class, 'index'])->name(
    'app-ecommerce-customer-details-security'
  );
  Route::get('app/ecommerce/customer/details/billing', [EcommerceCustomerDetailsBilling::class, 'index'])->name(
    'app-ecommerce-customer-details-billing'
  );
  Route::get('app/ecommerce/customer/details/notifications', [
    EcommerceCustomerDetailsNotifications::class,
    'index',
  ])->name('app-ecommerce-customer-details-notifications');
  Route::get('/app/ecommerce/manage/reviews', [EcommerceManageReviews::class, 'index'])->name(
    'app-ecommerce-manage-reviews'
  );
  Route::get('/app/ecommerce/referrals', [EcommerceReferrals::class, 'index'])->name('app-ecommerce-referrals');
  Route::get('/app/ecommerce/settings/details', [EcommerceSettingsDetails::class, 'index'])->name(
    'app-ecommerce-settings-details'
  );
  Route::get('/app/ecommerce/settings/payments', [EcommerceSettingsPayments::class, 'index'])->name(
    'app-ecommerce-settings-payments'
  );
  Route::get('/app/ecommerce/settings/checkout', [EcommerceSettingsCheckout::class, 'index'])->name(
    'app-ecommerce-settings-checkout'
  );
  Route::get('/app/ecommerce/settings/shipping', [EcommerceSettingsShipping::class, 'index'])->name(
    'app-ecommerce-settings-shipping'
  );
  Route::get('/app/ecommerce/settings/locations', [EcommerceSettingsLocations::class, 'index'])->name(
    'app-ecommerce-settings-locations'
  );
  Route::get('/app/ecommerce/settings/notifications', [EcommerceSettingsNotifications::class, 'index'])->name(
    'app-ecommerce-settings-notifications'
  );
  Route::get('/app/academy/dashboard', [AcademyDashboard::class, 'index'])->name('app-academy-dashboard');
  Route::get('/app/academy/course', [AcademyCourse::class, 'index'])->name('app-academy-course');
  Route::get('/app/academy/course-details', [AcademyCourseDetails::class, 'index'])->name('app-academy-course-details');
  Route::get('/app/logistics/dashboard', [LogisticsDashboard::class, 'index'])->name('app-logistics-dashboard');
  Route::get('/app/logistics/fleet', [LogisticsFleet::class, 'index'])->name('app-logistics-fleet');
  Route::get('/app/invoice/list', [InvoiceList::class, 'index'])->name('app-invoice-list');
  Route::get('/app/invoice/preview', [InvoicePreview::class, 'index'])->name('app-invoice-preview');
  Route::get('/app/invoice/print', [InvoicePrint::class, 'index'])->name('app-invoice-print');
  Route::get('/app/invoice/edit', [InvoiceEdit::class, 'index'])->name('app-invoice-edit');
  Route::get('/app/invoice/add', [InvoiceAdd::class, 'index'])->name('app-invoice-add');
  ///////users
  Route::get('/app/user/list', [UserList::class, 'index'])->name('app-user-list');
  Route::resource('/user/list', UserController::class);

  Route::get('/app/user/view/account', [UserViewAccount::class, 'index'])->name('app-users-view-account');
  Route::get('/app/user/view/security', [UserViewSecurity::class, 'index'])->name('app-users-view-security');
  Route::get('/app/user/view/billing', [UserViewBilling::class, 'index'])->name('app-users-view-billing');
  Route::get('/app/user/view/notifications', [UserViewNotifications::class, 'index'])->name(
    'app-users-view-notifications'
  );
  Route::get('/app/user/view/connections', [UserViewConnections::class, 'index'])->name('app-users-view-connections');

  /////Roles
  Route::get('/app/access-roles', [AccessRoles::class, 'index'])->name('app-access-roles');
  Route::post('/app/access-roles', [AccessRoles::class, 'store']);
  Route::resource('/access-roles', RoleController::class);

  ///////permissions
  Route::get('/app/access-permission', [AccessPermission::class, 'index'])->name('app-access-permission');
  Route::post('/app/access-permission', [AccessPermission::class, 'store']);
  Route::resource('/access-permission', PermissionController::class);

  // pages
  Route::get('/pages/profile-user', [UserProfile::class, 'index'])->name('pages-profile-user');
  Route::get('/pages/profile-teams', [UserTeams::class, 'index'])->name('pages-profile-teams');
  Route::get('/pages/profile-projects', [UserProjects::class, 'index'])->name('pages-profile-projects');
  Route::get('/pages/profile-connections', [UserConnections::class, 'index'])->name('pages-profile-connections');
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name(
    'pages-account-settings-account'
  );
  Route::get('/pages/account-settings-security', [AccountSettingsSecurity::class, 'index'])->name(
    'pages-account-settings-security'
  );
  Route::get('/pages/account-settings-billing', [AccountSettingsBilling::class, 'index'])->name(
    'pages-account-settings-billing'
  );
  Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name(
    'pages-account-settings-notifications'
  );
  Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name(
    'pages-account-settings-connections'
  );

  // authentication
  Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
  Route::get('/auth/login-cover', [LoginCover::class, 'index'])->name('auth-login-cover');
  Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
  Route::get('/auth/register-cover', [RegisterCover::class, 'index'])->name('auth-register-cover');
  Route::get('/auth/register-multisteps', [RegisterMultiSteps::class, 'index'])->name('auth-register-multisteps');
  Route::get('/auth/verify-email-basic', [VerifyEmailBasic::class, 'index'])->name('auth-verify-email-basic');
  Route::get('/auth/verify-email-cover', [VerifyEmailCover::class, 'index'])->name('auth-verify-email-cover');
  Route::get('/auth/reset-password-basic', [ResetPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
  Route::get('/auth/reset-password-cover', [ResetPasswordCover::class, 'index'])->name('auth-reset-password-cover');
  Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
  Route::get('/auth/forgot-password-cover', [ForgotPasswordCover::class, 'index'])->name('auth-forgot-password-cover');
  Route::get('/auth/two-steps-basic', [TwoStepsBasic::class, 'index'])->name('auth-two-steps-basic');
  Route::get('/auth/two-steps-cover', [TwoStepsCover::class, 'index'])->name('auth-two-steps-cover');


  // modal
  Route::get('/modal-examples', [ModalExample::class, 'index'])->name('modal-examples');



  // form wizards
  Route::get('/form/wizard-numbered', [FormWizardNumbered::class, 'index'])->name('form-wizard-numbered');
  Route::get('/form/wizard-icons', [FormWizardIcons::class, 'index'])->name('form-wizard-icons');

  Route::post('/form/wizard-icons/price', [FormWizardIcons::class, 'getCategoryPrice']);
  // get categoryis

  Route::get('/myCategories', [FormWizardIcons::class, 'getCategories']);
  Route::get('/form/validation', [Validation::class, 'index'])->name('form-validation');



  // maps
  Route::get('/maps/leaflet', [Leaflet::class, 'index'])->name('maps-leaflet');

  // laravel example
  Route::get('/user-management', [UserManagement::class, 'UserManagement'])->name('app-users-user-management');
  Route::get('/get-category-details/{categoryId}', [EcommerceProductCategory::class, 'getCategoryDetails']);
  Route::resource('/user-list', UserManagement::class);
  Route::resource('/order-ship', OrderShipController::class);
  Route::resource('/category', ShipmentCategory::class);
  Route::resource('/add-invoices', AddInvoicesController::class);
  Route::resource('/add-vehicle', VehicleController::class);
});
///////////home////////////
Route::get('/get-category-details/{categoryId}', [EcommerceProductCategory::class, 'getCategoryDetails']);

Route::get('/', [Landing::class, 'index'])->name('front-pages-landing'); ////welcome page
Route::get('/categories-page', [Categories::class, 'index'])->name('categories'); ////welcome page
Route::get('/categories-page/{id}', [Categories::class, 'show'])->name('category-show');
Route::post('/form/wizard-icons/price', [FormWizardIcons::class, 'getCategoryPrice']);
///show notification new category
Route::get('markAsRead', function () {
  auth()
    ->user()
    ->unreadNotifications->markAsRead();
  return redirect()->back();
})->name('markRead'); ///////make all notification read
Route::delete('/categories-page/{id}', [Categories::class, 'destroy'])->name('category-destroy'); ///destroy notification
Route::get('/invoices-page/{id}', [Invoices::class, 'show'])->name('invoice-show'); ///show notification new invoice to sender
Route::get('/address-page', [Categories::class, 'address'])->name('address-page');
Route::get('/fletmap-page', [Categories::class, 'fletmap'])->name('fletmap-page');
Route::get('/address-page-a', [Categories::class, 'address_center_a'])->name('address-page-a');
Route::get('/address-page-h', [Categories::class, 'address_center_h'])->name('address-page-h');
Route::get('/address-page-d', [Categories::class, 'address_center_d'])->name('address-page-d');

Route::get('/shipping-price-page/{id}', [ShippingpriceController::class, 'categoryDetail'])->name('shipping-price'); /////shiping prices page

////////////////
