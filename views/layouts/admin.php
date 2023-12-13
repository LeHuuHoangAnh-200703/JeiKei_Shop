<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./assets/logo.png"/>

    <title><?= $this->e($title) ?></title>
    <!-- <link rel="stylesheet" href="./css/output.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<style>
    #dashboarContent {
        height: calc(100% - 60px);
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

<body>
    <div class="relative w-full max-w-[1200px] overflow-x-hidden mx-auto">
        <div id="dashboard" class="w-full sm:flex">
            <!-- Dashboard controller -->
            <div class="w-full sm:w-[20%] h-[60px] sm:h-full bg-[#272a2f]">
                <div class="flex justify-between sm:justify-center items-center sm:flex-col gap-x-2 sm:gap-y-1 w-full h-[60px] sm:h-[100px] px-4 sm:px-0 bg-[#DC143C] text-white text-xl">
                    <div id="opensidebar" class="block sm:hidden">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div>
                        <i class="fa-solid fa-fire text-[#fff]"></i>
                        <a href="/admin" class="text-[20px] font-semibold">Dashboard</a>
                    </div>
                </div>
                <div class="hidden sm:flex flex-col bg-[#272a2f] pt-4">
                    <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black transition-all duration-300" href="/admin/register"><i class="fa-solid fa-user-plus"></i> Add Admin</a>
                    <hr>
                    <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black transition-all duration-300" href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
                    <hr>
                    <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black transition-all duration-300" href="/admin/customers"><i class="fa-solid fa-users"></i> Customers List</a>
                    <hr>
                    <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black transition-all duration-300" href="/admin/addproduct"><i class="fa-solid fa-plus"></i> Add product</a>
                </div>
            </div>

            <!-- Dashboard content -->
            <div class="w-full sm:w-[80%] h-full">
                <div class="h-[60px] border border-b-2 border-b-[#272a2f] flex justify-between px-8 items-center">
                    <div>
                        <p class="font-bold text-[16px]"><?= $this->e(\App\SessionGuard::admin()->name) ?></p>
                        <small class="text-[#333f48] font-medium"><?= $this->e(\App\SessionGuard::admin()->email) ?></small>
                    </div>
                    <form action="/admin/logout" method="post">
                        <button class="bg-[#DC143C] px-3 py-1 font-semibold rounded-lg text-white transition-all duration-200 hover:bg-[#333]">Log out</button>
                    </form>
                </div>
                <div id="dashboarContent" class="w-full">
                    <?= $this->section("page") ?>
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
                    <p>Products provided by BANDAI</p>
                </div>
            </div>
        </footer>
        <!-- Sidebar -->
        <div id="sidebar" class="fixed bg-[#272a2f] w-[80%] h-screen top-0 -left-[100%] p-5 transition-all duration-300">
            <div id="closesidebar" class="text-white mb-2"><i class="fa-solid fa-arrow-left"></i></div>
            <div> 
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/register"><i class="fa-solid fa-user-plus"></i> Add Admin</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/customers"><i class="fa-solid fa-users"></i> Customers List</a>
                <hr>
                <a class="w-full flex items-center gap-x-1 px-4 py-2 text-white hover:bg-white hover:text-black" href="/admin/addproduct"><i class="fa-solid fa-plus"></i> Add product</a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?= $this->section("page_specific_js") ?>
    <script>
        $(document).ready(function() {
            // Show notify 
            const successNotification = $('#success-notification');
            if (successNotification.length > 0) {
                successNotification.css('display', 'block');
            }
            setTimeout(() => {
                successNotification.css('display', 'none');
            }, 5000);


            // Toggle dashboard sidebar
            $("#closesidebar").click(function() {
                $("#sidebar").removeClass("left-0");
            });
            $("#opensidebar").click(function() {
                $("#sidebar").addClass("left-0");
            })



            // $('.bar').click(function() {
            //     $('.sidebar').removeClass('left-[-100%]');
            // })
            // $('.closed').click(function() {
            //     $('.sidebar').addClass('left-[-100%]');
            // })
            // $("#user_info").click(function() {
            //     $("#user_info_panel").toggleClass("right-4");
            // });
        })
    </script>

</body>

</html>