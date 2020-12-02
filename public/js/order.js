
$('#show-order').on('show.bs.modal', function (event) {
    var name = $(event.relatedTarget).data('name');
    var table=document.getElementById('table');
    // $("#table").find("tr:gt(0)").remove();
    $("#table").empty();
    var profile = $(event.relatedTarget).data('profile');
    if (profile!="") {
      $("#profile-show").css('display','block');
      $("#profile").text(profile);
    }

    var mobile = $(event.relatedTarget).data('mobile');
    if (mobile!="") {
        $("#mobile-show").css('display','block');
        $("#mobile").text(mobile);
      }
    var loction = $(event.relatedTarget).data('loction');
    if (loction!="") {
        $("#loction-show").css('display','block');
        $("#loction").text(loction);
      }
    var note = $(event.relatedTarget).data('note');
    if (note!="") {
        $("#note-show").css('display','block');
        $("#note").text(note);
      }
    var delevre = $(event.relatedTarget).data('delevre');
    if (delevre!="") {
        $("#delevre-show").css('display','block');
        $("#delevre").text(delevre);
      }
    var text = $(event.relatedTarget).data('text');
    if (text!="") {
        $("#text-show").css('display','block');
        $("#text").text(text);
      }

    var tblBody = document.createElement("tbody");
    for (let index = 0; index < 10; index++) {

      if ($(event.relatedTarget).data('product['+index+']') != "") {

      var tr = document.createElement("tr");   
      var product = document.createElement("td");
      var cellText = document.createTextNode($(event.relatedTarget).data('product['+index+']'));
      product.appendChild(cellText);

      var pisces = document.createElement("td");
      var cellText = document.createTextNode($(event.relatedTarget).data('pisces['+index+']'));
      pisces.appendChild(cellText);

      var price = document.createElement("td");
      var cellText = document.createTextNode($(event.relatedTarget).data('price['+index+']'));
      price.appendChild(cellText);
      
      tr.appendChild(product);
      tr.appendChild(pisces);
      tr.appendChild(price);
      table.appendChild(tr);

      // tblBody.appendChild(tr);
      console.log($(event.relatedTarget).data('product['+index+']'));
      }     
    
      
      
    }
   
    // table.appendChild(tblBody);
    console.log(tblBody);

  });