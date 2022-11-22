// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

function myValidation(event) {
  let id = event.target.id;
  let element = document.getElementById(`${id}_feedback`);
  let value = event.target.value;
  element.innerHTML = "";
  if (id == "phone_number") {
    checkEmpty(element, value, id);
    checkNumber(element, value, id);
    checkPhone(element, value, id);
    checkLeastCount(element, value, 10, id);
  } else if (id == "first_name") {
    checkEmpty(element, value, id);
    checkLetter(element, value, id);
    checkLeastCount(element, value, 3, id);
  } else if (id == "username") {
    checkEmpty(element, value, id);
    checkLeastCount(element, value, 3, id);
  } else if (id == "last_name") {
    checkEmpty(element, value, id);
    checkLetter(element, value, id);
    checkLeastCount(element, value, 3, id);
  }
}

function checkLetter(element, value, id) {
  if (!/^[a-zA-Z]+$/.test(event.target.value)) {
    element.innerHTML += `<li>${id} must have only letters</li>`;
  }
}

function checkNumber(element, value, id) {
  if (!/^[0-9]+$/.test(event.target.value)) {
    element.innerHTML += `<li>${id} must have only digits</li>`;
  }
}

function checkPhone(element, value, id) {
  if (!/^09$/.test(event.target.value)) {
    element.innerHTML += `<li>${id} must start with 09</li>`;
  }
}

function checkLeastCount(element, value, count, id) {
  if (value.length < count) {
    element.innerHTML += `<li>${id} must have at least ${count} character</li>`;
  }
}

function checkEmpty(element, value, id) {
  if (value.length == 0) {
    element.innerHTML += `<li>${id} must be fill</li>`;
  }
}
