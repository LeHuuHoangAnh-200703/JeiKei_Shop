<?php $this->layout("layouts/admin", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <?php if (isset($success)) { ?>
        <div class="success-notification text-green-600 bg-green-100 border-[1px] border-[#3CB371] px-4 py-[10px] fixed top-0 right-0 m-4 shadow-md shadow-green-200 animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Chúc mừng</p>
            <p class="font-bold"><?php echo $success; ?></p>
        </div>
    <?php } ?>
    <?php if (isset($errors)) {?> 
        <div class="success-notification text-[#DC143C] bg-red-100 border-[1px] border-[#DC143C] px-4 py-2 fixed top-0 right-0 m-4 shadow-md shadow-red-300 animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-triangle-exclamation"></i> Thất bại</p>
            <p class="font-bold"><?php echo $errors; ?></p>
        </div> 
    <?php } ?>
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-2xl">Thêm sản phẩm</h2>
    </div>
    <form action="/admin/addproduct" method="POST" enctype="multipart/form-data" id="all_products" class="w-full overflow-y-scroll">
        <div class="flex flex-col w-full md:w-[70%] mx-auto gap-4 border-2 rounded-xl shadow-md p-5 m-2">
            <div class="">
                <div>
                    <label for="name" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Tên sản phẩm</label>
                    <input name="name" autofocus type="text" id="name" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Nhập tên sản phẩm ..." />
                    <?php if (isset($errors['name'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="">
                <div>
                    <label for="price" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Giá</label>
                    <input min="1" name="price" autofocus type="number" id="price" class="<?= isset($errors['price']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10VNĐ" />
                    <?php if (isset($errors['price'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['price']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="flex flex-col justify-center w-full">
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn loại sản phẩm</h2>
                <select name="type" class="outline-0 p-2 block w-[80%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                    <option checked value="Nintendo_OLED">Nintendo Oled</option>
                    <option value="Nintendo_Old">Nintendo old</option>
                    <option value="Nintendo_Lite">Nintendo lite</option>
                </select>
            </div>

            <div class="flex flex-col justify-center w-full">
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Màn hình</h2>
                <select name="screen" class="outline-0 p-2 block w-[80%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                    <option checked value="OLED">OLED</option>
                    <option value="LCD">LCD</option>
                </select>
            </div>

            <div class="flex flex-col justify-center w-full">
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Độ phân giải</h2>
                <select name="type-resolution" class="outline-0 p-2 block w-[80%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                    <option checked value="1280x720 pixels">1280x720 pixels</option>
                    <option value="1080p khi dùng HDMI ở chế độ TV, 720p khi ở chế độ handheld">1080p khi dùng HDMI ở chế độ TV, 720p khi ở chế độ handheld</option>
                </select>
            </div>

            <div class="flex flex-col justify-center w-full">
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Bộ nhớ trong</h2>
                <select name="type-memory" class="outline-0 p-2 block w-[80%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                    <option checked value="32GB">32GB</option>
                    <option value="64GB">64GB</option>
                </select>
            </div>

            <div class="">
                <div>
                    <label for="quantity" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Số lượng</label>
                    <input min="1" name="quantity" autofocus type="number" id="color" class="<?= isset($errors['quantity']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="20" />
                    <?php if (isset($errors['quantity'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['quantity']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="">
                <div>
                    <label for="5" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Miêu tả</label>
                    <textarea id="description" name="description" class="outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50  disabled:cursor-not-allowed disabled:bg-gray-50" rows="3" placeholder="Hãy thêm mô tả ..."></textarea>
                </div>
            </div>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chính sản phẩm :</label>
            <input type="file" name="image" class="<?= isset($errors['image']) ? 'text-red-500' : 'text-[#4169E1]' ?> font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_1" class="<?= isset($errors['image']) ? 'text-red-500' : 'text-[#4169E1]' ?> font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_2" class="<?= isset($errors['image']) ? 'text-red-500' : 'text-[#4169E1]' ?> font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiêt :</label>
            <input type="file" name="image_3" class="<?= isset($errors['image']) ? 'text-red-500' : 'text-[#4169E1]' ?> font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_4" class="<?= isset($errors['image']) ? 'text-red-500' : 'text-[#4169E1]' ?> font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <div class="text-center">
                <button type="submit" class="inline-block rounded-lg bg-[#4169E1] px-5 py-2.5 text-sm font-bold text-[#fff] shadow-md transition-all duration-300 hover:bg-blue-500 focus:ring focus:ring-blue-300 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Thêm sản phẩm</button>
            </div>
        </div>
    </form>
</div>
<?php $this->stop() ?>