/* Когда пользователь нажимает на кнопку,
переключение между скрытием и отображением раскрывающегося содержимого */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

function authDropdown() {
    document.getElementById("authDropdown").classList.toggle("show");
    
 }
 window.onclick = function(event) {
  if(!event.target.matches('button.button_style')){

    if(!event.target.matches('i.fas.fa-cog')){
     if (!event.target.matches('i.fas.fa-bars')) {
       if((!event.target.matches('i.fas.fa-user-alt'))) {
         let dropdowns = document.getElementsByClassName("dropdown-content");
         let i;
         for (i = 0; i < dropdowns.length; i++) {
           let openDropdown = dropdowns[i];
           if (openDropdown.classList.contains('show')) {
             openDropdown.classList.remove('show');
           }
         }
       }
     }
    }
  }
   
}
  
  

$('body').append('<div class="upbtn"></div>');            
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('.upbtn').css({
            bottom: '15px'
        });
        } else {
        $('.upbtn').css({
            bottom: '-80px'
        });
    }
});
$('.upbtn').on('click',function() {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
    return false;
});  

function menuStyles() {
  document.getElementById("menuStyles").classList.toggle("show");
}

size=14;


$("#fontIncrem").on("click",function(){
  console.log
  size=size+1;
   $("reader_container").css("font-size",size + "px");
   
  //  
});
localFontSize = localStorage.getItem('fontSize')
localLineHeight = localStorage.getItem('line-height')
if(typeof(localFontSize) != "undefined" && localFontSize !== null) {
  fontSize = localFontSize;
  
  $("#fontCurrent").text(fontSize);
  
}else {
  fontSize = 14;
  $("#fontCurrent").text(fontSize);
  textBoxes.css("font-size", fontSize);
}
if(typeof(localLineHeight) != "undefined" && localLineHeight !== null) {
  lineHeight = localLineHeight;
  
  $("#lhCurrent").text(lineHeight);
  
}else {
  lineHeight = 1.8;
  $("#lhCurrent").text(lineHeight);
  
}
$('.reader_container_text').css({fontSize: fontSize+'px'});
$('.reader_container_text').css({lineHeight: lineHeight});


$("#fontDecrem").click(function() {
  
  var textBoxes = $('.reader_container_text');
   fontSize--;
   textBoxes.css("font-size", fontSize);
   localStorage.setItem('fontSize', fontSize)
   $("#fontCurrent").text(fontSize);
 });
$("#lhDecrem").click(function() {
  $("#lhCurrent").text(lineHeight);
  var textBoxes = $('.reader_container_text');
   lineHeight -= 0.1;
   textBoxes.css("line-height", lineHeight);
   localStorage.setItem('lineHeight', lineHeight)
   console.log(lineHeight)
 });
$("#lhIncrem").click(function() {
  $("#lhCurrent").text(lineHeight);
  var textBoxes = $('.reader_container_text');
   lineHeight +=  0.1;
   textBoxes.css("line-height", lineHeight);
   localStorage.setItem('lineHeight', lineHeight)
   console.log(lineHeight)
 });
 
// $("#fontDecrem").on("click",function(){
  
//   var textBoxes = $('.');
//    var fontSize = getCurrentFontSize(textBoxes);
//     textBoxes.css("font-size", fontSize - 1);
   
// });




  