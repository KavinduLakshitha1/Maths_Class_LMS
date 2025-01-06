// const { default: videojs } = require("video.js");

function togglebox() {
  var signInbox = document.getElementById("signInBox");
  var signUpbox = document.getElementById("signUpBox");

  signInbox.classList.toggle("d-none");
  signUpbox.classList.toggle("d-none");
}

// document.querySelectorAll('#tabs>li').forEach((el, index) =>
//     el.addEventListener('click', () => {
//       document.querySelector('#container>.active').classList.remove('active');
//       document.querySelector(`#container>:nth-child(${index + 1})`).classList.add('active');
//     })
// );

// function contentloader(){
// var tabs = document.getElementById("tabs").tabIndex[0];

//     var dashboard = document.getElementById("dashboard");
//     var profile = document.getElementById("profile");
//     var videoDiv = document.getElementById("videoDiv");

//     dashboard.classList.toggle("d-none");
//     profile.classList.toggle("d-none");
//     // profile.classList.add("p-3 bg-success-subtle");
//     videoDiv.classList.toggle("d-none");

// }

function contentloader(evt, divname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" btn-success", "");
  }
  document.getElementById(divname).style.display = "block";
  evt.currentTarget.className += " btn-success";
}
document.getElementById("defaultOpen").click();



// function videomark() {
//   var player = videojs('my-video');

//   videojs(player, {
//     controls: true,
//     autoplay: false,
//     preload: 'auto',

//     image: 'images/icon.png',
//     position: "top-right",
//     "fadeTime": null
//   });

//   player.watermark();
// }

function loadchart() {
  const ctx = document.getElementById('chart1');

  // alert("hi");
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November', 'December'],
      datasets: [{
        label: 'Marks on paper',
        data: [85, 90, 60, 55, 22, 93, 75, 85, 69, 84, 72, 86],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // require(['https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js'], function (Chart) {
  //     var ctx = document.getElementById('chart1').getContext('2d');
  //     var chart = new Chart(ctx, {
  //         // The type of chart we want to create
  //         type: 'line',

  //         // The data for our dataset
  //         data: {
  //             labels: ["January", "February", "March", "April", "May", "June", "July"],
  //             datasets: [{
  //                 label: "My First dataset",
  //                 backgroundColor: 'rgb(255, 99, 132)',
  //                 borderColor: 'rgb(255, 99, 132)',
  //                 data: [0, 10, 5, 2, 20, 30, 45],
  //             }]
  //         },

  //         // Configuration options go here
  //         options: {}
  //     });
  // })

}

function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var nic = document.getElementById("nic");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("confirm-password");
  var gender = document.getElementById("gender");

  if (password.value != confirm_password.value) {
    alert("Your password and confirm password doesn't match please re check");
  }

  // alert(fname.value);

  var form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("email", email.value);
  form.append("nic", nic.value);
  form.append("mobile", mobile.value);
  form.append("password", password.value);
  form.append("gender", gender.value);

  var request = new XMLHttpRequest;

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var responseText = request.responseText;
      if (responseText == "success") {
        togglebox();
      } else {
        Swal.fire({
          icon: "error",
          title: "Warning",
          text: responseText,

        });
      }
    }
  }
  request.open("POST", "signupProcess.php", true);
  request.send(form);
}


function signIn() {
  var mobile = document.getElementById("mobilenum");
  var password = document.getElementById("password1");
  var rememberme = document.getElementById("rme");

  var form = new FormData();
  form.append("mobile", mobile.value);
  form.append("password", password.value);
  form.append("rememberme", rememberme.checked);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 & req.status == 200) {
      var response = req.responseText;

      if (response == "success") {
        alert(response);
        window.location.href = "dashboard.php";
      } else {


        Swal.fire({
          icon: "error",
          title: "Warning",
          text: response,

        });
      }
    }
  }

  req.open("POST", "signInProcess.php", true);
  req.send(form);
}


function forgotpassword() {
  var mobile = document.getElementById("mobilenum");
  alert("Wait a moment");

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      if (response == "Message has been sent. Please check your email box") {
        Swal.fire({
          icon: "success",
          title: "success",
          text: response,

        });
      } else {
        Swal.fire({
          icon: "info",
          title: "Info",
          text: response,

        });
      }

    }
  }

  req.open("GET", "forgotpasswordProcess.php?mobile=" + mobile.value, true);
  req.send();
}

