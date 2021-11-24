//Cashier:
let cashierBtn1 = document.getElementById('btn1');
let cashierBtn2 = document.getElementById('btn2');

cashierBtn2.addEventListener('click', function(){
  window.location.href="adminLogin.php";
});


// let container = document.querySelector('.container');
// cashierBtn2.addEventListener('click', function(){
//     // container.classList.add('visible');
//     // this.style.background = 'green';
//     // cashierBtn.style.background ='blue';
//     window.location.href="adminLogin.php";
//   });
  
//   // container.classList.remove('visible');
//   // this.style.background = 'green';
//   // adminBtn.style.background ='blue';
//   window.location.href="login.php";
// });

// function validateEmail(){

//   var mail = document.querySelector("#username");
//   var password = document.querySelector('#pass');
//   var warning1 = document.querySelector('#require1_1');
//   var warning2 = document.querySelector('#require1_2');
//   var warning3 = document.querySelector('#require2');

//   if(mail.value=="" && password.value==""){
//     warning1.style.display = "block";
//     warning3.style.display = "block";
//   }
//   else if(mail.value==""){
//     warning1.style.display = "block";
//   }
//   else if(password.value==""){
//     warning3.style.display = "block";
//   }
//   else{
//     if(mail.value.indexOf("@")<0){
//       warning2.style.display = "block";
//     }
//     else{
//       window.location.href="home.html";
//     }
//   }
// }

// var mail = document.querySelector('#email');
// var password = document.querySelector('#pass');
// var warning1 = document.querySelector('#require1_1');
// var warning2 = document.querySelector('#require1_2');
// var warning3 = document.querySelector('#require2');

// mail.addEventListener('click', function() {
//   warning1.style.display = "none";
//   warning2.style.display = "none";
// });

// password.addEventListener('click', function() {
//     if(mail.value == ""){
//     warning1.style.display = "block";
//     }
//     warning3.style.display = "none";
// });


