$(document).ready(function() {
    var i = 6;
    setInterval(function() {
      i--;
      if (i < 1) {
        window.location = "http://www.tryhardhusky.com";
      }
      $("#r i").text(i);
    }, 1000);
  });