function resetpassword() {
  var pass = document.getElementById("password1");
  var repass = document.getElementById("re-password");
  var vcode = document.getElementById("vcode");



  var form = new FormData();
  form.append("p", pass.value);
  form.append("rtp", repass.value);
  form.append("vcode", vcode.value);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      if (response == "success") {
        window.location = "index.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Warning",
          text: response,

        });

      }
    }
  }

  req.open("POST", "resetpassword.php", true);
  req.send(form);
}

function adminsignIn() {
  var email = document.getElementById("adminemail");
  var password = document.getElementById("adminpassword");



  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      if (response == "success") {
        window.location = "admin-dashboard.php";
      } else {

        Swal.fire({
          icon: "error",
          title: "Warning",
          text: response,

        });
      }
    }
  }
  req.open("POST", "adminSignInProcess.php", true);
  req.send(form)
}

function adminchangepassword() {
  var email = document.getElementById("email");
  alert(email)
  alert("Wait a moment");

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;

      if (response == "Message has been sent. Please check your email box") {
        Swal.fire({
          icon: "info",
          title: "Ok",
          text: response,

        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Warning",
          text: response,

        });
      }
    }
  }

  req.open("GET", "adminChangePasswordProcess.php?email=" + email.value, true);
  req.send();

}

function resetAdminpassword() {
  var pass = document.getElementById("password1");
  var repass = document.getElementById("re-password");
  var vcode = document.getElementById("vcode");



  var form = new FormData();
  form.append("p", pass.value);
  form.append("rtp", repass.value);
  form.append("vcode", vcode.value);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      if (response == "success") {
        window.location = "admin-signIn.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Warning",
          text: response,

        });

      }
    }
  }

  req.open("POST", "resetadminpassword.php", true);
  req.send(form);
}

function uploadVideo() {
  var subject = document.getElementById("videosubject");
  var teacher = document.getElementById("videoteacher");
  var title = document.getElementById("title");
  var description = document.getElementById("desc");
  var thumbnail = document.getElementById("thumbnail");
  var video = document.getElementById("video");


  var form = new FormData();
  form.append("subject", subject.value);
  form.append("teacher", teacher.value);
  form.append("title", title.value);
  form.append("description", description.value);
  form.append("thumbnail", thumbnail.files[0]);
  form.append("video", video.files[0]);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
    }
  }

  req.open("POST", "uploadVideoProcess.php", true);
  req.send(form);

}

function uploadResource() {

  var subject = document.getElementById("rssubject");
  var teacher = document.getElementById("rsteacher");
  var title = document.getElementById("rstitle");
  var desc = document.getElementById("rsdesc");
  var resource = document.getElementById("rs");


  var form = new FormData();
  form.append("subject", subject.value);
  form.append("teacher", teacher.value);
  form.append("title", title.value);
  form.append("desc", desc.value);
  form.append("resource", resource.files[0]);

  var req = new XMLHttpRequest;

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
    }
  }
  req.open("POST", "uploadResources.php", true);
  req.send(form);


}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var nic = document.getElementById("nic");
  var mobile = document.getElementById("mobile");




  var form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("email", email.value);
  form.append("nic", nic.value);
  form.append("mobile", mobile.value);



  var request = new XMLHttpRequest;

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var responseText = request.responseText;
      if (responseText == "success") {
        alert(responseText);
        window.location.reload(true);
      } else {

        alert(responseText);
      }
    }
  }
  request.open("POST", "updateProfile.php", true);
  request.send(form);
}


var updateResourcemodel;
function updateResources(id) {

  var modelid = document.getElementById("updateResources" + id);
  updateResourcemodel = new bootstrap.Modal(modelid);
  updateResourcemodel.show();
}



function updateResourceProcess(id) {
  var title = document.getElementById("uprstitle");
  var description = document.getElementById("uprsdesc");
  var rsid = id

  var form = new FormData();
  form.append("id", rsid);
  form.append("title", title.value);
  form.append("desc", description.value);

  alert(rsid.value);
  alert(title.value);
  alert(description.value);


  var req = new XMLHttpRequest;
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);

    }
  }
  req.open("POST", "updateResourcesProcess.php", true);
  req.send(form);
}




var updateVideomodel;
function updateVideos(id) {
  var modelid = document.getElementById("videoUpdateModal" + id);
  updateVideomodel = new bootstrap.Modal(modelid);
  updateVideomodel.show();
}

function updateVideoProcess(id) {

  var title = document.getElementById("uptitle" + id);
  var description = document.getElementById("updesc" + id);
  var rsid = id;

  var form = new FormData();
  form.append("id", rsid);
  form.append("title", title.value);
  form.append("desc", description.value);



  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
    }
  };
  req.open("POST", "updateVideoProcess.php", true);
  req.send(form);
}

