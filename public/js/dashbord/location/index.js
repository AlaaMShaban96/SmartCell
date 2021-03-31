
  let clearFlag=0;
  function showLocationModel() {
    
      // // Get the modal
      var addCategory = document.getElementById("editLocationModel");
      
      // Get the button that opens the modal
      var showAddCategory = document.getElementById("showAddCategory");
      
      // Get the <span> element that closes the modal
      var closeEditLocationModel = document.getElementsByClassName("closeEditLocationModel")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          addCategory.style.display = "block";
          console.log('click on btn showAddCategory')
      }
      
      // When the user clicks on <span> (x), close the modal
        closeEditLocationModel.onclick = function() {
          addCategory.style.display = "none";
          clear();
        }
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == addCategory) {
          clear();
          addCategory.style.display = "none";
        }
      }
  }

  showLocationModel(); 
 
  function show(id,index,name) { 
    $('.sign'+id+' #s1').toggleClass('close1');
    $('.sign'+id+' #s2').toggleClass('close2');
    
    document.getElementById('sub'+id).innerHTML="";
    document.getElementById('category').innerHTML="<div class='col-4  d-flex justify-content-center pl-4 pr-4'><div class='card ml-4 mr-4 pl-4 pr-4 d-flex justify-content-center' style='min-width: 130px; border-radius: 25px;'><button  id='showAddCategory' class='btn btn-success fa fa-plus pt-3 d-flex justify-content-center mx-auto' style='border-radius: 8vh;width: 50px;height: 50px;'></button></div></div>";

    var sub=document.getElementById('sub'+id);
    loctions.forEach(element => {
     
      if (Math.floor(element[24]) == name ) {
        console.log(element[2]=='');

          if (element[2]=='') {
              sub.innerHTML += '<div><a class="btn" onclick="show('+element[11]+','+(index+1)+','+element[11]+')" data-bs-toggle="collapse" data-bs-target="#collapseExample'+element[11]+'" aria-expanded="false" aria-controls="collapseExample'+element[11]+'" style="text-align: center;"> '+element[1]+' <span class="sign'+element[11]+'" id="sign"><span id="s1" class="s"></span><span id="s2" class="s"></span></span>  </a><div class="collapse" id="collapseExample'+element[11]+'"><div id="sub'+element[11]+'"></div></div>';
            }

          document.getElementById('category').innerHTML+= showLocation(element);
      
      }

    });
    showLocationModel();

   
  }

  function showLocation(element) {
    return "<div class=' col-4  d-flex justify-content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+element[4]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'> "+element[1]+" </p><div class='row'><div class='col-6'><button onclick='deleteItem("+element[25]+")' class='btn btn-danger w-50 d-flexjustify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;text-align: center; '>حذف</button></div><div class='col-6'><button  onclick='EditsubLocatin("+element[11]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #48BEB5;' >تعديل</button></div></div></div></div>"; 
    
  }

  function showLocation1(element) {
        return " <div class='  col-l-3 col-s-12  content-center'><div class='card ml-4 mr-4 p-4' style='border-radius: 25px;'><div class='text-center'><img class='img-fluaid' src='"+ element[1]+"' style='width:12vh;'></img></div><p class='card-title  d-flex justify-content-center mt-2'>"+ element[0]+"</p><span class='w-100 flex-fill bd-highlight' style='display:flex;position: inherit;right: 18.5px;'><button  onclick='EditsubLocatin("+ element[5]+")' class='btn btn-success w-50 d-flex justify-content-center mr-1' style=' min-width:55px;height: 22px;font-size: 7px;    justify-content: space-between; border-radius: 30px;background-color: #FF8F00;' >تعديل</button><span> "+element[3]+" د</span></span><span class='text-white badge rounded-pill  " + (element[2]=='TRUE'?"bg-success":"bg-danger" )+ "'>" + (element[2]=='TRUE'?"تم التفعيل":"لم يتم التفعيل" )+ "</span></div></div> ";
  }
  function showEditLocationModel() {
    //       // // Get the modal
    var editLocationModel = document.getElementById("editLocationModel");

    var showAddCategory = document.getElementById("showAddCategory");
  
      // Get the <span> element that closes the modal
      var closeEditLocationModel = document.getElementsByClassName("closeEditLocationModel")[0];
      
      // When the user clicks the button, open the modal 
      showAddCategory.onclick = function() {
          editLocationModel.style.display = "block";
          console.log('click on btn showEditLocationModel')
      }

        editLocationModel.style.display = "block";

        closeEditLocationModel.onclick = function() {
            editLocationModel.style.display = "none";
            clear();
        }
        window.onclick = function(event) {
        if (event.target == editLocationModel) {
          clear();
            editLocationModel.style.display = "none";
        }
        }



  }   
  function showSubLocatin(locationName) {
    var subLoactionDiv= document.getElementById('subLoction');
    subLoactionDiv.innerHTML="";
    loctions.forEach(element => {
      if (element[4]==locationName) {
        subLoactionDiv.innerHTML+= showLocation(element);
      }
      
    });
  }
  function EditsubLocatin(id) {
    var hostName = window.location.origin;

    var subTitelDiv=document.getElementById('subTitelLocation');

    var location= [];
    
    location= loctions[id-1];
    if (location[2]=="") {
      document.getElementById('subTitel2').checked=true;
      // document.getElementById('subTitelLocation').value="'"+loctions[Math.floor(location[24])-1][1]+'#'+Math.floor(location[24])+"'";
      onchangeCitiecs();
    }else{
    
      document.getElementById('subTitel1').checked=true;
      var titel=loctions[Math.floor(location[24])-1];
      
      var subtitel=Math.floor(location[24])+'#'+titel[1];
      
      if (subtitel.search("المدن")==-1) {
        var superTitel=Math.floor(titel[24])+'#'+loctions[Math.floor(titel[24])-1][1];
       
        document.getElementById('titelLocation').value=superTitel;
        onchangeCitiecs();
        document.getElementById('subTitelLocation').value=subtitel;
        
      }else{        
        document.getElementById('titelLocation').value=subtitel;
        onchangeCitiecs();
        document.getElementById('subTitelLocation').value= location[11]+'#'+location[1];
      }
      
   
    }
    document.getElementById('locationForm').action=hostName+'/location';
    document.getElementById('locationId').value=location[25];
    document.getElementById('nameLocation').value=location[1];
    document.getElementById('priceLocation').value=location[2];
    document.getElementById('showLocation').checked= location[0]=='TRUE'?true:false;
    console.log();

    showEditLocationModel();
  } 
  function clear() {
    var hostName = window.location.origin;
    document.getElementById('locationForm').action=hostName+'/setLocation';
    document.getElementById('nameLocation').value="";
    document.getElementById('priceLocation').value="";
    document.getElementById('titelLocation').value="0";
    document.getElementById('showLocation').value="";
    // document.getElementById('priceLocation').value="";
    document.getElementById('showLocation').checked= false;
    // document.getElementById('subTitelLocation').innerHTML="";
  }
  function onchangeCitiecs() {
    var subTitelDiv=document.getElementById('subTitelLocation');
    subTitelDiv.innerHTML="";
    var titelLocation=document.getElementById('titelLocation').value;
    if (document.getElementById('subTitel1').checked) {
          loctions.forEach(element => {
          if (Math.floor(element[24])==titelLocation.substring(0, titelLocation.indexOf('#'))) {
            subTitelDiv.innerHTML+= ' <option value="'+element[11]+'#'+element[1]+'">'+element[1]+'</option>';
          }
          
        });
      document.getElementById('subTitelLocationDiv').style.display = 'block';
      document.getElementById('subTitelLocation').disabled = false;

    }else{
      document.getElementById('subTitelLocationDiv').style.display = 'none';

      document.getElementById('subTitelLocation').disabled = true;
    }
  }
  function deleteItem(id) {
    var hostName = window.location.origin;
    document.getElementById('deleteLocationForm').action=hostName+'/location/'+id;
    document.getElementById('deleteLocationForm').submit();
  }
 
  