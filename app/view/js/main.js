$("#btn_searchProduct").click(function(e) {
    e.preventDefault()
    $("#addProductModal").modal("toggle")
})

$("#wrapper").on("click", "#btnAddProduct", function(e) {
    e.preventDefault()
    console.log("uehs")
})
