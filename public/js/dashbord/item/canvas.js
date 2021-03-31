
var ctx ;
var c;
var categoryPostions = [];

$(function(){
    c = document.getElementById("treeCanvas");
     ctx = c.getContext("2d");
     c.width  = 1000;
    c.height = 400;
//     var background = new Image();
//     background.src = "http://www.samskirrow.com/background.png";
//
// // Make sure the image is loaded first otherwise nothing will draw.
//     background.onload = function(){
//         ctx.drawImage(background,0,0);
//     }

    c.addEventListener('mousedown', onMouseDown);
    c.addEventListener('mouseup', onMouseUp, false);
    c.addEventListener('mouseout', onMouseUp, false);
    c.addEventListener('mousemove', onMouseMove, false);
    c.addEventListener('wheel', onMouseWheel, false);
});
function ClearCanvas(){
    ctx.clearRect(0, 0, c.width, c.height);
}

CanvasRenderingContext2D.prototype.roundRect = function (x, y, width, height, radius) {
    if (width < 2 * radius) radius = width / 2;
    if (height < 2 * radius) radius = height / 2;
    this.beginPath();
    this.moveTo(x + radius, y);
    this.arcTo(x + width, y, x + width, y + height, radius);
    this.arcTo(x + width, y + height, x, y + height, radius);
    this.arcTo(x, y + height, x, y, radius);
    this.arcTo(x, y, x + width, y, radius);
    this.closePath();
    return this;
}
var images = [];
function DrawCategory(x,y,text,id,image,mainParent=false)
{

    var categoryPath = new Path2D();
    var sizeX = 300;
    var sizeY = 64;
    if(mainParent){
        x = ( (c.width - sizeX) / 2 );
    }

    categoryPath.moveTo(toScreenX(x), toScreenY(y));
    categoryPath.lineTo(toScreenX(x+sizeX), toScreenY(y));
    categoryPath.lineTo(toScreenX(x+sizeX), toScreenY(y+sizeY));
    categoryPath.lineTo(toScreenX(x), toScreenY(y+sizeY));
    categoryPath.lineTo(toScreenX(x), toScreenY(y));
    ctx.fillStyle = "#3a3b3c";
    ctx.fill(categoryPath);
    var img;
    if(!images[id])
    {
        img = new Image(64*scale,64*scale);
        img.src = image ?? 'https://via.placeholder.com/64';
        images[id] = img;
    }
    else
    {
        img = images[id];
        img.width = 64 * scale;
        img.height = 64 * scale;
       ctx.drawImage(img, toScreenX(x), toScreenY(y),64*scale,64*scale);

    }

    img.onload = function(){
        ctx.drawImage(img, toScreenX(x), toScreenY(y),64*scale,64*scale);
    }
    var fontSize = 16*scale;
    ctx.font = fontSize.toString()+'px serif';
    ctx.fillStyle  = "white";
    ctx.imageSmoothingEnabled = true;
    var substringedText = text.substring(0,30);
    if(text.length > 30)
    {
        substringedText = '...' + substringedText;
    }
    ctx.fillText(substringedText,  toScreenX(x+(64) + 10), toScreenY(y+(64/2) + 5));
    ctx.beginPath();
    ctx.moveTo(toScreenX(x + (sizeX/2)), toScreenY(y+sizeY));
    ctx.lineTo(toScreenX(x + (sizeX/2)),toScreenY(y+sizeY+20));
    ctx.stroke();

    categoryPostions.push({path:categoryPath,id});

}
function DrawLines(x,y,parentX,parentY)
{
    var sizeX = 300;
    var sizeY = 64;

    ctx.beginPath();
    ctx.moveTo(toScreenX(x + (sizeX/2)), toScreenY(y));
    ctx.lineTo(toScreenX(x + (sizeX/2)),toScreenY(y-15));
    ctx.stroke();

    ctx.beginPath();
    parentX = ( (c.width - sizeX) / 2 );

    ctx.moveTo(toScreenX(x + (sizeX/2)),toScreenY(y-15));
    ctx.lineTo(toScreenX(parentX + (sizeX/2)),toScreenY(parentY+sizeY+20));
    ctx.stroke();


}
function DrawProduct(x,y,text,id,image)
{
    ctx.beginPath();
    var sizeX = 300;
    var sizeY = 64;
    ctx.roundRect(toScreenX(x),toScreenY(y),sizeX*scale,sizeY*scale,20);
    ctx.fillStyle = "#3a3b3c";
    ctx.fill();

    if(!images[id])
    {
        img = new Image(64*scale,64*scale);
        img.src = image ?? 'https://via.placeholder.com/64';
        images[id] = img;
    }
    else
    {
        img = images[id];
        ctx.drawImage(img, toScreenX(x), toScreenY(y),64*scale,64*scale);

    }    img.onload = function(){
    ctx.drawImage(img, toScreenX(x), toScreenY(y),64*scale,64*scale);

    }

    var substringedText = text.substring(0,30);
    if(text.length > 30)
    {
        substringedText = '...' + substringedText;
    }
    var fontSize = 16*scale;
    ctx.font = fontSize.toString()+'px serif';
    ctx.fillStyle  = "white";
    ctx.imageSmoothingEnabled = true;
    ctx.fillText(substringedText,  toScreenX(x+(64) + 10), toScreenY(y+(64/2) + 5));

}



