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
            ${product.description} ...
        </td>
        <td class="px-6 py-4 flex flex-col sm:flex-row items-center gap-1">
            <a href="${urlroot}/dashboard/edit/${product.id}" class=" text-sm font-medium text-white bg-blue-500 px-3 py-2 rounded-md"><i class="fa-solid fa-pen mr-1 text-xs"></i> Edit</a>
            <a href="${urlroot}/dashboard/delete/${product.id}" class=" text-sm font-medium text-white bg-red-500 px-3 py-2 rounded-md"><i class="fa-solid fa-trash mr-1 text-xs"></i> Delete</a>
        </td>
    </tr>
        `
  })
}