function userStatusChanger(mobile) {



  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
      location.reload(true);
    }
  };

  req.open("GET", "userStatusChanger.php?mobile=" + mobile, true);
  req.send();
}

function videoStatusChanger(id) {
  alert(id);


  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
      location.reload(true);
    }
  };

  req.open("GET", "videoStatusChanger.php?id=" + id, true);
  req.send();
}



function resourcesStatusChanger(id) {




  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
      location.reload(true);
    }
  };

  req.open("GET", "resourcesStatusChanger.php?id=" + id, true);
  req.send();
}

function showVideo(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      // alert(response);

      window.location.href = "video.php?id=" + id;

    }
  };

  req.open("GET", "video.php?id=" + id, true);
  req.send();
}

function addToCheckOut() {
  var subject = document.getElementById("paymentsubject");
  var teacher = document.getElementById("paymentteacher");
  var month = document.getElementById("paymentmonth");
  var mobile = document.getElementById("userpaymobile");

  var form = new FormData();
  form.append("subject", subject.value);
  form.append("teacher", teacher.value);
  form.append("month", month.value);
  form.append("mobile", mobile.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      if (response == "success") {
        location.reload(true);
      } else {
        alert(response);
      }
    }
  };

  req.open("POST", "addCheckoutProcess.php", true);
  req.send(form);
}

function deletecheck(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      alert(response);
      location.reload(true);
    }
  };

  req.open("GET", "checkDelete.php?id=" + id, true);
  req.send();
}

// var buynowModal;
// function updateVideos() {
//   var modelid = document.getElementById("buyNowModal");
//   buynowModal = new bootstrap.Modal(modelid);
//   buynowModal.show();
// }

function paynowProcess() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var adl1 = document.getElementById("adl1").value;
  var adl2 = document.getElementById("adl2").value;
  var city = document.getElementById("city").value;
  var email = document.getElementById("payemail").value;
  var mobile = document.getElementById("paymobile").value;
  var total = document.getElementById("paytotal").value;

  alert()
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;

      var obj = JSON.parse(response);

      // console.log(response);



      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);

        alert("Payment completed. OrderID:" + orderId);
        saveInvoice(orderId, total);

      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
      };

      // Put the payment variables here
      var payment = {
        "sandbox": true,
        "merchant_id": obj["mid"],    // Replace your Merchant ID
        "return_url": "http://localhost/MathsClass/dashboard.php",   // Important
        "cancel_url": "http://localhost/MathsClass/dashboard.php",   // Important
        "notify_url": "http://sample.com/notify",
        "order_id": obj["id"],
        "items": "Class Fee",
        "amount": total + ".00",
        "currency": "LKR",
        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
        "first_name": fname,
        "last_name": lname,
        "email": email,
        "phone": mobile,
        "address": adl1 + " " + adl2,
        "city": city,
        "country": "Sri Lanka",

        // "custom_1": "",
        // "custom_2": ""
      };

      // Show the payhere.js popup, when "PayHere Pay" is clicked
      // document.getElementById('payhere-payment').onclick = function (e) {
      payhere.startPayment(payment);
      // };



    }
  }

  request.open("GET", "payNowProcess.php?total=" + total, true);
  request.send();
}

function payNow() {

  var form = new FormData();
  form.append("cart", true);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var json = req.responseText;

      var resp = JSON.parse(json);
      if (resp.status == "success") {
        doCheckOut(resp.payement, "checkoutProcess.php");
      } else {
        showAlert("Warning", resp.error, "warning");
      }

    }
  }

  req.open("POST", "paymentProcess.php", true);
  req.send(form);

}
function saveInvoice(orderId, amount) {

  var form = new FormData();
  form.append("o", orderId);
  form.append("a", amount);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 & request.readyState == 4) {
      var response = request.responseText;

      if (response == "success") {
        window.location = "invoice.php?id=" + orderId;
      } else {
        alert(response);
      }
    }
  }

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);

}
function printresource() {
  alert("hi");
  var content = document.body.innerHTML;
  var printcon = document.getElementById("resourcetable").innerHTML;
  document.body.innerHTML = printcon;
  window.print();
  document.body.innerHTML = content;
}

function printvideos() {
  alert("hi");
  var content = document.body.innerHTML;
  var printcon = document.getElementById("videotable").innerHTML;
  document.body.innerHTML = printcon;
  window.print();
  document.body.innerHTML = content;
}

function printusers() {
  alert("hi");
  var content = document.body.innerHTML;
  var printcon = document.getElementById("usertable").innerHTML;
  document.body.innerHTML = printcon;
  window.print();
  document.body.innerHTML = content;
}