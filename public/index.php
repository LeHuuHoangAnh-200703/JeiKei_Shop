<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../bootstrap.php';

define('APPNAME', 'JeiKei Shop | Nintendo Switch');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@destroy');
$router->get('/register', '\App\Controllers\Auth\RegisterController@create');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@store');
$router->get('/login', '\App\Controllers\Auth\LoginController@create');
$router->post('/login', '\App\Controllers\Auth\LoginController@store');
$router->get('/orders/(\d+)', '\App\Controllers\HomeController@order');
$router->post('/orders/(\d+)', '\App\Controllers\HomeController@ordered');
$router->get('/detail/(\d+)', '\App\Controllers\HomeController@detail');
$router->get('/orderhistory', '\App\Controllers\HomeController@orderhistory');
$router->post('/search', '\App\Controllers\HomeController@search');
$router->get('/profile', '\App\Controllers\HomeController@showprofile');
$router->get('/editprofile', '\App\Controllers\HomeController@editprofile');
$router->post('/editprofile', '\App\Controllers\HomeController@saveprofile');
$router->get('/cart', '\App\Controllers\HomeController@cart');
$router->post('/add_to_cart/(\d+)', '\App\Controllers\HomeController@addtocart');
$router->post('/delete/(\d+)', '\App\Controllers\HomeController@removeProductCart');
$router->get('/feedback/(\d+)', '\App\Controllers\HomeController@feedback');
$router->post('/add_feedback/(\d+)', '\App\Controllers\HomeController@feedbackAction');
$router->get('/view_order', '\App\Controllers\HomeController@showOrder');
$router->post('/cancle_order/(\d+)', '\App\Controllers\HomeController@cancelOrder');
$router->get('/chatbox', '\App\Controllers\HomeController@showChatBox');
$router->post('/chat/send', '\App\Controllers\HomeController@sendMessage');
$router->get('/chat/messages/{chatId}', '\App\Controllers\HomeController@getMessages');
// Admin routes
$router->post('/admin/logout', '\App\Controllers\Auth\AdminLoginController@destroy');
$router->get('/admin/login', '\App\Controllers\Auth\AdminLoginController@create');
$router->post('/admin/login', '\App\Controllers\Auth\AdminLoginController@store');
$router->get('/admin/register', '\App\Controllers\Auth\AdminRegisterController@create');
$router->post('/admin/register', '\App\Controllers\Auth\AdminRegisterController@store');
$router->get('/admin/addproduct', '\App\Controllers\AdminController@create');
$router->post('/admin/addproduct', '\App\Controllers\AdminController@store');
$router->get('/admin/editproduct/(\d+)', '\App\Controllers\AdminController@edit');
$router->post('/admin/(\d+)', '\App\Controllers\AdminController@update');
$router->post('/admin/delete/(\d+)', '\App\Controllers\AdminController@destroy');
$router->get('/admin/customers', '\App\Controllers\AdminController@show');
$router->post('/admin/delete/user/(\d+)', '\App\Controllers\AdminController@deleteuser');
$router->get('/admin/orders', '\App\Controllers\AdminController@showorders');
$router->post('/admin/deleteorder/(\d+)', '\App\Controllers\AdminController@deleteorder');
$router->post('/admin/updateorder/(\d+)', '\App\Controllers\AdminController@updateorder');
$router->get('/admin/feedback', '\App\Controllers\AdminController@showfeedback');
$router->get('/admin/addcoupon', '\App\Controllers\AdminController@createcoupon');
$router->post('/admin/addcoupon', '\App\Controllers\AdminController@addcoupon');
$router->get('/admin/coupon', '\App\Controllers\AdminController@showcoupon');
$router->post('/admin/deletecoupon/(\d+)', '\App\Controllers\AdminController@destroyCoupon');
$router->get('/admin/editcoupon/(\d+)', '\App\Controllers\AdminController@editCoupon');
$router->post('/admin/coupon/(\d+)', '\App\Controllers\AdminController@updateCoupon');
$router->get('/admin/warehouse', '\App\Controllers\AdminController@statistics');
$router->post('/admin/search', '\App\Controllers\AdminController@statistics');
$router->get('/admin/chatbox', '\App\Controllers\AdminController@showChatBox');
$router->post('/admin/searchUser', '\App\Controllers\AdminController@searchUser');
// Default routes
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home', '\App\Controllers\HomeController@index');
$router->get('/admin', '\App\Controllers\AdminController@index');
$router->set404('\App\Controllers\Controller@sendNotFound');
$router->run();

