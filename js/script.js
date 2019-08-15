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


function onSignIn(googleUser){
  var token = googleUser.getAuthResponse().id_token;
  if(token){
    $.ajax({
      url:'https://oauth2.googleapis.com/tokeninfo?id_token='+token,
      success:function (data){
        if(data){
          googleLogin(data);
        }
      }
    })
  }
}

  function googleLogin(data){
    $.ajax({
      url:'server/logedInGoogle.php',
      data:{user_info:data},
      type:'POST',
      success:function (data){
        window.location =  'index.php';
      }
    })
  }

  function signin(){
    var valid_signin = true;
    var emailInputErrorMsg = $('#emailErrorMsg');
    var passwordInputErrorMsg = $('#passwordErrorMsg');
    var fnameInputErrorMsg = $('#fnameErrorMsg');
    var lnameInputErrorMsg = $('#lnameErrorMsg');
    var phoneInputErrorMsg = $('#phoneErrorMsg');
    var rePasswordInputErrorMsg = $('#re-passwordErrorMsg');
    var inputs = [
      emailInputErrorMsg,
      passwordInputErrorMsg,
      fnameInputErrorMsg,
      lnameInputErrorMsg,
      phoneInputErrorMsg,
      rePasswordInputErrorMsg
    ];
    clearMsg(inputs);
    var emailInput = $(document.querySelector('input[name="email"]')).val();
    var passwordInput = $(document.querySelector('input[name="password"]')).val();
    var fnameInput = $(document.querySelector('input[name="fname"]')).val();
    var lnameInput = $(document.querySelector('input[name="lname"]')).val();
    var phoneInput = $(document.querySelector('input[name="phone"]')).val();
    var rePasswordInput = $(document.querySelector('input[name="re_password"]')).val();

    if (!checkIfEmailValid(emailInput)) {
      emailInputErrorMsg.html('A valid email is requierd');
      valid_signin = false;
    }
    if (!checkIfPasswordValid(passwordInput)) {
      passwordInputErrorMsg.html('password is requierd');
      valid_signin = false;
    }
    if (!checkIfStringValid(fnameInput)) {
      fnameInputErrorMsg.html('First name is requiered');
      valid_signin = false;
    }
    if (!checkIfStringValid(lnameInput)) {
      lnameInputErrorMsg.html('Last name is requiered');
      valid_signin = false;
    }
    if (!checkIfPhoneValid(phoneInput)) {
      phoneInputErrorMsg.html('Enter a valid Phone number');
      valid_signin = false;
    }
    if (!checkIfRePasswordValid(passwordInput , rePasswordInput)) {
      rePasswordInput.html('Confirm your password');
      valid_signin = false;
    }


    if (valid_signin) {
      $.ajax({
        url: "server/signin.php",
        type:'POST',
        data:{
          email:emailInput,
          password:passwordInput,
          fname:fnameInput,
          lname:lnameInput,
          phone:phoneInput,
          re_password:rePasswordInput
        },
        success:function (data){
          console.log(data);
        }
      })
    }
  }


function checkIfRePasswordValid(password , rePasswordInput){
  if (password === rePasswordInput) {
    return true;
  }
}


function checkIfPhoneValid(input){
  if (Number(input) && new RegExp(/^\d{10}$/).test(input)) {
    return true;
  }
}


function checkEnter(e){
  if (e.key === 'Enter') {
    login();
  }
}

function checkIfPasswordValid(input){
  if ( (input.trim() == input) && input.length > 5) {
    return true;
  }
}

function checkIfStringValid(input){
  if (input && input.length >= 1) {
    return true;
  }
}



function checkIfEmailValid(input){
  if ((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input))){
    return true;
  }
  return false;
}
