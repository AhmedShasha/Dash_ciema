$(document).ready(function () {
  $(document).on("click", ".cta", function () {
    $(this).toggleClass("active");
  });
});

$(document).ready(function () {
  $(".hamburger").click(function () {
    $(".sidebar-menu").removeClass("flowHide");
    $(".sidebar-menu").toggleClass("full-side-bar");
    $(".nav-link-name").toggleClass("name-hide");
  });
});


$(".toggle").on("click", () => {
  $menu.toggleClass("is-active");
});

$(document).ready(function () {
  $(".nav-link").hover(
    function () {
      $(".sidebar-menu").removeClass("flowHide");
      $(this).addClass("tax-active");
    },
    function () {
      $(".sidebar-menu").addClass("flowHide");
      $(this).removeClass("tax-active");
    }
  );
});


$(document).ready(function(){

  $(".form-groub").on("input", function () {

    var acceptRatio = 1;
    var refuseRatio = 1;
    var total = parseFloat($(".total").val());

    
    $(".form-groub .accept").each(function () {
      var inputVal = parseFloat($(this).val());
      if ($.isNumeric(inputVal)) {
        acceptRatio = parseFloat( (inputVal / total) * 100 );
      }
    });

    $(".form-groub .refused").each(function () {
      var inputVal = parseFloat($(this).val());
      if ($.isNumeric(inputVal)) {
        refuseRatio = parseFloat( (inputVal / total) * 100 );
      }
    });

    $("#معدل_الجودة").text(acceptRatio);
    $("#نسبه_المرفوض").text(refuseRatio);
  });  

});
