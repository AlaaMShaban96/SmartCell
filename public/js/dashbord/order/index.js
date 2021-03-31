
  function showOredr(id) {
    
    var modal = document.getElementById("myModal2");

    var span = document.getElementsByClassName("close")[3];

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } 
    order(id);
}
function order(id) {
  var hostName = window.location.origin;
    var row=[];
   

    app.forEach(element => {
     if (element[47]==id) {
        return row= element;  
     }    
    
    });
    document.getElementById('printId1').href =hostName+'/order/"قيد التوصيل"/'+id;
    document.getElementById('printId2').href =hostName+'/order/"تم التوصيل"/'+id;
    // document.getElementById('printId3').href =hostName+'/order/"تم الالغاء"/'+id;
    document.getElementById('printId4').href =hostName+'/order/"استرجاع"/'+id;
    document.getElementById('printId5').href =hostName+'/order/"استلام شخصي"/'+id;
    document.getElementById('tname').innerHTML=row[0];
    document.getElementById('tprofilename').innerHTML=row[1];
    document.getElementById('tnumber').innerHTML=row[2];
    document.getElementById('tloction').innerHTML=row[33]+','+row[34];
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
            var  txtprodact=document.createTextNode(""+row[index]);
            prodact.append(txtprodact);
            var price=document.createElement('td');
            var  txtprice=document.createTextNode(""+row[index+1]);
            price.append(txtprice);
            var count=document.createElement('td');
            var  txtcount=document.createTextNode(""+row[index+2]);
            count.append(txtcount);
            tr.append(price);
            tr.append(count);
            tr.append(prodact);
            tbody.append(tr);
        }
        
    }


}
function showOrderStatus(status) {

  document.getElementById('tbodyOrders').innerHTML="";
  var tbodyOrders= document.getElementById('tbodyOrders');
  var state= status;
  var row=[];
   

  app.forEach(element => {
   if (element[42] == state) {
    row.push(element) ;  
   }    
  
  });
  // row.sort();
  // // Then reverse it:
  // row.reverse();
  // console.log(row.sort((a,b) => a[48] - b[48]));
  row.forEach(element => {
      if (element[42] == state) {
            var tr=document.createElement('tr');

            var id=document.createElement('td');
            var  txtId=document.createTextNode(""+element[47]);
            id.append(txtId);
            var totle=document.createElement('td');
            var  txtTotle=document.createTextNode(""+element[36]);
            totle.append(txtTotle);
            var status=document.createElement('td');
            var  txtStatus=document.createTextNode(""+element[42]);
            status.append(txtStatus);
            var delivry=document.createElement('td');
            var  txtdelivry=document.createTextNode(""+element[39]);
            delivry.append(txtdelivry);
          
            var model=document.createElement('td');
            var show=document.createElement('button');
            var  txtshow=document.createTextNode("عرض");
            show.addEventListener("click", function() { 
              var modal = document.getElementById("myModal2");

              modal.style.display = "block";

              showOredr(element[47]);
              }); 
            show.setAttribute('id','myBtn'+element[47]);
            show.setAttribute('style','border: none; background-color: white;color: #10858b; cursor: pointer');
            show.append(txtshow);
            model.append(show);
          
            tr.append(id);
            tr.append(totle);
            tr.append(status);
            tr.append(delivry);
            tr.append(model);
            tbodyOrders.append(tr);
            
        }
    });
    
  
}
function setFormUrl() {
  var hostName = window.location.origin;
  var form = document.getElementById('formSendToUser');
  var id = document.getElementById('orderId').innerText;
  form.action=hostName+'/order/send-to-user/'+id;
}
