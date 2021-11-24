var container = document.querySelector('.container');
var open_btn = document.getElementById('open_btn');
var close_btn = document.getElementById('close_btn');

open_btn.addEventListener('click', function() {
  container.classList.add('visible');
});
close_btn.addEventListener('click', function() {
  container.classList.remove('visible');
}); 

//Delete cashiers:
var boxes = document.querySelectorAll('.box');
var del = document.querySelectorAll('.delete');
var ID = document.querySelectorAll('.ID');
for(var i=0; i<del.length; i++){
  del[i].id = (i+1);
  del[i].name = "sumbit"+(i+1);
  ID[i].id = (i+1);
  ID[i].name = "ID"+(i+1);
  boxes[i].id = (i+1);
  }

function funx(val1){
  for(var i=0; i<del.length; i++){
    var val2 = boxes[i].id;
    if(val1 == val2){
      boxes[i].remove();
    }
  }
}
  
// function delFunc(value){
//   for(var j=0; j<del.length&&ID.length; j++){
//   if(value == ID[j+1].id)
//     var getid=ID[i].innerHTML;
//     if(getid){
//       $.ajax({
//           url:'listCashiers.php',
//           type:'POST',
//           data:{
//               form_id:getid
//           },
//           success : function(response){
//             window.alert(working);
//         }      
//       });
//     }
//     return false;
//   }
// }