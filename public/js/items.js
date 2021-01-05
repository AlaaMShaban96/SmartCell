$('#show-order').on('show.bs.modal', function (event) {
    
var row =[];
   
  app.forEach(element => {
      if(element[9]==$(event.relatedTarget).data('id')){
        row =  element;
      }
      
    });
    console.log(row);
    var hostName = window.location.origin;
    var select = document.getElementById('card-title');
    document.getElementById('form').action=hostName+"/item/"+(row[9]);


    app.forEach(element => {
        if (element[11]!=undefined) {
            var option=document.createElement('option');
            var text=document.createTextNode(element[1]);
            option.append(text);
            select.append(option);
        }
    });

    row[3]==='yes'?document.getElementById('price-row').setAttribute('style','display: none;'):'';

    document.getElementById('img').src=row[6];
    document.getElementById('checkbox').checked=row[7]=='TRUE'?true:false;
    document.getElementById('card-title').value=row[0];
    document.getElementById('card-price').value=row[2];
    document.getElementById('card-key-words').value=row[5];
    document.getElementById('card-info').value=row[10];
    document.getElementById('card-detals').value=row[4];
  
  });
// $('#add-item').on('show.bs.modal', function (event) {
//     var select = document.getElementById('card-title-add-item');

//       var option=document.createElement('option');
//       option.value="";
//     var text=document.createTextNode('لايوجد تصنيف');
//     option.append(text);
//     select.append(option);

//     app.forEach(element => {
//         if (element[11]!=undefined && element[1]!="Product name") {
//             var option=document.createElement('option');
//              option.value=element[1];
//             var text=document.createTextNode(element[1]);
//             option.append(text);
//             select.append(option);
//         }
//     });

  
//   });
// $('#add-category').on('show.bs.modal', function (event) {
//     var select = document.getElementById('card-title-add-category');
//     var option=document.createElement('option');
//     option.value="";
//     var text=document.createTextNode('لايوجد تصنيف');
//     option.append(text);
//     select.append(option);
//     categories.forEach(element => {
//       if (element[0]=='' && element[1]!="Product name") {
//           var option=document.createElement('option');
//            option.value=element[9];
//           var text=document.createTextNode(element[1]);
//           option.append(text);
//           select.append(option);
//       }
//   });

  
// });

  
  
  function readURL(input) {
  
  
    var image = document.getElementById("image");
  
      if (typeof (image.files) != "undefined") {
  
            var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 
  
            if(size > 3 ) {
  
                alert('Please select image size less than 3 MB');
  
            }
              var reader = new FileReader();

                reader.onload = function (e) {
                    $('#xx')
                        .attr('src', e.target.result);
                };
            
            
      }
        
  }
  function readImageURL(input) {
  
  
    var image = document.getElementById("imagexx");
  
      if (typeof (image.files) != "undefined") {
  
            var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 
  
            if(size > 3 ) {
  
                alert('Please select image size less than 3 MB');
  
            }
              var reader = new FileReader();

                reader.onload = function (e) {
                    $('#xx')
                        .attr('src', e.target.result);
                };
            
            
      }
        
  }
  function show(index ) {

    document.getElementById("subCategory").innerHTML="";
    document.getElementById("items").innerHTML="";
    clearBreadcrumb(0)
    var breadcrumb_links = document.getElementById("breadcrumb-links");
    var row =[];

    app.forEach(element => {
        if(element[9]==index){
          row =  element;
        }
        
      });
      console.log(row);


    if (row[3]!="") {
      console.log('yes is category',breadcrumb_index);
      breadcrumb_index=1;
  
      var li = document.createElement("li");
      var a = document.createElement("a");
      var text = document.createTextNode(row[1]);
      li.setAttribute('class','breadcrumb-item active');
  
      a.href='#';
      a.setAttribute('onclick','goto('+ row[9] +','+breadcrumb_index+')');
      a.appendChild(text);
      li.appendChild(a);
      breadcrumb_links.appendChild(li);
    }
  
    app.forEach(element => {
      if (element[0]==row[9] && element[3]=='yes') {
        addToDiveSubCategory(element);
      }
    });
  
    app.forEach(element => {
      if (element[0]==row[9] && element[3]=="" ) {
        addItems(element);
      }
     
    });
    
  
  }

  function addToDiveSubCategory(row) {
  
    var button = document.createElement("button");
    var text = document.createTextNode(row[1]);
    button.setAttribute('class','btn btn-secondary');
    button.setAttribute('onclick','showItems('+ row[9] +')');
    button.appendChild(text);
  
    var span = document.createElement("span");
    span.setAttribute('class','btn-secondary btn-link btn-sm');
  
    var i = document.createElement("i");
    var text = document.createTextNode('edit');
    i.setAttribute('class','material-icons');
    // i.setAttribute('data-target','#show-order');
    i.appendChild(text);

    var a = document.createElement("a");
    a.setAttribute('href','#');
    a.setAttribute('data-target','#show-order');
    a.setAttribute('data-toggle',"modal");
    a.setAttribute('data-id',row[9]);
    a.appendChild(i);
    span.appendChild(a);
    // button.appendChild(span);
  
  
  
    var element = document.getElementById("subCategory");
    element.appendChild(button);
    element.appendChild(span);
  }
  
  function addItems(row) {
    var button = document.createElement("button");
    var text = document.createTextNode(row[1]);
    button.setAttribute('class','btn btn-secondary');
    button.appendChild(text);
    var element = document.getElementById("items");
    element.appendChild(button);
  }
  
  function showItems(index) {

    document.getElementById("subCategory").innerHTML="";
    document.getElementById("subCategory").style.setProperty('background-color', 'indigo');
    document.getElementById("items").innerHTML="";
    var breadcrumb_links = document.getElementById("breadcrumb-links");
    var row =[];
   
  app.forEach(element => {
      if(element[9]==index ){
        row =  element;
      }
      
    });
    
    if (row[3]!=undefined) {
      breadcrumb_index=breadcrumb_index;
      console.log('yes is sub'+breadcrumb_index);
      var li = document.createElement("li");
      var a = document.createElement("a");
      var text = document.createTextNode(row[1]);
      li.setAttribute('class','breadcrumb-item active');
  
      a.href='#';
      a.setAttribute('onclick','goto('+ row[9] +','+(breadcrumb_index+1)+')');
      a.appendChild(text);
      li.appendChild(a);
      breadcrumb_links.appendChild(li);
    }
    
  
  
    app.forEach(element => {
      if (element[0]==row[9] && element[3]!="") {
        addToDiveSubCategory(element);
      }
     
    });
    app.forEach(element => {
      if (element[0]==row[9] && element[3]=="" ) {
        addItems(element);
      }
     
    });
    
  }
  function goto(index ,breadcrumb_number) {
    var row =app[index-1];
    
    clearBreadcrumb(breadcrumb_number);
    document.getElementById("subCategory").innerHTML="";
    document.getElementById("subCategory").style.setProperty('background-color', 'indigo');
    document.getElementById("items").innerHTML="";
 
    app.forEach(element => {
      if (element[0]==row[9] && element[3]=='yes') {
        addToDiveSubCategory(element);
      }
    });
  
    app.forEach(element => {
      if (element[0]==row[9] && element[3]=="" ) {
        addItems(element);
      }
     
    });
  
  }
  function clearBreadcrumb(breadcrumb_number) {
    let menu = document.getElementById('breadcrumb-links');
    var children=menu.children;
    for (let i = 25; i >= breadcrumb_number; i--) {
      if (i!=0 && i!=breadcrumb_number && typeof children[i] != 'undefined') {
          children[i].remove();
      }
    }
  }