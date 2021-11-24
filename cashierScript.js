var video = document.querySelector("#videoElement");
var on_btn = document.querySelector('#on_btn');
var off_btn = document.querySelector('#off_btn');

on_btn.addEventListener('click', function() {

  if (navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(function (stream) {
        video.srcObject = stream;
      })
      .catch(function (err0r) {
        console.log("Something went wrong!");
      });
  }
});

off_btn.addEventListener('click', function() {
  // A video's MediaStream object is available through its srcObject attribute
  const mediaStream = video.srcObject; 
  // Through the MediaStream, you can get the MediaStreamTracks with getTracks():
  const tracks = mediaStream.getTracks();
  // Tracks are returned as an array, so if you know you only have one, you can stop it with: 
  tracks[0].stop();
  // Or stop all like so:
  tracks.forEach(track => track.stop())
});


// Fetching data on entering data in inputfield:

// onkeyup event will occur when the user 
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
      document.getElementById("name").value = "";
      document.getElementById("price").value = "";
      //document.getElementById("quantity").value = "1";
      return;
  }
  else {

  // Creates a new XMLHttpRequest object
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 && 
              this.status == 200) {
            
          // Typical action to be performed
          // when the document is ready
          var myObj = JSON.parse(this.responseText);

          // Returns the response data as a
          // string and store this array in
          // a variable assign the value 
          // received to first name input field
            
          document.getElementById
              ("name").value = myObj[0];

          document.getElementById
          ("quantity").value = myObj[1];
            
          // Assign the value received to
          // last name input field
          document.getElementById(
              "price").value = myObj[2];
      }
      };

      // xhttp.open("GET", "filename", true);
      xmlhttp.open("GET", "billData_fetch.php?id=" + str, true);
        
      // Sends the request to the server
      xmlhttp.send();
  }
}

var item = document.getElementById('name');
var quan = document.getElementById('quantity');
var rate = document.getElementById('price');
function myFunction(){
  //console.log("Working");
  rate.value = quan.value * rate.value;
  //console.log(rate.value);
}
//Generating Invoice:
var newRow = document.getElementById('billTable'); 
var addItem = document.getElementById('submit');
var totalamount = document.getElementById('totalamount');
var copyTotal = document.getElementById('total');
var Sno = 1;
var i = 1;
addItem.addEventListener('click', function(){
  if(item.value != ''){
    //event.preventDefault();
    var row = newRow.insertRow(i);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = Sno;
    cell2.innerHTML = item.value;
    cell3.innerHTML = quan.value;
    cell4.innerHTML = rate.value;
    Sno++;
    i++;
    totalamount.value = parseInt(rate.value) + parseInt(totalamount.value);
  }

  //Getting value of total:
  copyTotal.value = totalamount.value;
});


//Update database using ajax and jquery without refreshing the page:
function kaduppu(){
  var getQuantity=document.getElementById('quantity');
  var getId=document.getElementById('id');
  if(getQuantity && getId){
    $.ajax({
        url:'cashier.php',
        type:'POST',
        data:{
            form_quantity:getQuantity.value,
            form_id:getId.value
        },
        success : function(response){
          window.alert(working);
      }      
    });
  }
  return false;
}

//Sending mail to customer:
customerName = document.getElementById('customerName');
email = document.getElementById('customerMail');
billTable = document.getElementById('billTable');
function sendEmail() {
  if(email.value != "" && customerName.value != ""){
    Email.send({
      Host: "smtp.gmail.com",
      Username: "vasanthvvb0710@gmail.com",
      Password: "hjex bxhf onph xczt",
      To: email.value,
      From: "vasanthvvb0710@gmail.com",
      Subject: "ShopCart" + " - " + "A descripted invoice for your purchase",
      Body: billTable.innerHTML
    })
      .then(function (message) {
      alert("Mail sent successfully!!!")
      });
    }
    else{
      window.alert("Plss enter customer Email id and name!!!");
    }
	}