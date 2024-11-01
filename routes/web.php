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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::group(['middleware' => ['auth']], function () {

    Route::prefix('superadmin')->group(function () {
        Route::get('/dashboard', 'SuperAdminController@dashboard')->name('superadmin.dashboard');
    });

    Route::prefix('pharmacist')->group(function () {
        Route::get('/dashboard', 'PharmacistController@dashboard')->name('pharmacist.dashboard');

        Route::get('/medicines/list', 'PharmacistController@list')->name('pharmacist.list.medicines');
        Route::get('/medicines/search', 'PharmacistController@search')->name('pharmacist.search.medicines');
    });

    Route::prefix('staff')->group(function () {
        Route::get('/dashboard', 'StaffController@dashboard')->name('staff.dashboard');
    });

    Route::prefix('kasir')->group(function () {
        Route::get('/dashboard', 'CashierController@dashboard')->name('cashier.dashboard');
    });

    Route::prefix('registration')->group(function () {
        Route::get('/show-patient', 'RegistrationController@show')->name('show.patient');
        Route::get('/form-patient', 'RegistrationController@form')->name('form.patient');
        Route::get('/edit-patient', 'RegistrationController@edit')->name('edit.patient');

        Route::post('/update-patient', 'RegistrationController@update')->name('update.patient');
        Route::get('/delete-patient', 'RegistrationController@delete')->name('delete.patient');
        Route::post('/save-patient', 'RegistrationController@save')->name('save.patient');

        Route::get('/search-patient', 'RegistrationController@search')->name('search.patient');
        Route::get('/print-patient', 'RegistrationController@printForm')->name('print.patient');

        Route::get('/rekam-medis', 'RegistrationController@rekamMedis')->name('rekam_medis.patient');
        Route::get('/search-date-rekam-medis', 'RegistrationController@dateRekamMedis')->name('date.rekam_medis.patient');

        Route::get('/patient/export', 'RegistrationController@exportPatients')->name('export.patient');
    });

    Route::prefix('cashier')->group(function () {

        // patient
        Route::get('/show-unpaid-patient', 'CashierController@showUnpaidPatient')->name('show.unpaid.cashier.patient');
        Route::get('/search-date-rekam-medis', 'CashierController@dateRekamMedis')->name('date.unpaid.cashier.patient');

        Route::get('/show-patient', 'CashierController@show')->name('show.cashier.patient');
        Route::get('/patient/search', 'CashierController@searchPatient')->name('search.cashier.patient');

        // service
        Route::get('/service/show', 'CashierController@showServices')->name('show.cashier.service');
        Route::get('/service/add', 'CashierController@add')->name('add.cashier.service');
        Route::get('/service/edit', 'CashierController@edit')->name('edit.cashier.service');

        Route::post('/service/update', 'CashierController@update')->name('update.cashier.service');
        Route::get('/service/delete', 'CashierController@delete')->name('delete.cashier.service');
        Route::post('/service/save', 'CashierController@save')->name('save.cashier.service');
        Route::get('/service/search', 'CashierController@search')->name('search.cashier.service');

        // Rawat Jalan
        Route::get('/patient/rekam-medis-rawat-jalan', 'CashierController@rekamMedis')->name('list.cashier.rekam_medis_rjalan.patient');

        // Rawat Inap
        Route::get('/patient/rekam-medis-rawat-inap', 'CashierController@rekamMedisRawatInap')->name('list.cashier.rekam_medis_rawat_inap.patient');
    });

    Route::prefix('payment')->group(function () {

        // Rawat Jalan
        Route::get('/rekam-medis-rawat-jalan/show-patient', 'PaymentController@show')->name('show.payment.patient');
        Route::post('/rekam-medis-rawat-jalan/add-to-list', 'PaymentController@add')->name('add.payment.patient');
        Route::get('/rekam-medis-rawat-jalan/delete-from-list', 'PaymentController@delete')->name('delete.payment.patient');
        Route::get('/rekam-medis-rawat-jalan/print', 'PaymentController@print')->name('print.payment.patient');
        Route::get('/rekam-medis-rawat-jalan/pay', 'PaymentController@pay')->name('pay.payment.patient');
        Route::get('/rekam-medis-rawat-jalan/cancel-payment', 'PaymentController@cancelPayment')->name('cancel.payment.patient');

        // Rawat Inap
        Route::get('/rekam-medis-rawat-inap/show-patient', 'PaymentController@showRawatInap')->name('show.payment_rawat_inap.patient');
        Route::post('/rekam-medis-rawat-inap/add-to-list', 'PaymentController@addRawatInap')->name('add.payment_rawat_inap.patient');
        Route::get('/rekam-medis-rawat-inap/delete-from-list', 'PaymentController@deleteRawatInap')->name('delete.payment_rawat_inap.patient');
        Route::get('/rekam-medis-rawat-inap/print', 'PaymentController@printRawatInap')->name('print.payment_rawat_inap.patient');
        Route::get('/rekam-medis-rawat-inap/pay', 'PaymentController@payRawatInap')->name('pay.payment_rawat_inap.patient');
        Route::get('/rekam-medis-rawat-inap/cancel-payment', 'PaymentController@cancelPaymentRawatInap')->name('cancel.payment_rawat_inap.patient');

        Route::get('/rekam-medis-rawat-inap/checkout-kamar', 'PaymentController@checkoutKamar')->name('checkout.payment_rawat_inap.patient');
        Route::get('/rekam-medis-rawat-inap/cancel-kamar', 'PaymentController@cancelKamar')->name('cancel.payment_rawat_inap_kamar.patient');
    });

    Route::prefix('rekam-medis')->group(function () {
        Route::get('/list', 'RekamMedisController@list')->name('list.rekam_medis_rjalan.patient');
        Route::get('/print', 'RekamMedisController@print')->name('print.rekam_medis.patient');

        Route::post('/save', 'RekamMedisController@save')->name('save.rekam_medis.patient');
        Route::get('/delete', 'RekamMedisController@delete')->name('delete.rekam_medis.patient');
    });

    Route::prefix('rekam-medis-rawat-inap')->group(function () {
        Route::get('/list', 'RekamMedisRawatInapController@list')->name('list.rekam_medis_rawat_inap.patient');
        Route::get('/print', 'RekamMedisRawatInapController@print')->name('print.rekam_medis_rawat_inap.patient');

        Route::post('/save', 'RekamMedisRawatInapController@save')->name('save.rekam_medis_rawat_inap.patient');
        Route::get('/delete', 'RekamMedisRawatInapController@delete')->name('delete.rekam_medis_rawat_inap.patient');
    });

    Route::prefix('doctor')->group(function () {

        Route::get('/add', 'DoctorController@add')->name('add.doctor');
        Route::get('/edit', 'DoctorController@edit')->name('edit.doctor');

        Route::get('/list', 'DoctorController@list')->name('list.doctor');
        Route::post('/update', 'DoctorController@update')->name('update.doctor');
        Route::get('/delete', 'DoctorController@delete')->name('delete.doctor');
        Route::post('/save', 'DoctorController@save')->name('save.doctor');
    });

    Route::prefix('room')->group(function () {
        Route::get('/add/room', 'RoomController@add')->name('add.room');
        Route::get('/edit/room', 'RoomController@edit')->name('edit.room');

        Route::get('/list/room', 'RoomController@list')->name('list.room');
        Route::post('/update/room', 'RoomController@update')->name('update.room');
        Route::get('/delete/room', 'RoomController@delete')->name('delete.room');
        Route::post('/save/room', 'RoomController@save')->name('save.room');
    });

    Route::prefix('pharmacy')->group(function () {
        Route::get('/medicines/list', 'PharmacyController@list')->name('list.medicines');
        Route::get('/medicines/add', 'PharmacyController@add')->name('add.medicines');
        Route::get('/medicines/edit', 'PharmacyController@edit')->name('edit.medicines');

        Route::post('/medicines/update', 'PharmacyController@update')->name('update.medicines');
        Route::get('/medicines/delete', 'PharmacyController@delete')->name('delete.medicines');
        Route::post('/medicines/save', 'PharmacyController@save')->name('save.medicines');

        Route::get('/medicines/search', 'PharmacyController@search')->name('search.medicines');

        // Stock Obat
        Route::get('/medicines/stock/add', 'PharmacyController@addStockObat')->name('add.medicines.stock');
        Route::post('/medicines/stock/save', 'PharmacyController@saveStockObat')->name('save.medicines.stock');
        Route::get('/medicines/stock/delete', 'PharmacyController@deleteStockObat')->name('delete.medicines.stock');

        // List Patients
        Route::get('/patients/list', 'PharmacyController@listPatients')->name('list.pharmacy.patients');
        Route::get('/patients/list/search', 'PharmacyController@searchPatients')->name('search.pharmacy.patients');
        Route::get('/show-unpaid-patient', 'PharmacyController@showUnpaidPatient')->name('show.unpaid.pharmacy.patient');

        // Rekam Medis Rawat Jalan
        Route::get('/patients/rekam-medis-rawat-jalan/list', 'PharmacyController@listRekamMedis')->name('list.pharmacy.rekam_medis');
        Route::get('/patients/list/rekam-medis-rawat-jalan/buat-resep', 'PharmacyController@buatResep')->name('buat.pharmacy.resep');
        Route::get('/patients/list/rekam-medis-rawat-jalan/print-resep', 'PharmacyController@printResep')->name('print.pharmacy.resep');
        Route::post('/patients/list/rekam-medis-rawat-jalan/buat-resep/save', 'PharmacyController@updateResep')->name('save.pharmacy.resep');

        Route::post('/patients/list/rekam-medis-rawat-jalan/buat-resep/add-medicine', 'PharmacyController@addMedicine')->name('add.pharmacy.medicine');
        Route::get('/patients/list/rekam-medis-rawat-jalan/buat-resep/delete-medicine', 'PharmacyController@deleteMedicine')->name('delete.pharmacy.medicine');

        // Rekam Medis Rawat Inap
        Route::get('/patients/rekam-medis-rawat-inap/list', 'PharmacyController@listRekamMedisRawatInap')->name('list.pharmacy.rekam_medis_rawat_inap');
        Route::get('/patients/list/rekam-medis-rawat-inap/buat-resep', 'PharmacyController@buatResepRawatInap')->name('buat.pharmacy.resep.rekam_medis_rawat_inap');

        Route::get('/patients/list/rekam-medis-rawat-inap/print-resep', 'PharmacyController@printResepRawatInap')->name('print.pharmacy.resep.rekam_medis_rawat_inap');
        Route::post('/patients/list/rekam-medis-rawat-inap/buat-resep/save', 'PharmacyController@updateResepRawatInap')->name('save.pharmacy.resep.rekam_medis_rawat_inap');

        Route::post('/patients/list/rekam-medis-rawat-inap/buat-resep/add-medicine', 'PharmacyController@addMedicineRawatInap')->name('add.pharmacy.medicine.rekam_medis_rawat_inap');
        Route::get('/patients/list/rekam-medis-rawat-inap/buat-resep/delete-medicine', 'PharmacyController@deleteMedicineRawatInap')->name('delete.pharmacy.medicine.rekam_medis_rawat_inap');
    });

    Route::prefix('manage-users')->group(function () {
        Route::get('/list-users', 'ManageUsersController@listUsers')->name('manage_users.list_users');
        Route::get('/add-user', 'ManageUsersController@addUser')->name('manage_users.add_user');
        Route::get('/edit-user', 'ManageUsersController@editUser')->name('manage_users.edit_user');

        Route::get('/delete-user', 'ManageUsersController@deleteUser')->name('manage_users.delete_user');
        Route::post('/update-user', 'ManageUsersController@updateUser')->name('manage_users.update_user');
        Route::post('/save-user', 'ManageUsersController@saveUser')->name('manage_users.save_user');

        Route::get('/search-user', 'ManageUsersController@search')->name('search.user');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/profile', 'SettingsController@profile')->name('setting.profile');
        Route::post('/profile/update', 'SettingsController@updateProfile')->name('update.setting.profile');

        Route::get('/edit-profile', 'SettingsController@editProfile')->name('setting.edit_profile');
        Route::get('/audit-logs', 'SettingsController@auditLogs')->name('setting.audit_logs');
        Route::get('/upload-logo', 'SettingsController@uploadLogo')->name('setting.upload_logo');
    });
});
