//Responsive menu and switch icon
$("#flip").click(function () {
  var listaMenu = $("#panel");

  if (listaMenu.is(":hidden") == true) {
    var icon = $("#flip").find("i");
    icon.removeClass("fa-solid fa-bars");
    icon.addClass("fa-solid fa-xmark");
    listaMenu.slideToggle();
  } else {
    var icon = $("#flip").find("i");
    icon.removeClass("fa-solid fa-xmark");
    icon.addClass("fa-solid fa-bars");
    listaMenu.slideToggle();
  }
});
