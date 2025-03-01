var tombolPopUp = document.getElementById("tombol-pop-up");
var popUp = document.getElementById("pop-up");
var tutupPopUp = document.getElementsByClassName("tutup-pop-up")[0];

tombolPopUp.onclick = function() {
  popUp.style.display = "block";
}

tutupPopUp.onclick = function() {
  popUp.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == popUp) {
    popUp.style.display = "none";
  }
}