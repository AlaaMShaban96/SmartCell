
var selectedId = null;
var selectedNode = null;
function makeTree(products,productsById,productId){
    var node = null;
    var tree = [];
    for (var i = 0; i < products.length; i++){
        products[i].children = [];
    }
    for (var i = 0; i < products.length; i++){
        node = products[i];
        if (node.parent){
            products[productsById[node.parent]].children.push(node);
        }else{
            tree.push(node);
        }
    }
    return tree;
}
var _tree;
var _prdouctId;
function drawTree(tree,productId){
    var $treeContainer = $("#treeContainer");
    $treeContainer.find(".tree").html("");
    _tree=tree;
    _prdouctId=productId;

    selectedId = productId;
    ClearCanvas();
    categoryPostions = [];

    for (var i = 0; i < tree.length; i++){
        //drawTreeProduct(productId,tree[i]);
        drawTreeProductCanvas(productId,tree[i],0,i);
    }
}

function drawTreeProductCanvas(productId,product,layer,i,parentXY=null){
    var spacing = 350;
    var ySpacing = 100;
    var currentSpacing = spacing*i;
    if(product.productId != productId && product.parent != productId)
    {
        for (var i = 0; i < product.children.length; i += 1){
            drawTreeProductCanvas(productId,product.children[i],layer ,i);
        }
        return ;
    }
    var x = 20+currentSpacing;
    var y = 10+(layer*ySpacing);

    if(product.parent == productId && parentXY != null)
    {
        DrawLines(x,y,parentXY.x,parentXY.y);
    }

    if(product.category){
        DrawCategory(x,y,product.title,product.productId,product.image,productId==product.productId);
    }
    else
    {
        DrawProduct(x,y,product.title,product.productId,product.image);
    }

    for (var i = 0; i < product.children.length; i += 1){
        drawTreeProductCanvas(productId,product.children[i],layer+1,i,{x,y});
    }
}

function drawTreeProduct(productId = null,product ,parentElement=null){

    if(product.productId == productId){
        selectedNode = product;
    }
    var element = $();
    if(selectedNode && selectedNode.children.some(item => item.productId == product.productId)
        || product.productId == productId
        || (productId == null && product.parent == null ) )
    {

        var template = `<li class="treeNodeHover">
<span data-product-id="${product.category ? product.productId : null }" class="animate__animated animate__zoomIn ${product.category ? "category-node" : "" } 
${product.category && product.productId != productId ? "navigate-card" : ""} ${selectedId == product.productId ? "highlight" : "" }">
<img width="64" height="64" src="${product.image ?? "https://via.placeholder.com/150"}" />
${product.title}
${product.category ? `<div data-parent-id="${product.productId}" style="position: absolute; left:100%; cursor: pointer; " class="addProductButton ">+</div>` : ""}
</span>
</li>`;
         element = $(template);
        if(parentElement === null || product.productId == productId)
        {
            $("#treeContainer").find(".tree").append(element);

        }
        else
        {
            parentElement.append(element);
        }

    }

    if(product.children.length > 0)
    {
        var elementUL = $(`<ul></ul>`);
        if(selectedNode && selectedNode.children.some(item => item.productId == product.productId))
        {
           elementUL.append('<span class="etc">...</span>')
        }
        element.append(elementUL);
        for (var i = 0; i < product.children.length; i += 1) {
            drawTreeProduct(productId,product.children[i],elementUL);
        }
    }
}