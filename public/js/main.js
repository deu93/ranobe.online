function openCity(evt, cityName) {
    // Declare all variables
    let i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen").click();
  
  function openCity1(evt, cityName) {
    // Declare all variables
    let i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent1");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks1");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  document.getElementById("defaultOpen1").click();

let objDiv = document.getElementById("scroll_bar");
objDiv.scrollTop = - objDiv.scrollHeight;

$(document).ready(function () {
    // line height in 'px'
    var maxheight=65;
    var showText = 'Развернуть <i class="fas fa-chevron-down"></i>';
    var hideText = 'Свернуть <i class="fas fa-angle-up"></i>';
  
    $('.textContainer_Truncate').each(function () {
      var text = $(this);
      if (text.height() > maxheight){
          text.css({ 'overflow': 'hidden','height': maxheight + 'px' });
  
          var link = $('<a href="#">' + showText + '</a>');
          var linkDiv = $('<div class="select_btn"></div>');
          linkDiv.append(link);
          $(this).after(linkDiv);
  
          link.click(function (event) {
            event.preventDefault();
  
            if (text.height() > maxheight)  {
                $(this).html(showText);
                text.css('height', maxheight + 'px');
            } else {
                $(this).html(hideText);
                text.css('height', 'auto');
            }
          });
      }       
    });
  });
  $(document).ready(function () {
    // line height in 'px'
    var maxheight=25;
    var showText = 'Развернуть <i class="fas fa-chevron-down"></i>';
    var hideText = 'Свернуть <i class="fas fa-angle-up"></i>';
  
    $('.textContainer_Truncate1').each(function () {
      var text = $(this);
      if (text.height() > maxheight){
          text.css({ 'overflow': 'hidden','height': maxheight + 'px' });
  
          var link = $('<a href="#">' + showText + '</a>');
          var linkDiv = $('<div class="select_btn"></div>');
          linkDiv.append(link);
          $(this).after(linkDiv);
  
          link.click(function (event) {
            event.preventDefault();
  
            if (text.height() > maxheight)  {
                $(this).html(showText);
                text.css('height', maxheight + 'px');
            } else {
                $(this).html(hideText);
                text.css('height', 'auto');
            }
          });
      }       
    });
  });