/* Đây là một đoạn mã PHP được sử dụng để xử lý các yêu cầu đến từ người dùng thông qua một router. 
Đầu tiên, mã này sử dụng hàm `ini_set()` để bật hiển thị lỗi và báo cáo tất cả các lỗi. Sau đó, 
nó yêu cầu tệp bootstrap.php để khởi tạo ứng dụng. 
Tiếp theo, nó định nghĩa hằng số APPNAME với giá trị "My Phonebook" và bắt đầu phiên làm việc với 
hàm `session_start()`. 
Sau đó, nó tạo một đối tượng Router từ thư viện Bramus\Router và định nghĩa các tuyến đường cho
 các yêu cầu đăng nhập, đăng ký và liên lạc. 
Cuối cùng, nó chạy router bằng cách gọi phương thức `run()` để xử lý yêu cầu từ người dùng.


Thư viện router được sử dụng trong đoạn mã này là Bramus Router. Đây là một thư viện PHP nhẹ và dễ sử dụng để xử lý các yêu cầu đến từ người dùng và định tuyến chúng đến các phương thức xử lý tương ứng.
Bramus Router hỗ trợ các phương thức HTTP như GET, POST, PUT, DELETE và PATCH. Nó cũng hỗ trợ các tham số động trong các tuyến đường và cho phép định nghĩa các bộ lọc để kiểm tra các yêu cầu đến.
Để sử dụng Bramus Router, bạn cần tải thư viện và đưa nó vào ứng dụng của mình. Sau đó, bạn có thể định nghĩa các tuyến đường và phương thức xử lý tương ứng bằng cách sử dụng các phương thức của đối tượng Router.
Ví dụ:
```php
$router = new \Bramus\Router\Router();
$router->get('/', function() {
    echo 'Hello World!';
});
$router->run();
```
Trong ví dụ này, chúng ta tạo một đối tượng Router và định nghĩa một tuyến đường cho phương thức GET với đường dẫn là "/" và phương thức xử lý là một hàm in ra chuỗi "Hello World!". Cuối cùng, chúng ta chạy router bằng cách gọi phương thức `run()`.

GET và POST là hai phương thức HTTP được sử dụng để gửi dữ liệu từ trình duyệt của người dùng đến máy chủ web. Tuy nhiên, chúng có những khác biệt như sau:

1. GET: Phương thức GET được sử dụng để yêu cầu dữ liệu từ máy chủ web. Dữ liệu được gửi dưới dạng các tham số trên URL. Vì vậy, các tham số được hiển thị trên thanh địa chỉ của trình duyệt. Phương thức GET thường được sử dụng để lấy dữ liệu từ máy chủ web, ví dụ như truy vấn cơ sở dữ liệu hoặc lấy thông tin từ các API.

2. POST: Phương thức POST được sử dụng để gửi dữ liệu từ trình duyệt của người dùng đến máy chủ web. Dữ liệu được gửi dưới dạng các tham số trong phần thân của yêu cầu HTTP. Vì vậy, các tham số không được hiển thị trên thanh địa chỉ của trình duyệt. Phương thức POST thường được sử dụng để gửi dữ liệu đến máy chủ web, ví dụ như đăng ký tài khoản hoặc gửi thông tin qua một biểu mẫu.

3. Bảo mật: Phương thức POST được coi là an toàn hơn so với GET vì dữ liệu được gửi dưới dạng ẩn danh và không hiển thị trên thanh địa chỉ của trình duyệt. Điều này làm giảm khả năng bị tấn công bởi các kẻ tấn công.

4. Giới hạn kích thước dữ liệu: Phương thức GET có giới hạn kích thước dữ liệu được gửi đi, trong khi phương thức POST không có giới hạn kích thước dữ liệu. Tuy nhiên, các máy chủ web có thể thiết lập giới hạn kích thước dữ liệu cho phương thức POST để tránh các cuộc tấn công từ phía người dùng.

Tóm lại, GET và POST đều có vai trò quan trọng trong việc gửi dữ liệu từ trình duyệt của người dùng đến máy chủ web. Tuy nhiên, chúng có những khác biệt về cách sử dụng, bảo mật và giới hạn kích thước dữ liệu.

*/