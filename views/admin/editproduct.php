<?php $this->layout("layouts/admin", ["title" => "Edit Product"]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-xl">Cập nhật sản phẩm</h2>
    </div>
    <form action="<?= '/admin/' . $this->e($product['id']) ?>" method="POST" enctype="multipart/form-data" id="all_products" class="w-full overflow-y-scroll">
        <div class="flex flex-col w-full md:w-[70%] mx-auto gap-4 border-2 rounded-xl shadow-md p-5 m-2">
            <h1>
                <?php
                    if (isset($errors) && is_array($errors)) {
                        foreach ($errors as $error) {
                            echo $this->e($error) . '<br>';
                        }
                    }
                ?>
            </h1>
            <div class="">
                <div>
                    <label for="name" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Tên sản phẩm</label>
                    <input value="<?= $this->e($product['name']) ?>" name="name" required autofocus type="text" id="name" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Product name..." />
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
                    <input value="<?= $this->e($product['price']) ?>" min="1" name="price" required autofocus type="number" id="price" class="<?= isset($errors['price']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10$" />
                    <?php if (isset($errors['price'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['price']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div>
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn loại sản phẩm</h2>
                <select name="type" class="outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500">
                    <option checked value="Nintendo_OLED">Nintendo Oled</option>
                    <option value="Nintendo_Old">Nintendo old</option>
                    <option value="Nintendo_Lite">Nintendo lite</option>
                </select>
            </div>
            <div class="">
                <div>
                    <label for="quantity" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Số lượng</label>
                    <input value="<?= $this->e($product['quantity']) ?>" min="1" name="quantity" required autofocus type="number" id="color" class="<?= isset($errors['quantity']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="20" />
                    <?php if (isset($errors['quantity'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['quantity']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="">
                <div>
                    <label for="5" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Mô tả</label>
                    <textarea value="<?= $this->e($product['description']) ?>" id="description" name="description" class="outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50  disabled:cursor-not-allowed disabled:bg-gray-50" rows="3" placeholder="Leave a message"><?= $this->e($product['description']) ?></textarea>
                </div>
            </div>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chính sản phẩm :</label>
            <input type="file" name="image" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_1" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image_1'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_2" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image_2'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiêt :</label>
            <input type="file" name="image_3" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image_3'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Chọn ảnh chi tiết :</label>
            <input type="file" name="image_4" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image_4'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <div class="text-center">
                <button type="submit" class="inline-block rounded-lg bg-[#4169E1] px-5 py-2.5 text-sm font-bold text-[#fff] shadow-md transition-all duration-300 hover:bg-blue-500 focus:ring focus:ring-blue-300 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Edit Product</button>
            </div>
        </div>

    </form>
</div>
<?php $this->stop() ?>