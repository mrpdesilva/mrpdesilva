function changeView() {

  var signUpBox = document.getElementById("signUpBox");
  var signInBox = document.getElementById("signInBox");

  signUpBox.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");

}

function signUp() {

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var mobile = document.getElementById("mobile");
  var gender = document.getElementById("gender");
  var status = '1';

  var form = new FormData();

  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("mobile", mobile.value);
  form.append("gender", gender.value);
  form.append("status", status);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "Success") {
        changeView();
      } else {
        document.getElementById("msg").innerHTML = request.responseText;
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  request.open('POST', "signUpProcess.php", true);
  request.send(form);

}

function signIn() {

  var email = document.getElementById("e");
  var password = document.getElementById("p");
  var rememberMe = document.getElementById("rememberMe");

  var form = new FormData();

  form.append("email", email.value);
  form.append("password", password.value);
  form.append("rememberMe", rememberMe.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      if (request.responseText == "Success") {
        window.location = "home.php";
      } else {
        document.getElementById("msg2").innerHTML = request.responseText;
        document.getElementById("msgdiv2").className = "d-block";
      }
    }
  };

  request.open("POST", "signInProcess.php", true);
  request.send(form);

}

function signOut() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "index.php";
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "signOutProcess.php", true);
  r.send();

}

var forgotPassword;

function forgotPassword() {

  var email = document.getElementById("e").value;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && this.status == 200) {
      if (request.responseText == "Success !!!") {
        alert(
          "Verification Code has Sent to Your Account. Please Check Your Inbox"
        );

        var forgotPasswordModal = document.getElementById("forgotPasswordModal");
        forgotPassword = new bootstrap.Modal(forgotPasswordModal);
        forgotPassword.show();
      } else {
        alert(request.responseText);
      }
    }
  };

  request.open("GET", "forgotPasswordProcess.php?e=" + email, true);
  request.send();

}

function showPassword1() {
  var new_pw = document.getElementById("new-pw");
  var eye = document.getElementById("e1");

  if (new_pw.type == "password") {
    new_pw.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    new_pw.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function showPassword2() {
  var retype_pw = document.getElementById("retype-pw");
  var eye = document.getElementById("e1");

  if (retype_pw.type == "password") {
    retype_pw.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    retype_pw.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function resetPassword() {
  var email = document.getElementById("e");
  var new_pw = document.getElementById("new-pw");
  var retype_pw = document.getElementById("retype-pw");
  var verification_code = document.getElementById("verification-code");

  var f = new FormData();

  f.append("email", email.value);
  f.append("new_pw", new_pw.value);
  f.append("retype_pw", retype_pw.value);
  f.append("verification_code", verification_code.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Password Reset Success !!!") {
        alert(t);
        window.location = "home.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "resetPasswordProcess.php", true);
  r.send(f);
}

function filePreview(id) {

  var fileId = id;

  var f = new FormData();

  f.append("FileId", fileId);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      window.open(request.responseText);
    }
  };

  request.open("POST", "filePreview.php", true);
  request.send(f);

}

function basicSearch(x) {

  var txt = document.getElementById("search-txt");
  var select = document.getElementById("search-select");

  var form = new FormData();

  form.append("t", txt.value);
  form.append("s", select.value);
  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      document.getElementById("basicSearchResult").innerHTML = request.responseText;
    }
  };

  request.open("POST", "basicSearchProcess.php", true);
  request.send(form);

}

function sort(x, id) {

  var categoryId = id;

  var selectYear = document.getElementById("year-select");

  var examination = 0;

  if (document.getElementById("first").checked) {
    examination = "1";
  } else if (document.getElementById("second").checked) {
    examination = "2";
  } else if (document.getElementById("third").checked) {
    examination = "3";
  } else if (document.getElementById("al").checked) {
    examination = "4";
  }

  var grade = 0;

  if (document.getElementById("gr12").checked) {
    grade = "2";
  } else if (document.getElementById("gr13").checked) {
    grade = "3";
  } else if (document.getElementById("gr-al").checked) {
    grade = "1";
  }

  var medium = 0;

  if (document.getElementById("eng").checked) {
    medium = "1";
  } else if (document.getElementById("sin").checked) {
    medium = "2";
  }

  var f = new FormData();

  f.append("selectYear", selectYear.value);
  f.append("examination", examination);
  f.append("grade", grade);
  f.append("medium", medium);
  f.append("categoryId", categoryId);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      document.getElementById("sort").innerHTML = r.responseText;
    }
  };

  r.open("POST", "sortProcess.php", true);
  r.send(f);

}

function notesSearch(x) {

  var search = document.getElementById("search-notes");

  var form = new FormData();

  form.append("search", search.value);
  form.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      document.getElementById("result").innerHTML = r.responseText;
    }
  };

  r.open("POST", "searchNotes.php", true);
  r.send(form);

}

function changeProfileImage (){
  var view = document.getElementById("veiwimg");
  var file = document.getElementById("profileimg");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateUserProfile (){
  
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var pwd = document.getElementById("pwd");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimg");

  var f = new FormData();

  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("mobile", mobile.value);
  f.append("pwd", pwd.value);
  f.append("line1", line1.value);
  f.append("line2", line2.value);
  f.append("province", province.value);
  f.append("district", district.value);
  f.append("city", city.value);
  f.append("pcode", pcode.value);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are you sure You don't want to Update your Profile Image ?"
    );

    if (confirmation) {
      alert("You have not selected any Image  ");
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && this.status == 200) {
      var t = r.responseText;
      if (t == "Success") {
        alert("Profile Update Success");
        window.location = "home.php";
        window.reload();
      }else{
        alert(t);
      }
    }
  };

  r.open("POST", "userProfileUpdateProcess.php", true);
  r.send(f);

}