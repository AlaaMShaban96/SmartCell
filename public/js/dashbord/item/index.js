
  let clearFlag=0;
  function showModelCategory() {
    
      // // Get the modal
      var addCategory = document.getElementById("addCategory");
      
      // Get the button that opens the modal
      var showAddCategory = document.getElementById("showAddCategory");
      
      // Get the <span> element that closes the modal
      var closesModelCategory = document.getElementsByClassName("closesModelCategory")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          addCategory.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
        closesModelCategory.onclick = function() {
          addCategory.style.display = "none";
      }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == addCategory) {
          addCategory.style.display = "none";
        }
      }
  }
  function showModelItem() {
      // Get the modal
    var addItem = document.getElementById("addItem");
    
    // Get the button that opens the modal
    var addbtn = document.getElementById("showAddItem");
    
    // Get the <span> element that closes the modal
    var closesModelItem = document.getElementsByClassName("closesModelItem")[0];
    var closesModelInformtion = document.getElementsByClassName("closesModelInformtion")[0];
    var closesModeloption = document.getElementsByClassName("closesModeloption")[0];
    
    // When the user clicks the button, open the modal 
    addbtn.onclick = function() {
        addItem.style.display = "block";
        if (clearFlag == 1) {
            clearInputItem();
            clearFlag=0;
            }
    }
    
    // When the user clicks on <span> (x), close the modal
    closesModelItem.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    closesModelInformtion.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    closesModeloption.onclick = function() {
        clearInputItem();
        addItem.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == addItem) {
        addItem.style.display = "none";
      }
    }
  }
  showModelItem();
  showModelCategory();

  function show(id,index) { 
    $('.sign'+id+' #s1').toggleClass('close1');
    $('.sign'+id+' #s2').toggleClass('close2');

    document.getElementById('sub'+id).innerHTML="";
    document.getElementById('category').innerHTML="<div class='col-4  d-flex justify-content-center pl-4 pr-4'><div class='card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center' style='min-width: 130px; border-radius: 25px;'><button  id='showAddCategory' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";
    // document.getElementById('category').innerHTML="";
    document.getElementById('item').innerHTML="<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><button id='showAddItem' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";

    var sub=document.getElementById('sub'+id);
    items.forEach(element => {
      if (parseInt(element[7].replaceAll(",","")) == id) {

        if (Math.floor(element[28])=='1') {

          sub.innerHTML += '<div><a class="btn" onclick="show('+element[1]+','+(index+1)+')" data-bs-toggle="collapse" data-bs-target="#collapseExample'+element[1]+'" aria-expanded="false" aria-controls="collapseExample'+element[1]+'" style="text-align: center;"> '+element[3]+' <span class="sign'+element[1]+'" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span>  </a><div class="collapse" id="collapseExample'+element[1]+'"><div id="sub'+element[1]+'"></div></div>';

          document.getElementById('category').innerHTML+= category(element);
        }
      
        Math.floor(element[28])=='0'? document.getElementById('item').innerHTML+= item(element):"";
      }
   

    });
    var showAddCategory = document.getElementById("showAddCategory");
    showAddCategory.onclick = function() {
          addCategory.style.display = "block";
          console.log('click on btn')
      }
    var addbtn = document.getElementById("showAddItem");

    addbtn.onclick = function() {
          addItem.style.display = "block";
          if (clearFlag == 1) {
              clearInputItem();
              clearFlag=0;
              }
      }
   
  }

  function category(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[6]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[3]+" </p><div class='row'><div class='col-6'><button onclick='deleteItem("+element[1]+")' class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editCategory("+element[1]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function item(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[6]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[3]+" </p><div class='row'><div class='col-6'><button onclick='deleteItem("+element[1]+")' class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='editItem("+element[1]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }
  function editCategory(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[1]==id) {
        row =  element;
      }
      
    });
    
    console.log('on function Edit Category and date on row = ', row[29]);
    document.getElementById('showAddCategory').click();
    document.getElementById('categoryForm').action=hostName+'/category/'+id;
    document.getElementById('categoryName').value=row[3];
    document.getElementById('categoryTitel').value=Math.floor(row[7]);
    document.getElementById('categoryInfo').value=row[27]; 
    document.getElementById('categoryShow').checked= row[0]=='TRUE'?true:false;
  }
  
  function editItem(id) {
    var hostName = window.location.origin;
    var row=[];
    items.forEach(element => {
      if (element[1]==id) {
        row =  element;
      }
      
    });
    document.getElementById("showAddItem").click();
    document.getElementById('itemForm').action=hostName+'/item/'+id;
    document.getElementById('itemName').value=row[3];
    document.getElementById('itemPrice').value=row[2];
    document.getElementById('itemTitel').value=parseInt(row[7].replaceAll(",",""));
    document.getElementById('itemInfo').value=row[27]; 
    // document.getElementById('itemQyantity').value=row[26]; 
    document.getElementById('itemSubtitle').value=row[5].split(",").pop(); 
    document.getElementById('itemKeywords').value=row[4]; 
    document.getElementById('itemShow').checked= (row[0]=='TRUE')?true:false;

      document.getElementById('itemFormInformtion').action=hostName+'/item/'+row[1];
      document.getElementById('itemNameInformtion').value=row[3];
      document.getElementById('itemTitelInformtion').value=parseInt(row[7].replaceAll(",",""));
      document.getElementById('itemInfoInformtion').value=row[27]; 
      document.getElementById('itemSubtitleInformtion').value=row[5].split(",").pop(); 
      document.getElementById('itemKeywordsInformtion').value=row[4]; 
      document.getElementById('itemShowInformtion').checked= (row[0]=='TRUE')?true:false;
    
      clearFlag=1;
    
    console.log(isEmpty(row[2]));
    if (isEmpty(row[2])) {
      document.getElementById('modal-content-select-option').style.display='none';
      document.getElementById('modal-content-select-informtion').style.display='block';

    }else{
      document.getElementById('modal-content-select-option').style.display='none';
      document.getElementById('modal-content-select-item').style.display='block';

    }
   
   
  }
  function clearInputItem(){
    var hostName = window.location.origin;
    document.getElementById('itemForm').action=hostName+'/item/';
    document.getElementById('itemName').value="";
    document.getElementById('itemPrice').value="";
    document.getElementById('itemTitel').value="";
    document.getElementById('itemInfo').value="" 
    // document.getElementById('itemQyantity').value="" 
    document.getElementById('itemSubtitle').value="" 
    document.getElementById('itemKeywords').value="" 
    document.getElementById('itemShow').checked=false;
    resetSelectOption();
  }
  function deleteItem(id) {
    var hostName = window.location.origin;
    document.getElementById('deleteItemForm').action=hostName+'/item/'+id;
    document.getElementById('deleteItemForm').submit();
  }
  function selectItem() {
    document.getElementById('modal-content-select-option').style.display='none';
    document.getElementById('modal-content-select-item').style.display='block';
  }
  function selectInformtion() {
    document.getElementById('modal-content-select-option').style.display='none';
    document.getElementById('modal-content-select-informtion').style.display='block';
  }
  function resetSelectOption() {
    document.getElementById('modal-content-select-item').style.display='none';
    document.getElementById('modal-content-select-informtion').style.display='none';
    document.getElementById('modal-content-select-option').style.display='block';

  }
  function isEmpty(value){
   return (value == null || value.length === 0);
  }
  
  function checkInputitemFormInformtion() {
      var itemNameInformtion=document.getElementById('itemNameInformtion').value;
      var itemTitelInformtion=document.getElementById('itemTitelInformtion').value;
      var itemInfoInformtion=document.getElementById('itemInfoInformtion').value;
      var itemSubtitleInformtion=document.getElementById('itemSubtitleInformtion').value;
      var itemKeywordsInformtion=document.getElementById('itemKeywordsInformtion').value;
      var itemShowInformtion=document.getElementById('itemShowInformtion');

      if ( itemNameInformtion!="" && itemTitelInformtion!="" && itemInfoInformtion!="" && itemSubtitleInformtion!=""  && itemKeywordsInformtion!="" ) {
        
        loding('imgInformtion');
      }
  }
  function checkInputitemForm() {
      var itemName=document.getElementById('itemName').value;
      var itemTitel=document.getElementById('itemTitel').value;
      var itemInfo=document.getElementById('itemInfo').value;
      var itemSubtitle=document.getElementById('itemSubtitle').value;
      var itemKeywords=document.getElementById('itemKeywords').value;
      var itemShow=document.getElementById('itemShow');

      if ( itemName!="" && itemTitel!="" && itemInfo!="" && itemSubtitle!=""  && itemKeywords!="" ) {
        
        loding('imgItem');
      }
  }
  function checkInpuCategoryForm() {
      var itemName=document.getElementById('categoryName').value;
      var itemTitel=document.getElementById('categoryTitel').value;
      var itemInfo=document.getElementById('categoryInfo').value;
      var itemSubtitle=document.getElementById('categoryShow').value;
      var myFile=document.getElementById('myFile').value;

      if ( itemName!="" && itemTitel!="" && itemInfo!="" && itemSubtitle!=""  && itemKeywords!="" && myFile !="") {
        
        loding('imgCategory');
      }
  }
