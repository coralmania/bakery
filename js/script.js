function login(){
  var valid_login = true;
  var emailInputErrorMsg = $('#emailErrorMsg');
  var passwordInputErrorMsg = $('#passwordErrorMsg');
  var inputs = [emailInputErrorMsg, passwordInputErrorMsg];
  clearMsg(inputs);
  var emailInput = $(document.querySelector('input[name="email"]')).val();
  var passwordInput = $(document.querySelector('input[name="password"]')).val();
    if (!checkIfEmailValid(emailInput)) {
      emailInputErrorMsg.html('A valid email is requierd');
      valid_login = false;
    }
    if (!checkIfPasswordValid(passwordInput)) {
      passwordInputErrorMsg.html('password is requierd');
      valid_login = false;
    }

// CAN ADD MORE CONSITIONS
    if (valid_login) {
      $.ajax({
        url:'server/login.php',
        data:({email:emailInput, password:passwordInput}),
        type:'POST',
        success:function (data){
          if (data == 'OK') {
            window.location = "index.php";
          }else if(data == 'somthing_not_ok'){
            passwordInputErrorMsg.html('SOMTHING WENT WRONG');
          }
        }
      })
    }else{
      console.log('here');
    }
}

function clearMsg(inputs){
  if (typeof(inputs) == 'object') {
    inputs.forEach(function (element){
      element.html('');
    })
  }
}


function checkEnter(e){
  console.log(e);
  if (e.key === 'Enter') {
    login();
  }
}

function checkIfPasswordValid(input){
  if ( (input.trim() == input) && input.length > 5) {
    return true;
  }
}




function checkIfEmailValid(input){
  if ((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input))){
    return true;
  }
  return false;
}
