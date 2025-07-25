<?php
$baseURL = "http://ecommercewebsite.localhost/";
$imgLogo = $baseURL . "./assets/nintendo-switch-logo-E671C9A32A-seeklogo.com.png";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php echo $imgLogo ?>" />
    <title><?= $this->e($title) ?></title>
    <!-- <link rel="stylesheet" href="./css/output.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caprasimo&family=Fruktur:ital@1&family=Kanit:wght@400;500&family=Kaushan+Script&family=Lilita+One&family=Luckiest+Guy&family=Lunasima&family=Mr+Dafoe&family=Open+Sans:wght@500;600&family=Orbitron:wght@600&family=Permanent+Marker&family=Poppins:wght@500&family=Roboto+Slab&family=Staatliches&family=Yellowtail&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    #dashboarContent {
        height: calc(100% - 64px);
    }

    @media screen and (max-width: 768px) {
        #dashboarContent {
            height: calc(100% - 120px);
        }
    }

    #dashboard {
        height: calc(100vh - 44px);
    }

    #all_products {
        height: calc(100% - 60px);
    }
</style>

<body style="font-family: 'Poppins',sans-serif;">
    <div class="relative w-full max-w-[1200px] overflow-x-hidden mx-auto">
        <div id="dashboard" class="w-full h-full sm:flex">
            <!-- Dashboard controller -->
            <div class="w-full sm:w-[20%] h-[64px] sm:h-full bg-[#272a2f]">
                <div class="flex justify-between sm:justify-center items-center sm:flex-col gap-x-2 sm:gap-y-1 w-full h-[60px] sm:h-[100px] px-4 sm:px-0 bg-[#DC143C] text-white text-xl">
                    <div id="opensidebar" class="block sm:hidden">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="w-12 h-12 p-2 rounded-full bg-[#fff] border-[3px] border-[#333] flex items-center justify-center">
                            <img src="<?php $baseURL ?>/assets../png-transparent-nintendo-switch-wii-u-lumo-logo-nintendo-angle-text-nintendo-removebg-preview.png" class="w-full h-full" alt="">
                        </div>
                        <div class="flex flex-col">
                            <p class="font-bold text-[18px]">JeiKei Shop</p>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:flex flex-col pt-4">
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/warehouse"><i class="fa-solid fa-chart-simple"></i> Thống kê</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin"><i class="fa-solid fa-house"></i> Sản phẩm</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/register"><i class="fa-solid fa-user-plus"></i> Thêm quản trị</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/customers"><i class="fa-solid fa-users"></i> Người dùng</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/addproduct"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/feedback"><i class="fa-solid fa-comments"></i> Đánh giá</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/coupon"><i class="fa-solid fa-gift"></i> Mã giảm giá</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/addcoupon"><i class="fa-solid fa-ticket"></i> Thêm mã giảm giá</a>
                    <a class="w-full flex items-center text-[14px] gap-x-2 font-medium px-4 py-[8px] text-white hover:bg-[#DC143C] hover:text-[#fff] transition-all duration-300" href="/admin/chatbox"><i class="fa-solid fa-comments"></i> Trò chuyện</a>
                </div>
            </div>

            <!-- Dashboard content -->
            <div class="w-full sm:w-[80%] h-full">
                <div class="h-[60px] border border-b-2 border-b-[#272a2f] flex justify-between px-8 items-center">
                    <div>
                        <p class="font-bold text-[16px]"><?= $this->e(\App\SessionGuard::admin()->name) ?></p>
                        <small class="text-[12px] font-semibold"><?= $this->e(\App\SessionGuard::admin()->email) ?></small>
                    </div>
                    <form action="/admin/logout" method="post">
                        <button class="bg-[#DC143C] text-[14px] px-4 py-2 font-semibold rounded-lg text-white transition-all duration-200 hover:bg-[#333]">Đăng xuất</button>
                    </form>
                </div>
                <div id="dashboarContent" class="w-full bg-slate-50">
                    <?= $this->section("page") ?>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div id="sidebar" class="fixed bg-[#272a2f] w-[80%] h-screen top-0 -left-[100%] p-5 transition-all duration-300">
            <div id="closesidebar" class="text-white mb-2"><i class="fa-solid fa-arrow-left"></i></div>
            <div>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/warehouse"><i class="fa-solid fa-chart-simple"></i> Thống kê</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/register"><i class="fa-solid fa-user-plus"></i> Thêm quản trị</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/customers"><i class="fa-solid fa-users"></i> Người dùng</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/addproduct"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/feedback"><i class="fa-solid fa-comments"></i> Đánh giá</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/coupon"><i class="fa-solid fa-gift"></i> Mã giảm giá</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/addcoupon"><i class="fa-solid fa-ticket"></i> Thêm mã giảm giá</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin"><i class="fa-solid fa-house"></i> Sản phẩm</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/chatbox"><i class="fa-solid fa-comments"></i> Trò chuyện</a>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-[#24355a] text-[#fff] p-5 w-full font-medium">
        <div class="max-w-[1200px] mx-auto flex justify-center flex-col md:flex-row md:justify-between items-center">
            <div class="flex flex-col md:flex-row md:text-sm">
                <p class="mr-5">© 2023 JeiKei, Inc. All rights reserved.</p>
                <p class="md:border-l-2 md:border-l-[#fff] px-4">Designed and Managed by JeiKei</p>
            </div>
            <div class="md:text-sm">
                <p>Products provided by Nintendo | JeiKei</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?= $this->section("page_specific_js") ?>
    <script>
        $(document).ready(function() {
            // Show notify 
            const successNotification = $('.success-notification');
            if (successNotification.length > 0) {
                successNotification.css('display', 'block');
            }
            setTimeout(() => {
                successNotification.css('display', 'none');
            }, 3000);


            // Toggle dashboard sidebar
            $("#closesidebar").click(function() {
                $("#sidebar").removeClass("left-0");
            });
            $("#opensidebar").click(function() {
                $("#sidebar").addClass("left-0");
            });

            function updateChat(userName, userAvatar) {
                $(".chat-window .user-name").text(userName);
                $(".chat-window .user-avatar").css("background-image", "url(" + userAvatar + ")");
            }

            $(".user-item").each(function(index, item) {
                $(item).click(function() {
                    var userName = $(this).data("name");
                    var userAvatar = $(this).data("avatar");

                    if ($(window).width() >= 1024) {
                        // Cập nhật khung chat nếu kích thước màn hình >= 1024px
                        updateChat(userName, userAvatar);
                    } else {
                        // Ẩn chat và hiện chat window như logic ban đầu nếu kích thước màn hình < 1024px
                        $(".chat").hide();
                        $(".chat-window").show();
                        updateChat(userName, userAvatar);
                    }
                });
            });

            $(".back-Chat").click(function() {
                $(".chat").show();
                $(".chat-window").hide();
            });
        })
    </script>

</body>

</html>