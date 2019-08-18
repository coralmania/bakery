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
            passwordInputErrorMsg.html('Email or password are incorrect');
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


function onLogIn(googleUser){
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

function onSignIn(googleUser){
  var token = googleUser.getAuthResponse().id_token;
  if(token){
    $.ajax({
      url:'https://oauth2.googleapis.com/tokeninfo?id_token='+token,
      success:function (data){
        if(data){
          if (isUserExists(data)) {
            // alert();
            // window.location = 'index.php';
          }else{
            fillInForm(data);
          }
        }
      }
    })
  }
}
function isUserExists(data){
  $.ajax({
    url:'server/checkUser.php',
    type:'POST',
    acync:true,
    data:{data:data},
    success:function (data_temp){
      if (data_temp == 'have') {
        $.ajax({
          url:'server/logedInGoogle.php',
          data:({user_info:data}),
          type:'POST',
          success:function (data){
            window.location = 'index.php';
          }
        })
      }
    }
  })
}

function fillInForm(data){
    let email = document.querySelector('input[name="email"]');
    email = $(email);
    email.val(data.email);
    email.attr('disabled' , true)

    let fname = document.querySelector('input[name="fname"]');
    fname = $(fname);
    fname.val(data.given_name)
    fname.attr('disabled' , true)

    let lname = document.querySelector('input[name="lname"]');
    lname = $(lname);
    lname.val(data.family_name)
    lname.attr('disabled' , true)


    let passwords = document.querySelectorAll('div[data-id="password"]');
    passwords.forEach(function (element){
      element_temp = $(element).find('input');
      element_temp.val(data.at_hash);
      element_temp.attr('disabled' , true)
      $(element).hide(300)
    })

    var pgoneMsgGoogle = $('#phoneMsgGoogle');
    console.log(phoneMsgGoogle);
    pgoneMsgGoogle.text('We Got you info from google, phone requerd');
    pgoneMsgGoogle.css({
      "color":"green"
    })
    let phone = document.querySelector('input[name="phone"]');
    phone = $(phone);
    phone.css({
      'border': '2px solid green'
    })
    phone.focus();






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
      rePasswordInputErrorMsg.html('Confirm your password');
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
          if (data == 'OK') {
            window.location = 'index.php';
          }else if(data == 'have') {
            var msg = $('#emailHelp');
              msg.html('This Email is taken <a href="loginPage.php" > Maby its yours</a>')
              msg.focus();
          }
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
