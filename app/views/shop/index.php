<?php require APPROOT . "/views/inc/header.php" ?>



<!-- linktree -->
<div class="containner py-4 flex items-center gap-3 bg-gray-100">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Shop</p>
</div>


<!-- Shop wrapper  -->
<div class="containner py-10 bg-gray-100">
    <!-- Sorting -->
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-6">
        <select name="sorting" id="" class="w-44 text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
            <option value="0">Categories</option>
            <?php foreach ($data['categories'] as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->name_cat ?></option>
            <?php endforeach; ?>

        </select>


        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#ebbb89] focus:border-[#ebbb89] block w-full pl-10 p-2.5 " placeholder="Search" required>
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-[#ebbb89] rounded-lg border hover:bg-sec focus:outline-none focus:ring-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

    </div>
    <!-- Sorting end -->
    <div class="grid md:grid-cols-4 gap-6 mt-10">
        <!-- Single Product -->
        <?php foreach ($data['products'] as $product) : ?>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow group hover:scale-105 transition duration-150 overflow-hidden">
                <a href="<?= URLROOT ?>/shop/product/<?= $product->id ?>" class="relative ">
                    <img class="rounded-t-lg group-hover:scale-105 transistion duration-100 max-h-[200px] w-full" src="<?= $product->image ?>" alt="product image" />
                    <div class="bg-primary bg-opacity-0 w-full h-full group-hover:bg-opacity-40 transistion duration-100 absolute inset-0 rounded-t-lg"></div>
                </a>
                <div class="px-5 pb-5 mt-4">
                    <a href="#">
                        <h5 class="text-md font-semibold tracking-tight "><?= $product->name ?></h5>
                    </a>

                    <div class="flex items-center justify-between mt-4">
                        <span class="text-xl font-bold text-gray-900 ">$<?= $product->price ?></span>
                        <a href="<?= URLROOT ?>/shop/product/<?= $product->id ?>" class="text-white font-medium rounded-lg text-sm bg-primary hover:bg-sec transition duration-100 px-5 py-2 ">View </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        <!-- End Single Product -->
    </div>
</div>

<?php require APPROOT . "/views/inc/footer.php" ?>