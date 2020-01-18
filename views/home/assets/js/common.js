$(document).ready(function() {
  $("form.ajax-auth-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var resultBox = form.find(".result");
    resultBox.html("...");
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      timeout: 10000,
      success: function(response) {
        resultBox.html(response);
        if (response == "شما با موفقیت لاگین شدید!") {
          $(".modal-dialog").fadeOut(2000, function() {
            window.location.replace("");
          });
        }
        if (response =="ثبت نام شما با موفقیت انجام شد!شما با موفقیت لاگین شدید!") {
          $(".modal-dialog").fadeOut(2000, function() {
            window.location.replace("");
          });
        }
      },
      error: function() {
        resultBox.html("خطایی رخ داده است!");
      }
    });
  });



  $(".ajfp").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var resultBox = form.find("#result");
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      timeout: 2000,
      success: function(response) {
        resultBox.html(response);
      },
      error: function() {
        resultBox.html("رمز جدید به ایمیل شما ارسال شد!");
      }
    });
  });


  $("form.ajax-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var resultBox = form.find(".result");
    resultBox.html("...");
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      timeout: 10000,
      success: function(response) {
        resultBox.html(response);
      },
      error: function() {
        resultBox.html("خطایی رخ داده است!");
      }
    });
  });

  $("form.ajax-admin-msg-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var resultBox = form.find(".result");
    resultBox.html("...");
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      timeout: 10000,
      success: function(response) {
        resultBox.html(response);
      },
      error: function() {
        resultBox.html("خطا درارسال پیام!");
      }
    });
  });

  $("form.ajax-msg-form").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var resultBox = form.find(".result");
    resultBox.html("...");
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      timeout: 10000,
      success: function(response) {
        resultBox.html(response);
      },
      error: function() {
        resultBox.html("خطایی رخ داده است!");
      }
    });
  });

  $(".image-modal").click(function(e) {
    e.preventDefault();
    var action = "http://salepic.test/profile/user/modalimage";
    var btn = $(this);
    $.ajax({
      type: "POST",
      url: action,
      data: {
        id: btn.attr("modal-id")
      },
      timeout: 10000,
      success: function(response) {
        response = JSON.parse(response);
        $("#modal-title").html(response.title);
        $("#img-modal").prop("src", response.link);
        $(".img-story").html(response.story);
      },
      error: function() {
        alert("Error");
      }
    });
  });

  $("#search-main").keyup(function() {
    $("#result").slideDown();
    var input = $(this);
    var action = "http://salepic.test/ajax-search";
    $.ajax({
      type: "post",
      url: action,
      data: input.serialize(),
      success: function(response) {
        $("#result").html(response);
        $("#result").css("cursor", "pointer");
        $("#result li").on("click", function() {
          $("#search-main").val($(this).text());
          $("#result").hide();
        });
      }
    });
  });

  $(".user-search").keyup(function() {
    $(".result").slideDown();
    var input = $(this);
    var action = "http://salepic.test/profile/public/ajax-search";
    $.ajax({
      type: "post",
      url: action,
      data: input.serialize(),
      success: function(response) {
        $(".result").html(response);
        $(".result").css("cursor", "pointer");
        $(".result li").on("click", function() {
          $(".user-search").val($(this).text());
          $(".result").hide();
        });
      }
    });
  });

  $(".like-btn").css("cursor", "pointer");

  $(".like-btn").click(function(e) {
    e.preventDefault();
    var action = "http://salepic.test/like/add";
    var btn = $(this);
    var countBox = btn.parent().find(".like-count");
    countBox.html("...");
    
    $.ajax({
      type: "POST",
      url: action,
      data: { entity: btn.attr("data-type"), id: btn.attr("data-id") },
      timeout: 10000,
      success: function(response) {
        response = JSON.parse(response);
        countBox.html(response.count);
        if (response.status != "error") {
          btn.removeClass("far").addClass("fas");
        }
      },
      error: function() {
        countBox.html("Error!");
      }
    });
  });

  $(".view-btn").click(function(e) {
    e.preventDefault();
    var action = "http://salepic.test/view/add";
    var btn = $(this);
    $.ajax({
      type: "POST",
      url: action,
      data: {
        id: btn.attr("data-id") ,
        entity: btn.attr("data-entity")
      },
      timeout: 10000,
      success: function(response) {
        response = JSON.parse(response);
          window.location.replace("http://salepic.test/image/"+response) ;     
      },
      error: function() {
        alert("Error!");
      }
    });
  });



  $('.flash-message').click(function() {
    $(this).fadeOut();
});

  
});
