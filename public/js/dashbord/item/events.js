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
    $("#button-1-type").change(function(){
        var value = $(this).val();
        var otherValue ;
        $("#button-1-type option").each(function()
        {
            if($(this).val() != value)
            {
                otherValue = $(this).val();
            }
        });

        $("#button-2-type").val(otherValue);
        ButtionFormHandler($(this));
        ButtionFormHandler($("#button-2-type"));

    });
    $("#button-2-type").change(function(){
        var value = $(this).val();
        var otherValue ;
        $("#button-2-type option").each(function()
        {
            if($(this).val() != value)
            {
                otherValue = $(this).val();
            }
        });

        $("#button-1-type").val(otherValue);
        ButtionFormHandler($(this));
        ButtionFormHandler($("#button-1-type"));

    });
    //Button functionalty end
    $("#product-category").change(function(){
        console.log("p");
        var isCategory = $(this).val() == 1;
        if(isCategory){
            $("#productForm").hide(100);
            $(".buyOption").html("Show products").val('SHOW');
            $(".showOption").show(100);
            $(".select-button-type").trigger('change');
        }
        else
        {
            $("#productForm").show(100);
            $(".buyOption").html("BUY NOW").val('BUY');
            $(".select-button-type").trigger('change');
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
    });
    $("#button-1-image").change(function(){
        $("#Button-1-imagePreview").attr('src',window.URL.createObjectURL(this.files[0]));
    });
    $("#button-2-image").change(function(){
        $("#Button-2-imagePreview").attr('src',window.URL.createObjectURL(this.files[0]));
    });


    $("#product-show").change(function(){
        console.log(this.checked);
    })
    $("#product-avalible").change(function(){
        console.log(this.checked);
    })
});


function ButtionFormHandler(me)
{
    var value = me.val();
    var dataForm = me.parent().find(".data-button-form");
    var buyForm = me.parent().find(".buy-button-form");

    if(value == "BUY"){
        dataForm.hide(100);
        buyForm.show(100);
    }
    else if(value == "DATA")
    {
        dataForm.show(100);
        buyForm.hide(100);
    }
    else if(value == "SHOW")
    {
        dataForm.hide(100);
        buyForm.hide(100);
    }
}