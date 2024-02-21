<?php 
use Phroute\Phroute\RouteCollector;
use App\Controllers\CategoryController;
use App\Controllers\CourseController;
use App\Controllers\AccountController;
use App\Controllers\HomeController;
use App\Controllers\VideoController;
use App\Controllers\BillController;

$url = isset($_GET['url']) ? $_GET['url']: '/';
$router = new RouteCollector();

$router->get('/', [HomeController::class, 'viewHomeUser']);    # match only get requests
$router->get('/register', [AccountController::class, 'viewRegister']);   
$router->get('/login', [AccountController::class, 'viewLogin']);   


$router->post('/register', [AccountController::class, 'createAccount']);   
$router->post('/login', [AccountController::class, 'checkLogin']);   

$router->filter('auth', function(){
    if(!isset($_SESSION['user'])){
        header('location: '.BASE_URL.'/login');
        return false;
    }       
});

// admin
$router->group(['before' => 'auth', 'prefix' => '/admin'], function($router){
    $router->get( '',[HomeController::class, 'viewHomeAdmin']);
    // course
    $router->group(['prefix' => '/course'], function($router){
        $router->get('/list', [CourseController::class, 'viewListAdmin']);
        $router->get('/add', [CourseController::class, 'viewAddAdmin']);
        $router->post('/add', [CourseController::class, 'insertCourse']);
        $router->get('/{id}/edit', [CourseController::class, 'viewEditAdmin']);
        $router->post('/update', [CourseController::class, 'editCourse']);
        $router->get('/{id}/delete', [CourseController::class, 'removeCourse']);
    });

    // category 
    $router->group(['prefix' => '/category'], function($router){
        $router->get('/list', [CategoryController::class, 'viewListAdmin']);
        $router->get('/add', [CategoryController::class, 'viewAddAdmin']);
        $router->post('/add', [CategoryController::class, 'insertCategory']);
        $router->get('/{id}/edit', [CategoryController::class, 'viewEditAdmin']);
        $router->post('/update', [CategoryController::class, 'editCategory']);
        $router->get('/{id}/delete', [CategoryController::class, 'removeCategory']);
    });

    // video
    $router->group(['prefix' => '/video'], function($router){
        $router->get('/list', [VideoController::class, 'viewListAdmin']);
        $router->get('/{id}/add', [VideoController::class, 'viewAddAdmin']);
        $router->post('/add', [VideoController::class, 'addVideo']);
        $router->get('/{id}/edit', [VideoController::class, 'viewEditVideo']);
        $router->post('/edit', [VideoController::class, 'editVideo']);
        $router->get('/delete/{id}', [VideoController::class, 'removeVideo']);
    });


});


// user
$router->get('/detail-course/{id}', [CourseController::class, 'detailCourse']);

$router->group(['before' => 'auth'], function($router){
    $router->post('/bill-course', [BillController::class, 'bill']);
    $router->get('/thank/{id}', [BillController::class, 'thank']);
    

});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);