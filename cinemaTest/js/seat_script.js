function isCheck() {
  var checkBox = document.getElementById("check");
  if (checkBox.checked == true) {
    checkBox.parentElement.classList.add("selected");
  } else {
    checkBox.parentElement.classList.remove("selected");
  }
}
