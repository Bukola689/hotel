<?php

use App\Events\Auth\EmployeeProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\V1\RegisterController;
use App\Http\Controllers\V1\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\V1\ForgotPasswordController;
use App\Http\Controllers\V1\Auth\ResetPasswordController;
use App\Http\Controllers\V1\Admin\UserController;
use App\Http\Controllers\V1\Admin\CustomerController;
use App\Http\Controllers\V1\Admin\BookingController;
use App\Http\Controllers\V1\Admin\RoomController;
use App\Http\Controllers\V1\Admin\RoomTypeController;
use App\Http\Controllers\V1\Admin\EmployeeController;
use App\Http\Controllers\V1\Admin\ReminderController;
use App\Http\Controllers\V1\Admin\StaffController;
use App\Http\Controllers\V1\Admin\ItemController;
use App\Http\Controllers\V1\Admin\DepartmentController;
use App\Http\Controllers\V1\Admin\SalaryController;
use App\Http\Controllers\V1\Admin\LeaveController;
use App\Http\Controllers\V1\Auth\ProfileController;
use App\Http\Controllers\V1\Auth\OrderController;
use App\Http\Controllers\V1\Frontend\DashBoardController;
use App\Http\Controllers\V1\Auth\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\GetAllProductController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 Route::get('/', [HomeController::class, 'index']);

Route::prefix('v1')->group(function() {

    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);  
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);  

    Route::post('update-profile', [ProfileController::class, 'updateProfile']); 
    Route::post('change-password', [ProfileController::class, 'changePassword']);
    Route::get('view-profile', [ProfileController::class, 'viewProfile']);  

    Route::post('logout', [LogoutController::class, 'logout']);

    Route::get('/email/verify/{user}/{hash}', [VerifyEmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');


    Route::middleware(['auth:sanctum'])->group(function() {

      Route::post('/email/verification-notification', [VerifYEmailController::class, 'resendNotification'])->name('verification.send');
   
        Route::group(['middleware' => ['role:manager'], 'prefix' => 'admin/'], function() {

   
     
              //  iterate through the v1 folder //

        $dirIterator = new RecursiveDirectoryIterator( __DIR__ .'/api/v1');

         //.. @var RecursiveDirectoryIterator |  \ RecursiveIteratorIterator $it ..//

        $it = new RecursiveIteratorIterator($dirIterator);

         //.. require the file in each iterator..//

        while($it->valid()) {
         if(! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php')
          {
             require $it->key();
          }

         $it->next();

         }


     //Route::apiResource('leaves', LeaveController::class);

  //});

    //...chef...//

    Route::group(['middleware' => ['role:employee'], 'prefix' => 'admin/'], function() {

      require __DIR__ .'/api/v1/admin/item.php';

      Route::post('employee-profile', [EmployeeProfile::class, 'employeeProfile']);
      Route::post('employee-password', [EmployeeProfile::class, 'change_password']);

     });

    Route::group(['middleware' => ['role:chef'], 'prefix' => 'admin/'], function() {

          require __DIR__ .'/api/v1/admin/item.php';

    });


    Route::middleware(['role:manager|customer', ])->group(function() {
       
      Route::get('orders', [OrderController::class, 'index']);
      Route::post('orders-remove', [OrderController::class, 'remove']);
      Route::get('orders-search/{search}', [OrderController::class, 'searchOrder']);
      
    });


  });

      //..Frontend..//

      Route::get('all-bookings', [DashBoardController::class, 'allBooking']);
      Route::get('count-bookings', [DashBoardController::class, 'countBooking']);
      
      Route::get('-search/{search}', [HomeController::class, 'searchFood']);

      Route::get('all-customers', [DashBoardController::class, 'allCustomer']);
      Route::get('count-customers', [DashBoardController::class, 'countcustomer']);

      Route::get('all-staffs', [DashBoardController::class, 'allStaff']);
      Route::get('count-staffs', [DashBoardController::class, 'countStaff']);

      Route::get('all-employees', [DashBoardController::class, 'allEmployee']);
      Route::get('count-employees', [DashBoardController::class, 'countEmployee']);

      Route::get('all-rooms', [DashBoardController::class, 'allRoom']);
      Route::get('count-rooms', [DashBoardController::class, 'countRoom']);

      Route::get('all-roomtypes', [DashBoardController::class, 'allRoomtype']);
      Route::get('count-roomtypes', [DashBoardController::class, 'countRoomtype']);

      Route::get('all-departments', [DashBoardController::class, 'allDepartment']);
      Route::get('count-departments', [DashBoardController::class, 'countDepartment']);

      Route::get('all-salarys', [DashBoardController::class, 'allSalary']);
      Route::get('count-salarys', [DashBoardController::class, 'countSalary']);

      Route::get('all-leaves', [DashBoardController::class, 'allLeave']);
      Route::get('count-leaves', [DashBoardController::class, 'countLeave']);

     

  });

