//Dashboard
var container = document.querySelector('.container');
var open_btn = document.getElementById('open_btn');
var close_btn = document.getElementById('close_btn');

open_btn.addEventListener('click', function() {
  container.classList.add('visible');
});
close_btn.addEventListener('click', function() {
  container.classList.remove('visible');
});

//Editing stock details form
var wrapper = document.querySelector('.wrapper');
var view = document.querySelector('.view');
var table = document.querySelector('.table');
var updItems = document.querySelectorAll('#updItem');
for(let i=0; i<updItems.length; i++){
  updItems[i].addEventListener('click', function(){
    view.classList.add('visible');
    wrapper.classList.add('visible');

    //Getting Product Id from the table
    var productId = table.rows[i+1].cells[0].innerHTML;
    GetDetail(productId);
  });
}

var closeBtn = document.querySelector('#close');
closeBtn.addEventListener('click', function(){
  view.classList.remove('visible');
  wrapper.classList.remove('visible');
});


//Fcuntion to get the details of the stock on buttonClick
function GetDetail(str) {

  if (str.length != 0) {
    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

    // Defines a function to be called when the readyState property changes
    if (this.readyState == 4 && 
            this.status == 200) {
          
      // Typical action to be performed when the document is ready
      var myObj = JSON.parse(this.responseText);

      // Returns the response data as a string and store this array in a variable and assign the value received to respectively input fields
      document.getElementById
      ("pId").value = myObj[0];
      document.getElementById
          ("pName").value = myObj[1];
      document.getElementById
      ("pQuantity").value = myObj[2];
      document.getElementById(
          "pPrice").value = myObj[3];
      document.getElementById
      ("pInfo").value = myObj[4];
    }
  };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "editInvent.php?id=" + str, true);
      
    // Sends the request to the server
    xmlhttp.send();
  }
}