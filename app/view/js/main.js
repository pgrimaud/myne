function isInt(n) {
    return n % 1 === 0;
}

$("#searchProduct, #reviewTitle, #reviewContent, #productName, #productEan").keyup(function() {
    if($(this).parent().hasClass("has-error"))
        $(this).parent().removeClass("has-error")
})

$("#btn_searchProduct").click(function(e) {
    e.preventDefault()
    var data = $("#searchProduct").val()

    if(data.length <= 0) {
        alertify.error("Vous n'avez pas saisi de code ean ou de nom du produit")
        $("#searchProduct").parent().addClass("has-error")
        return false
    }

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
                    if (key == "IdProduct")
                        $("#infoProduct").attr("data-id-product", value)
                    else if (key == "EanCode")
                        $("#infoProduct > p").text(value)
                    else if(key == "Name")
                        $("#infoProduct > h2").text(value)
                });
                $("#formSearchProduct").hide("slow")
                $("#infoProduct").show("slow")
                $("form[name=addReview] > button").removeClass("disabled")
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
    var productName = $("#productName").val()
    ,   productEan = $("#productEan").val()

    if(productName.length <= 0) {
        alertify.error("Veuillez indiquer le nom du produit")
        $("#productName").parent().addClass("has-error")
        return false
    }
    if(productEan.length <= 0) {
        alertify.error("Veuillez indiquer le code ean du produit")
        $("#productEan").parent().addClass("has-error")
        return false
    } else {
        if(!isInt(productEan) || productEan.length < 13 || productEan.length > 13) {
            alertify.error("Il semble que le code ean renseigné ne soit pas au bon format")
            $("#productEan").parent().addClass("has-error")
            return false
        }
    }

    $.post(
        "../handler/product.php",
        {
            "addProduct" : true,
            "productName" : productName,
            "productEan" : productEan
        },
        function(data) {
            obj = JSON.parse(data);
            $.each(obj, function(key, value) {
                if (key == "IdProduct")
                    $("#infoProduct").attr("data-id-product", value)
                else if (key == "EanCode")
                    $("#infoProduct > p").text(value)
                else if(key == "Name")
                    $("#infoProduct > h2").text(value)
            });
            alertify.success("Produit ajouté avec succès!")
            $("#addProductModal").modal("toggle")
            $("#formSearchProduct").hide("slow")
            $("#infoProduct").show("slow")
            $("form[name=addReview] > button").removeClass("disabled")
        }
    )
})

$("form[name=addReview]").submit(function(e) {
    e.preventDefault()
    var idProduct     = $("#infoProduct").attr("data-id-product")
    ,   reviewTitle   = $("#reviewTitle").val()
    ,   reviewContent = $("#reviewContent").val()
    ,   reviewRate    = $("#reviewRate").val()
    ,   idUser        = $("#idUser").val()

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
            "reviewPublication" : reviewPublication,
            "idUser"            : idUser
        },
        function(data) {
            alertify.success("Votre avis a été créé avec succès, merci!")
            setTimeout(function() { window.location.reload(); }, 2000);
        }
    )
})

$(".btn-add-comment").click(function(e) {
	e.preventDefault()
	var content = $("#addComment").val()
	,	idReview = $("input[name=idReview]").val()
	,	idUser = $("input[name=idUser]").val()
	
	$.post(
		"../handler/comment.php",
		{
			"idReview" 	: idReview,
			"idUser"	: idUser,
			"content"	: content
		},
		function(data) {
			console.log(data)
			alertify.success("Commentaire ajouté avec succès!")
			setTimeout(function() { window.location.reload(); }, 2000);
		}
	)
})
