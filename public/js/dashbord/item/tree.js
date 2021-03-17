
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
function drawTree(tree,productId){
    var $treeContainer = $("#treeContainer");
    $treeContainer.find(".tree").html("");

    selectedId = productId;

    for (var i = 0; i < tree.length; i++){
        drawTreeProduct(productId,tree[i]);
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