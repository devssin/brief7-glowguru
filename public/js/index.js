$(document).ready(function () {
  $('#sort').change(function () {
    const cat_id = $('#sort').val()
    $.ajax({
      url: `http://localhost/glowguru/dashboard/category/${cat_id}`,
      type: 'GET',
      success: function (data) {
        const products = JSON.parse(data)
        displayProducts(products)
      },
    })
  })

  $('#searchDash').keyup(function () {
    const name = document.querySelector('#searchDash').value
    console.log(name)
    $.ajax({
      url: `http://localhost/glowguru/dashboard/name/${name}`,
      type: 'GET',
      success: function (data) {
        console.log(data)
        const products = JSON.parse(data)
        displayProducts(products)
      },
    })
  })

  $('#shopSort').change(function () {
    const cat_id = $('#shopSort').val()
    $.ajax({
      url: `http://localhost/glowguru/shop/category/${cat_id}`,
      type: 'GET',
      success: function (data) {
        const products = JSON.parse(data)
        displayShopProducts(products)
      },
    })
  })

  $('#shopSearch').keyup(function () {
    const name = document.querySelector('#shopSearch').value
    console.log(name)
    $.ajax({
      url: `http://localhost/glowguru/shop/name/${name}`,
      type: 'GET',
      success: function (data) {
        console.log(data)
        const products = JSON.parse(data)
        displayShopProducts(products)
      },
    })
  })

  $('#btnAdd').click(function () {
    $.ajax({
      url: 'http://localhost/glowguru/dashboard/getCategories',
      type: 'GET',
      success: function (data) {
        const categories = JSON.parse(data)
        addForme()
        addCategoriesToMyForm(categories)
      },
    })
  })
})

const displayShopProducts = (products) => {
  const urlroot = 'http://localhost/glowguru'
  const container = document.querySelector('#shopContainer')
  container.innerHTML = ''
  products.forEach((product) => {
    console.log(product)
    container.innerHTML += `
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow group hover:scale-105 transition duration-150 overflow-hidden">
            <a href="${urlroot}/shop/product/${product.id}" class="relative ">
                <img class="rounded-t-lg group-hover:scale-105 transistion duration-100 max-h-[200px] w-full" src="${product.image}" alt="product image" />
                <div class="bg-primary bg-opacity-0 w-full h-full group-hover:bg-opacity-40 transistion duration-100 absolute inset-0 rounded-t-lg"></div>
            </a>
            <div class="px-5 pb-5 mt-4">
                <a href="${urlroot}/shop/product/${product.id}">
                    <h5 class="text-md font-semibold tracking-tight ">${product.name.slice(0, 40)} ... (<span class="text-xs text-gray-400 ">${product.category}</span>)</h5>
                </a>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-xl font-bold text-gray-900 ">$${product.price}</span>
                    <a href="${urlroot}/shop/product/${product.id}" class="text-white font-medium rounded-lg text-sm bg-primary hover:bg-sec transition duration-100 px-5 py-2 ">View </a>
                </div>
            </div>
        </div>
        `
  })
}

const addCategoriesToMyForm = (categories) => {
  const select = document.querySelectorAll('.select_cat')
  select.forEach((item) => {
    categories.forEach((category) => {
      item.innerHTML += `
                <option value="${category.id}">${category.name_cat}</option>
    
            `
    })
  })
}

const addForme = () => {
  const myForm = document.querySelector('#form_container')
  myForm.innerHTML += `
  <hr class="my-10"> 
    <div class="pt-4">
    <label for="email" class="text-sm text-gray-600 block ">Product Name</label>
    <input type="text" name="name[]" placeholder="Enter Product Name" class="form-input block w-full mt-1 text-sm  border border-[#ebbb89]  rounded-md  focus:ring-0" ">
    
</div>
<div class="pt-4">
    <label for="image" class="text-sm text-gray-600 block ">Product Image</label>
    <input type="file" name="image[]" placeholder="Enter Product image" class="form-input block w-full mt-1 text-sm text-gray-500 border border-[#ebbb89]  rounded-md  focus:ring-0" ">
    
</div>

<div class="pt-4">
    <label for="description" class="text-sm text-gray-600 block ">Product Description</label>
    <textarea name="description[]" placeholder="Enter Product image" class="form-textarea block w-full mt-1 text-sm  border border-primary  rounded-md  focus:ring-0 px-2 py-4">
    
    </textarea>
    
</div>

<div class="pt-4">
    <label for="price"  class="text-sm text-gray-600 block ">Product Price</label>
    <input type="number" name="price[]" placeholder="Enter Product Price" class="form-input block w-full mt-1 text-sm  border border-[#ebbb89]  rounded-md  focus:ring-0">
    
</div>

<div class="pt-4">
    <label for="Category" class="text-sm text-gray-600 block ">Product Category</label>
    <select  name="id_cat[]"  class="select_cat w-full text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
        <option value="0">Categories</option>
        
    </select>
</div>

    `
}

const displayProducts = (products) => {
  const urlroot = 'http://localhost/glowguru'

  const tableBody = document.querySelector('#tableBody')
  tableBody.innerHTML = ''

  products.forEach((product) => {
    tableBody.innerHTML += `
        <tr class="bg-white border-b  hover:bg-gray-50 ">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
            <span class="text-xs sm:max-w-[20%]">${product.name}</span>
        </th>
        <td class="px-6 py-4">
            <img src="${product.image}" alt="" class="w-10 h-10">
        </td>
        <td class="px-6 py-4">
            ${product.category}
        </td>
        <td class="px-6 py-4">
            ${product.price}
        </td>
        <td class="px-6 py-4">
            ${product.description.slice(0, 30)} ...
        </td>
        <td class="px-6 py-4 flex flex-col sm:flex-row items-center gap-1">
            <a href="${urlroot}/dashboard/edit/${
      product.id
    }" class=" text-sm font-medium text-white bg-blue-500 px-3 py-2 rounded-md"><i class="fa-solid fa-pen mr-1 text-xs"></i> Edit</a>
            <a href="${urlroot}/dashboard/delete/${
      product.id
    }" class=" text-sm font-medium text-white bg-red-500 px-3 py-2 rounded-md"><i class="fa-solid fa-trash mr-1 text-xs"></i> Delete</a>
        </td>
    </tr>
        `
  })
}
