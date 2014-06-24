$("#searchProduct, #reviewTitle, #reviewContent").keyup(function() {
    if($(this).parent().hasClass("has-error"))
        $(this).parent().removeClass("has-error")
})

$("#btn_searchProduct").click(function(e) {
    e.preventDefault()
    var data = $("#searchProduct").val()

    $.post(
        "../handler/product.php",
        {
            "searchProduct" : true,
            "data" : data
        },
        function(data) {
            var KO  = /KO/
            ,   NF  = /NOT FOUND/

            if(KO.test(data)) {
                $("#searchProduct").parent().addClass("has-error")
                alertify.error("Il semble que le code EAN ne fait pas 13 chiffres...")
            } else if(NF.test(data)) {
                $("#addProductModal").modal("toggle")
            } else {
                obj = JSON.parse(data);
                $.each(obj, function(key, value) {
                    $("#formSearchProduct").hide("slow")
                    if (key == "IdProduct")
                        $("#infoProduct").attr("data-id-product", value)
                    else if (key == "EanCode")
                        $("#infoProduct > p").text(value)
                    else if(key == "Name")
                        $("#infoProduct > h2").text(value)
                    $("#infoProduct").show("slow")
                    $("form[name=addReview] > button").removeClass("disabled")
                });
            }
        }
    )
})
$("#btn_searchAnotherProduct").click(function() {
    $("form[name=addReview] > button").addClass("disabled")
    $("#searchProduct").val("")
    $("#infoProduct").hide("slow")
    $("#formSearchProduct").show("slow")
})

$("#wrapper").on("click", "#btnAddProduct", function(e) {
    e.preventDefault()
    console.log("uehs")
})

$("form[name=addReview]").submit(function(e) {
    e.preventDefault()
    var idProduct = $("#infoProduct").attr("data-id-product")
    ,   reviewTitle = $("#reviewTitle").val()
    ,   reviewContent = $("#reviewContent").val()
    ,   reviewRate = $("#reviewRate").val()

    if($("input[name=userPublication]").val() == 0) {
        var reviewPublication = $("input[name=radioPublication]:checked", "#formAddReview").val()
    } else {
        var reviewPublication = $("input[name=userPublication]").val()
    }

    if(reviewTitle.length <= 0) {
        alertify.error("Merci de renseigner un titre ou un commentaire court pour votre avis")
        $("#reviewTitle").parent().addClass("has-error")
        return false
    }
    if(reviewContent.length <= 0) {
        alertify.error("Merci de rédiger votre avis")
        $("#reviewContent").parent().addClass("has-error")
        return false
    }
    if(reviewRate.length <= 0) {
        alertify.error("Merci de donner une note au produit")
        return false
    }
    if(!reviewPublication) {
        alertify.error("Merci d'indiquer la visibilité de votre avis")
        return false
    }

    $.post(
        "../handler/review.php",
        {
            "addReview"         : true,
            "idProduct"         : idProduct,
            "reviewTitle"       : reviewTitle,
            "reviewContent"     : reviewContent,
            "reviewRate"        : reviewRate,
            "reviewPublication" : reviewPublication
        },
        function(data) {
            alertify.success("Votre avis a été créé avec succès, merci!")
            setTimeout(function() { window.location.reload(); }, 2000);
        }
    )
})
