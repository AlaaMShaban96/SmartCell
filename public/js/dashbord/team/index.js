function showOredr(key,id) {

    console.log(id);  

    var modal = document.getElementById("myModal2");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn"+key);
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[3];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //   modal.style.display = "none";
    // }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } 
    order(id);
}
function order(id) {
    var row=[];
    app.forEach(element => {
     if (element[47]==id) {

        return row= element;
         
     }    
    
    });

    document.getElementById('tnote').innerHTML=row[35];
    document.getElementById('tdelivery').innerHTML=row[39];
    document.getElementById('orderDate').innerHTML=dateFormat(row[40], "dd-m-yy")
    document.getElementById('orderId').innerHTML=row[47];
    document.getElementById('orderStatus').innerHTML=row[42];
    document.getElementById('orderTotal').innerHTML=row[36];
    document.getElementById('tbody').innerHTML="";
    var tbody= document.getElementById('tbody');
    for (let index = 3 ; index <= 30; index=index+3 ) {
        if (row[index] != "") {
            var tr=document.createElement('tr');

            var prodact=document.createElement('td');
            var  txtprodact=document.createTextNode(""+row[index])
            prodact.append(txtprodact);
            var price=document.createElement('td');
            var  txtprice=document.createTextNode(""+row[index+1])
            price.append(txtprice);
            var count=document.createElement('td');
            var  txtcount=document.createTextNode(""+row[index+2])
            count.append(txtcount);
            tr.append(price);
            tr.append(count);
            tr.append(prodact);
            tbody.append(tr);
        }
        
    }


}