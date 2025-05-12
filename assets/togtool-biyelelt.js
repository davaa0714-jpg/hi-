$(document).ready(function () {
  const default_mode = "tog-biyelelt3";
  let storedMode = sessionStorage.getItem("tog");
  if (!storedMode) {
    sessionStorage.setItem("tog", default_mode);
    // let_defValue = sessionStorage.getItem('item');
    $(".tog-biyelelt3").show();
    $(".tog-biyelelt2").hide();
    $(".tog-biyelelt1").hide();
    $(".third").addClass("active-filter");
  } else if (storedMode == "tog-biyelelt3") {
    $(".tog-biyelelt3").show();
    $(".tog-biyelelt2").hide();
    $(".tog-biyelelt1").hide();
    $(".third").addClass("active-filter");
  } else if (storedMode == "tog-biyelelt2") {
    $(".tog-biyelelt3").hide();
    $(".tog-biyelelt2").show();
    $(".tog-biyelelt1").hide();
    $(".second").addClass("active-filter");
  } else {
    $(".tog-biyelelt3").hide();
    $(".tog-biyelelt2").hide();
    $(".tog-biyelelt1").show();
    $(".first").addClass("active-filter");
  }

  $(".filter-item").click(function () {
    const value = $(this).attr("data-filter");
    sessionStorage.setItem("tog", value);
    let stored = sessionStorage.getItem("tog");
    if (stored == "tog-biyelelt3") {
      $(".tog-biyelelt3").show();
      $(".tog-biyelelt2").hide();
      $(".tog-biyelelt1").hide();
    } else if (stored == "tog-biyelelt2") {
      $(".tog-biyelelt3").hide();
      $(".tog-biyelelt2").show();
      $(".tog-biyelelt1").hide();
    } else {
      $(".tog-biyelelt3").hide();
      $(".tog-biyelelt2").hide();
      $(".tog-biyelelt1").show();
    }
  });
  $(".filter-item").click(function () {
    $(this).addClass("active-filter").siblings().removeClass("active-filter");
  });
});
