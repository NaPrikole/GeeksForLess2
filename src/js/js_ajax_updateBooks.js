
  var uiResponse = document.getElementById("ui-response");
  var message = document.getElementById("message");
  var button = document.getElementById("updateBookByAjax");
  var originButtonValue = button.value;

  function displayErrors(errors) {
  var inputs = document.getElementsByTagName('input');
  for(i=0; i < inputs.length; i++) {
    var input = inputs[i];
    if(errors.indexOf(input.name) >= 0) {
      input.classList.add('error');
    }
  }
}

function clearErrors() {
  var inputs = document.getElementsByTagName('input');
  for(i=0; i < inputs.length; i++) {
    inputs[i].classList.remove('error');
  }
}

  function getResult(value) {
    message.innerHTML = value;
    uiResponse.style.display = 'block';
  }

  function clearResult() {
    message.innerHTML = '';
    uiResponse.style.display = 'none';
  }

  function showSpinner(){
    var spinner = document.getElementById("spinner");
    spinner.style.display = 'block';
  }

  function hideSpinner(){
    var spinner = document.getElementById("spinner");
    spinner.style.display = 'none';
  }

  function disableSubmitButton(){
    button.disabled = true;
    button.value = 'Loading...';
    button.style.background = 'green';
  }

  function enableSubmitButton(){
    button.disabled = false;
    button.value = originButtonValue;
    button.style = 'btn-info';
  }

  function getFormData(form) {
    var inputs = form.getElementsByTagName('input');
    var array = [];
    for(i=0; i < inputs.length; i++) {
      var inputNameValue = inputs[i].name + '=' + inputs[i].value;
      array.push(inputNameValue);
  }
    return array.join('&');
  }

  function getUiResponse() {
    clearResult();
    clearErrors();
    showSpinner();
    disableSubmitButton();

  var form = document.getElementById("update-book");
  var action = form.getAttribute("action");

  var form_data = new FormData(form);
  for ([key, value] of form_data.entries()) {
    console.log(key + ': ' + value);
  }

  var XMLRequest = new XMLHttpRequest();
  XMLRequest.open('POST', action, true);

  XMLRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  XMLRequest.onreadystatechange = function () {
    if(XMLRequest.readyState == 4 && XMLRequest.status == 200) {
      var result = XMLRequest.responseText;
      console.log('Result: ' + result);
      hideSpinner();
      enableSubmitButton();
      var json = JSON.parse(result);
      if(json.hasOwnProperty('errors') && json.errors.length > 0) {
        displayErrors(json.errors);
      } else {
        getResult(json.status);
      }
    }
  };
  XMLRequest.send(form_data);
  }

  button.addEventListener("click", getUiResponse);