/// ZOOM AND PAN

var cursorX , cursorY;
var prevCursorX,prevCursorY;
var offsetX = 0;
var offsetY = 0;
var scale = 1;

function toScreenX(xTrue) {
    return (xTrue + offsetX) * scale;
}
function toScreenY(yTrue) {
    return (yTrue + offsetY) * scale;
}
function toTrueX(xScreen) {
    return (xScreen / scale) - offsetX;
}
function toTrueY(yScreen) {
    return (yScreen / scale) - offsetY;
}
function trueHeight() {
    return  c.clientHeight / scale;
}
function trueWidth() {
    return  c.clientWidth / scale;
}

function redrawCanvas() {
    drawTree(_tree,_prdouctId);
}




// mouse functions
var leftMouseDown = false;
var rightMouseDown = false;
function onMouseDown(event) {

    // detect left clicks
    if (event.button == 0) {
        leftMouseDown = true;
        rightMouseDown = false;
    }
    // detect right clicks
    if (event.button == 2) {
        rightMouseDown = true;
        leftMouseDown = false;
    }

    // update the cursor coordinates
    cursorX = event.pageX;
    cursorY = event.pageY;
    prevCursorX = event.pageX;
    prevCursorY = event.pageY;

    let rect = c.getBoundingClientRect();
    for(let i = 0;i<categoryPostions.length;i++)
    {
        if(ctx.isPointInPath( categoryPostions[i].path,cursorX -rect.left,cursorY-rect.top))
        {
            gotoProduct(categoryPostions[i].id);
            offsetX = 0;
            offsetY = 0;
            redrawCanvas();
        }

    }




}
function onMouseMove(event) {
    // get mouse position
    cursorX = event.pageX;
    cursorY = event.pageY;
    const scaledX = toTrueX(cursorX);
    const scaledY = toTrueY(cursorY);
    const prevScaledX = toTrueX(prevCursorX);
    const prevScaledY = toTrueY(prevCursorY);

    if (leftMouseDown) {
        // move the screen
        offsetX += (cursorX - prevCursorX) / scale;
        offsetY += (cursorY - prevCursorY) / scale;
        redrawCanvas();
    }
    prevCursorX = cursorX;
    prevCursorY = cursorY;

    let rect = c.getBoundingClientRect();
    let one = false;
    for(let i = 0;i<categoryPostions.length;i++)
    {
        if(ctx.isPointInPath( categoryPostions[i].path,cursorX -rect.left,cursorY-rect.top))
        {
            one = true;
            break;
        }

    }
    if(one)
        document.body.style.cursor = "pointer";
    else
        document.body.style.cursor = "auto";

}
function onMouseUp() {
    leftMouseDown = false;
    rightMouseDown = false;
}
function onMouseWheel(event) {
    const deltaY = event.deltaY;
    const scaleAmount = -deltaY / 200;
    scale = scale * (1 + scaleAmount);

    if(scale > 2 )
    {
        scale = 2;
    }if(scale < 0.1 )
    {
        scale = 0.1;
    }

    // zoom the page based on where the cursor is
    var distX = event.pageX /  c.clientWidth;
    var distY = event.pageY /  c.clientHeight;

    // calculate how much we need to zoom
    const unitsZoomedX = trueWidth() * scaleAmount;
    const unitsZoomedY = trueHeight() * scaleAmount;

    const unitsAddLeft = unitsZoomedX * distX;
    const unitsAddTop = unitsZoomedY * distY;

    offsetX -= unitsAddLeft;
    offsetY -= unitsAddTop;

    redrawCanvas();
}