var container = document.querySelector('.container');
var open_btn = document.getElementById('open_btn');
var close_btn = document.getElementById('close_btn');

open_btn.addEventListener('click', function() {
  container.classList.add('visible');
});
close_btn.addEventListener('click', function() {
  container.classList.remove('visible');
});