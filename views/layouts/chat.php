<?php
$baseURL = "http://ecommercewebsite.localhost/";
if (\App\SessionGuard::user() !== null) {
    $userImage = \App\SessionGuard::user()->image;
    $imageURL = $baseURL . $userImage;
} else {
    $imageURL = $baseURL . "assets/user_avatar.jpg";
}
$imgLogo = $baseURL . "./assets/nintendo-switch-logo-E671C9A32A-seeklogo.com.png";
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title><?= $this->e($title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php echo $imgLogo ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caprasimo&family=Fruktur:ital@1&family=Kanit:wght@400;500&family=Kaushan+Script&family=Lilita+One&family=Luckiest+Guy&family=Lunasima&family=Mr+Dafoe&family=Open+Sans:wght@500;600&family=Orbitron:wght@600&family=Permanent+Marker&family=Poppins:wght@500&family=Roboto+Slab&family=Staatliches&family=Yellowtail&display=swap" rel="stylesheet">
    <!-- Use tailwind library through cdn (Content Delivery Network) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwindcss local using -->
    <!-- <link rel="stylesheet" href="./css/test.css"> -->
</head>
<style>
    .chatBox {
        height: calc(100vh - 230px);
    }

    .chatContent {
        height: calc(100vh - 360px);
    }

    @media (max-width: 1024px) {
        .chatBox {
            height: calc(100vh - 240px);
        }

        .chatContent {
            height: calc(100vh - 330px);
        }
    }

    @media (max-width: 768px) {
        .chatBox {
            height: calc(100vh - 230px);
        }

        .chatContent {
            height: calc(100vh - 360px);
        }
    }

    @media (max-width: 480px) {
        .chatBox {
            height: calc(100vh - 230px);
        }

        .chatContent {
            height: calc(100vh - 360px);
        }
    }
</style>

<body class="relative" style="font-family: 'Poppins',sans-serif;">
    <div id="content" class="relative w-full max-w-[1200px] m-auto md:flex-row min-h-screen overflow-x-hidden hidden">
        <!-- header -->
        <header name="top">
            <nav class="flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="flex items-center gap-x-4">
                    <div class="lg:hidden bar relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                    </div>
                    <a href="/home" class="test text-[22px] md:text-[24px] font-bold uppercase">JEIKEI <span class="text-[#DC143C]">SHOP</span></a>
                </button>
                <div class="relative flex items-center justify-start">
                    <form action="/search" method="post" class="hidden md:block">
                        <input name="search" type="text" placeholder="Tìm kiếm sản phẩm ..." class="relative border-[1.2px] outline-none border-[#646464] bg-transparent w-[250px] p-2 rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <button type="submit">
                            <div class="absolute top-0 right-0 rounded-e-md translate-x-[50%] bg-[#DC143C] px-4 py-[8.7px] cursor-pointer"><i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i></div>
                        </button>
                    </form>
                </div>
                <ul class="hidden lg:flex">
                    <li class="px-[15px] lg:px-[20px] text-[18px] group">
                        <a href="/" class="font-bold">Trang chủ</a>
                        <div class="h-[2px] bg-[#DC143C] scale-x-0 group-hover:scale-100 rounded-full transition-all ease-out origin-left duration-500"></div>
                    </li>
                    <li class="px-[15px] lg:px-[20px] text-[18px] group">
                        <a href="/view_order" class="font-bold">Đơn hàng của bạn</a>
                        <div class="h-[2px] bg-[#DC143C] scale-x-0 group-hover:scale-100 rounded-full transition-all ease-out origin-left duration-500"></div>
                    </li>
                </ul>
                <div class="flex justify-center items-center gap-4">
                    <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover" style="background-image:url('<?php echo $imageURL; ?>')"></div>
                    <a href="/cart" class="relative">
                        <div class="relative border border-[#a3a3a3] rounded">
                            <i class="fa-sharp fa-solid fa-cart-shopping p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                        <div class="absolute top-[-25%] right-[-20%] bg-[#DC143C] w-6 h-6 flex justify-center items-center rounded-[50%] font-medium text-[#fff] count_products"><?php if (isset($_SESSION['cart'])) {
                                                                                                                                                                                        print_r(count($_SESSION['cart']));
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "0";
                                                                                                                                                                                    }  ?></div>
                    </a>
                </div>
            </nav>
            <div class="sidebar fixed top-0 -left-[100%] bg-[#fff] p-4 w-full h-full z-40">
                <div class="mb-4">
                    <button class="closed">
                        <div class="relative border border-[#a3a3a3] rounded w-[40px] h-[40px]">
                            <i class="fa-solid fa-x p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                    </button>
                </div>
                <ul class="flex flex-col">
                    <form action="/search" method="post" class="relative mb-4">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm ..." class="relative border-[1px] border-[#646464] bg-transparent w-full p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <button type="submit">
                            <div class="absolute top-0 right-0 rounded-e-md bg-[#DC143C] px-3 py-[6.8px] cursor-pointer"><i class="text-[#fff] fa-solid fa-magnifying-glass cursor-pointer"></i></div>
                        </button>
                    </form>
                    <li class="pb-[15px]">
                        <a href="/" class="border-b-2 border-transparent hover:border-b-2 hover:border-[#DC143C] font-semibold text-[20px] transition-colors hover:text-[#DC143C]">Trang chủ</a>
                    </li>
                    <li class="pb-[15px]">
                        <a href="/view_order" class="border-b-2 border-transparent hover:border-b-2 hover:border-[#DC143C] font-semibold text-[20px] transition-colors hover:text-[#DC143C]">Đơn hàng của bạn</a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- Navigation button to Home page-->
        <!-- <div class="px-4">
            <a href="/" class="font-bold border-b-2 border-transparent hover:border-b-2 hover:border-[#DC143C] transition-all duration-300 text-[20px]">Trang chủ</a>
        </div> -->
        <!-- main content -->
        <?= $this->section("page") ?>
        <!-- shopping cart -->

        <!-- Dropdown Menu -->
        <div id="user_info_panel" class="absolute top-14 overflow-hidden right-[-100%] z-10 mt-2 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg transition-all">
            <div class="py-3 px-4">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="relative h-10 w-10">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex justify-center items-center bg-center bg-cover" style="background-image:url('<?php echo $imageURL; ?>')">
                        </div>
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                    </div>
                    <div class="text-xs">
                        <div class="whitespace-nowrap text-ellipsis overflow-hidden">
                            <p class="font-medium text-gray-700"><?php if (\App\SessionGuard::user()) {
                                                                        echo $this->e(\App\SessionGuard::user()->name);
                                                                    } else {
                                                                        echo "Tên của bạn";
                                                                    } ?></p>
                        </div>
                        <div class="whitespace-nowrap text-ellipsis overflow-hidden">
                            <p class="text-gray-400"><?php if (\App\SessionGuard::user()) {
                                                            echo $this->e(\App\SessionGuard::user()->email);
                                                        } else {
                                                            echo "Email";
                                                        } ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <a href="/profile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-regular fa-user"></i> Hồ sơ</a>
                <a href="/editprofile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-solid fa-wrench"></i> Chỉnh sửa hồ sơ</a>
            </div>
            <div class="p-1">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                    <?php if (\App\SessionGuard::user()) {
                        echo "Đăng xuất";
                    } else {
                        echo "Đăng nhập";
                    } ?>
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">⌥</kbd>
                        <kbd class="min-w-[1em] font-sans">⇧</kbd>
                        <kbd class="min-w-[1em] font-sans">Q</kbd>
                    </span>
                    <?php if (\App\SessionGuard::user()) {
                        echo '<form id="logout-form" class="d-none" action="/logout" method="POST">';
                    } else {
                        echo '<form id="logout-form" class="d-none" action="/login" method="POST">';
                    } ?>
                    </form>
                </a>
            </div>
        </div>

        <!-- Black background when open Side bar -->
        <!-- <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-100"></div> -->

        <!-- Arrow to top -->
        <a href="#top" id="backtotop" class="hidden fixed bottom-5 right-5 z-30 w-12 h-12 bg-[#DC143C] rounded-[10px] border-[3px] border-[#333] justify-center items-center text-white font-bold shadow-lg transition-all duration-500 hover:-translate-y-5"><i class="fa-solid fa-angles-up"></i></a>
    </div>
    <!-- footer -->
    <footer class="bg-[#24355a] text-[#fff] p-5 w-full font-medium">
        <div class="max-w-[1200px] mx-auto flex justify-center flex-col lg:flex-row md:justify-between items-center">
            <div class="flex flex-col md:flex-row md:text-sm">
                <p class="mr-5">© 2023 JeiKei, Inc. All rights reserved.</p>
                <p class="md:border-l-2 md:border-l-[#fff] px-4">Designed and Managed by JeiKei</p>
            </div>
            <div class="md:text-sm">
                <p>Products provided by Nintendo</p>
            </div>
        </div>
    </footer>
    <!-- Loading -->
    <div id="loading" class="fixed top-0 left-0 w-full h-screen bg-[rgba(0,0,0,.7)] flex justify-center items-center">
        <div class='flex space-x-2 justify-center items-center h-screen'>
            <div class='h-5 w-5 bg-[#DC143C] rounded-full animate-bounce [animation-delay:-0.3s]'></div>
            <div class='h-5 w-5 bg-[#DC143C] rounded-full animate-bounce [animation-delay:-0.15s]'></div>
            <div class='h-5 w-5 bg-[#DC143C] rounded-full animate-bounce'></div>
        </div>
    </div>

    <!-- Javascript and Jquery code -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Show loading when browser is loading datas
            $(window).on("load", function() {
                $("#loading").fadeOut("slow");
                $("#content").fadeIn("slow");
            })

            // Show a notification when user places an order successfully 
            const successNotification = $(".success-notification");
            console.log(successNotification)
            if (successNotification.length > 0) {
                successNotification.css("display", "block");
            }
            setTimeout(() => {
                successNotification.css("display", "none");
            }, 3000);

            // show notify when user hit ADD button in home page
            $(".add_to_cart").click(function() {
                const notify = $("#added_to_cart_successfully");
                notify.css("display", "block");
                setTimeout(() => {
                    notify.css("display", "none");
                }, 4000);
            });

            //sidebar
            $(".bar").click(function() {
                $(".sidebar").toggleClass("left-0");
            });

            $(".closed").click(function() {
                $(".sidebar").toggleClass("left-0");
            });


            // Hiển thị hình ảnh khi tải hình ảnh lên
            $("#imageInput").change(function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#imagePreview").removeClass("hidden");
                    $("#image_icon").addClass("hidden");
                    $("#imagePreview").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            });

            // ẩn hiện button to top
            $(window).scroll(function() {
                if ($(this).scrollTop() > 500) {
                    $("#backtotop").addClass("flex");
                    $("#backtotop").removeClass("hidden");
                } else {
                    $("#backtotop").addClass("hidden");
                    $("#backtotop").removeClass("flex");
                }
            });
        });
    </script>
</body>

</html>