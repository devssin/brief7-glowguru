<?php require APPROOT . "/views/inc/header.php" ?>


<div class="containner py-16 bg-gray-100">
    <div class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
        
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Edit product (<span class="text-xs text-gray-400"><?= $data['name']?></span>) </h2>
        <div class="pt-4">
            <img src="<?=$data['image']?>" alt="" class="w-10 h-10 rounded-full mx-auto">
        </div>
        <form action="<?=URLROOT?>/dashboard/edit/<?=$data['id']?>" method="post" enctype="multipart/form-data">
            <div class="pt-4">
                <label for="email" class="text-sm text-gray-600 block ">Product Name</label>
                <input type="text" name="name" placeholder="Enter Product Name" class="form-input block w-full mt-1 text-sm  border border-[#ebbb89]  rounded-md  focus:ring-0" value="<?= $data['name'] ?>">
                <?php if (!empty($data['name_err'])) : ?>
                    <span class="text-red-400 text-sm "><?= $data['name_err'] ?></span>
                <?php endif; ?>
            </div>
            <div class="pt-4">
                <label for="image" class="text-sm text-gray-600 block ">Product Image</label>
                <input type="file" name="image" placeholder="Enter Product image" class="form-input block w-full mt-1 text-sm text-gray-500 border border-[#ebbb89]  rounded-md  focus:ring-0" value="<?= $data['image'] ?>">
                <?php if (!empty($data['image_err'])) : ?>
                    <span class="text-red-400 text-sm "><?= $data['image_err'] ?></span>
                <?php endif; ?>
            </div>
            <div class="pt-4">
                <label for="description" class="text-sm text-gray-600 block ">Product Description</label>
                <textarea name="description" placeholder="Enter Product image" class="form-textarea block w-full mt-1 text-sm  border border-primary  rounded-md  focus:ring-0 px-2 py-4">
                <?= $data['description'] ?>
                </textarea>
                <?php if (!empty($data['description_err'])) : ?>
                    <span class="text-red-400 text-sm "><?= $data['description_err'] ?></span>
                <?php endif; ?>
            </div>

            <div class="pt-4">
                <label for="price" class="text-sm text-gray-600 block ">Product Price</label>
                <input type="number" name="price" placeholder="Enter Product Price" class="form-input block w-full mt-1 text-sm  border border-[#ebbb89]  rounded-md  focus:ring-0" value="<?= $data['price'] ?>">
                <?php if (!empty($data['price_err'])) : ?>
                    <span class="text-red-400 text-sm "><?= $data['price_err'] ?></span>
                <?php endif; ?>
            </div>

            <div class="pt-4">
                <label for="Category" class="text-sm text-gray-600 block ">Product Category</label>
                <select name="id_cat"  class="w-full text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
                    <option value="0">Categories</option>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name_cat ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($data['id_cat_err'])) : ?>
                    <span class="text-red-400 text-sm "><?= $data['id_cat_err'] ?></span>
                <?php endif; ?>
            </div>



            <div class="pt-4">
                <button type="input" class="block w-full text-center bg-primary py-2 text-white  hover:bg-sec   transition duration-300  rounded"> Login</button>
            </div>
        </form>

    </div>
</div>

<?php require APPROOT . "/views/inc/footer.php" ?>