$(document).ready(function () {

  var layout   = document.getElementById('layout'),
  menu     = document.getElementById('menu'),
  hamburgerLink = document.getElementById('hamburgerLink');

  function toggleClass(element, className) {
    var classes = element.className.split(/\s+/),
    length = classes.length,
    i = 0;

    for(; i < length; i++) {
      if (classes[i] === className) {
        classes.splice(i, 1);
        break;
      }
    }

    // The className is not found
    if (length === classes.length) {
      classes.push(className);
    }

    element.className = classes.join(' ');
  }

  hamburgerLink.onclick = function (e) {
    var active = 'active';

    e.preventDefault();
    toggleClass(layout, active);
    toggleClass(menu, active);
    toggleClass(hamburgerLink, active);
  };

  addChaptersMenuListener();

});

function addChaptersMenuListener() {
  $('#chaptersMenuLink').on("click", function(e) {
    var chapters = $("#chaptersMenu");
    var activeClassName = "pure-menu-active";

    if(chapters.hasClass(activeClassName)) {
      chapters.removeClass(activeClassName);
    }
    else {
      chapters.addClass(activeClassName);
    }
  });
};