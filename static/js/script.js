//te login forma
$(".register_form").hide(function () {
  $(".register").click(function () {
    $(".login_form").hide();
    $(".register_form").show();
  });
});
$(".login").click(function () {
  $(".register_form").hide();
  $(".login_form").show();
});

function validations_Login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("pasw").value;

  if (username == "" || password == "") {
    alert("Ploteso te gjitha te dhenat");
    return false;
  }
}

function validations_Register() {
  var name = document.getElementById("name").value;
  var lastname = document.getElementById("lname").value;
  var password = document.getElementById("pw").value;
  var email = document.getElementById("email").value;

  if (name == "" || lastname == "" || password == "" || email == "") {
    alert("Ploteso te gjitha te dhenat");
    return false;
  }
}
//te treatments
$(".pedicure_div").hide();
$(".gel_polish").hide();
$(".nail_art").hide();

$(".Pedicure").click(function () {
  $(".manicure_div").hide();
  $(".gel_polish").hide();
  $(".nail_art").hide();
  $(".pedicure_div").show();
});

$(".GelPolish").click(function () {
  $(".manicure_div").hide();
  $(".pedicure_div").hide();
  $(".nail_art").hide();
  $(".gel_polish").show();
});

$(".NailPolish").click(function () {
  $(".manicure_div").hide();
  $(".gel_polish").hide();
  $(".pedicure_div").hide();
  $(".nail_art").show();
});

$(".Manicure").click(function () {
  $(".manicure_div").show();
  $(".gel_polish").hide();
  $(".pedicure_div").hide();
  $(".nail_art").hide();
});

//Te admin forma

$(".treatments_div").hide();
$(".item_div").hide();
$(".booked_div").hide();

$(".users").click(function () {
  $(".users_div").show();
  $(".treatments_div").hide();
  $(".item_div").hide();
  $(".booked_div").hide();
});

$(".treatments").click(function () {
  $(".users_div").hide();
  $(".treatments_div").show();
  $(".item_div").hide();
  $(".booked_div").hide();
});

$(".item").click(function () {
  $(".users_div").hide();
  $(".treatments_div").hide();
  $(".item_div").show();
  $(".booked_div").hide();
});

$(".booked").click(function () {
  $(".users_div").hide();
  $(".treatments_div").hide();
  $(".booked_div").show();
  $(".item_div").hide();
});

//Popup Box

function showModal(id) {
  $(".popUp-box").show();
  $(".yesBtn").click(function () {
    $("#yes").attr("href", "delete.php?id=" + id);
  });
}

var elements = document.getElementsByClassName("delete");

for (var i = 0; elements.length; i++) {
  elements[i].addEventListener("click", function () {
    document.querySelector(".popUp-box").style.display = "flex";
  });
}

// document.getElementById("delete").addEventListener("click", function () {
//   document.querySelector(".popUp-box").style.display = "flex";
// });
// document.getElementById("cancel").addEventListener("click", function () {
//   document.querySelector(".popUp-box").style.display = "none";
// });

//Book it
