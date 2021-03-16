$(function(){

    $(".buy-button-form").css({"display":"none"});
    $(".data-button-form").css({"display":"none"});
    $("#toggleSearch").click(function(){
        $("#productsContainer").hide();
        $("#treeContainer").hide();
        $("#searchContainer").show();
        MakeSearch(products);

        $(document).find('#searchBox').show();
        $("#breadcrumbsContainer li").hide();
    });
    $("#toggleDirectory").click(function(){
        $("#productsContainer").hide();
        $("#treeContainer").show();
        $("#searchContainer").hide();

        $(document).find('#searchBox').hide();
        $("#breadcrumbsContainer li").show();
    });
    $("#toggleDiagram").click(function(){
        $("#productsContainer").show();
        $("#treeContainer").hide();
        $("#searchContainer").hide();

        $(document).find('#searchBox').hide();
        $("#breadcrumbsContainer li").show();
    });
    $("#button-1-name").keyup(function(){
        $("#button-1").html($(this).val());
    });
    $("#button-2-name").keyup(function(){
        $("#button-2").html($(this).val());
    });
    $(".select-button-type").change(function(){
        var value = $(this).val();
        var dataForm = $(this).parent().find(".data-button-form");
        var buyForm = $(this).parent().find(".buy-button-form");

        if(value == "BUY")
        {
            dataForm.hide(100);
            buyForm.show(100);
        }
        else if(value == "DATA")
        {
            dataForm.show(100);
            buyForm.hide(100);
        }
        else
        {
            dataForm.hide(100);
            buyForm.hide(100);
        }
    });
    //Button functionalty end
    $("#product-category").change(function(){
        console.log("p");
        var isCategory = $(this).val() == 1;
        if(isCategory){
            $("#productForm").hide(100);
            $(".buyOption").hide(100);
            $(".showOption").show(100);
        }
        else
        {
            $("#productForm").show(100);
            $(".buyOption").show(100);
            $(".showOption").hide(100);
        }

    });
    //Hight light funcationaly
    $("#button-1-form").on("focus",'input , select',function(){
        $(".highlight").removeClass("highlight");
        $(".highlight-dark").removeClass("highlight-dark");

        $("#button-1-form").addClass('highlight');
        $("#button-1").addClass('highlight-dark');
    });
    $("#button-2-form").on("focus",'input , select',function(){
        $(".highlight").removeClass("highlight");
        $(".highlight-dark").removeClass("highlight-dark");

        $("#button-2-form").addClass('highlight');
        $("#button-2").addClass('highlight-dark');
    });
    $("#card-form").on("focus","input , select",function(){
        $(".highlight").removeClass("highlight");
        $(".highlight-dark").removeClass("highlight-dark");

        $("#card-form").addClass('highlight');
        $("#card-preview").addClass('highlight-dark');
    });

    $(document).on("click",'.addButton2',function(){
        $("#button-2").html("زر #2");
        $("#button-2").removeClass("addButton2");
        $('#button-2-form').show();

        $('#button-2-form').find('input[name=button-2-name]').val("زر #2");

    });
    $(document).on("click",'#deleteButton',function(){
        $("#button-2").html("+");
        $("#button-2").addClass("addButton2");
        $('#button-2-form').hide();

        $('#button-2-form').find('select[name=button-2-type]').selectedIndex = 0;
        $('#button-2-form').find('input[name=button-2-name]').val("");
        $('#button-2-form').find('input[name=button-2-price]').val("");
        $('#button-2-form').find('input[name=button-2-details]').val("");

    });

    $("#product-image").change(function(){
       $("#imagePreview").attr('src',window.URL.createObjectURL(this.files[0]));
    })

    $("#product-show").change(function(){
        console.log(this.checked);
    })
    $("#product-avalible").change(function(){
        console.log(this.checked);
    })
});