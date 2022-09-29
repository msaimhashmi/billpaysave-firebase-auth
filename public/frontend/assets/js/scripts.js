// CUSTOM SIDENAVBAR
const body = document.querySelector("body"),
    nav = document.querySelector("nav"),
    sidebarOpen = document.querySelector(".sidebarOpen"),
    siderbarClose = document.querySelector(".siderbarClose");

//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
nav.classList.add("active");
});

body.addEventListener("click" , e =>{
let clickedElm = e.target;

if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
    nav.classList.remove("active");
}
});
// CUSTOM SIDENAVBAR

// Verify Input
$('.digit-group').find('input').each(function() {
    $(this).attr('maxlength', 1);
    $(this).on('keyup', function(e) {
    var parent = $($(this).parent());
    if(e.keyCode === 8 || e.keyCode === 37) {
    var prev = parent.find('input#' + $(this).data('previous'));
    if(prev.length) {
    $(prev).select();
    }
    } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
    var next = parent.find('input#' + $(this).data('next'));
    if(next.length) {
    $(next).select();
    } else {
    if(parent.data('autosubmit')) {
    parent.submit();
    }
    }
    }
    });
    });

 // OWL CAROUSEL
 $('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    dots:false,
    margin:10,
    autoplay:true,
    responsiveClass:true,

    responsive:{
        0:{
            items:3,
        },
        600:{
            items:3,
        },
        1000:{
            items:5,
        }
    }
});

// ON SCROLL NAVBAR
window.onscroll = function () {
    scrollFunction();
  };
  
  function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      document.getElementById("custom-navbar").style.padding = "20px 0px";
      document.getElementById("custom-navbar").style.backgroundColor = "#fff";    
      document.getElementById("custom-navbar").style.boxShadow = "0px 10px 20px 0.5px #00000010";
      document.getElementById("custom-navbar").style.transition = "all 0.5s";
    } else {
        document.getElementById("custom-navbar").style.padding = "20px 0px";
        document.getElementById("custom-navbar").style.backgroundColor = "transparent";
        document.getElementById("custom-navbar").style.boxShadow = "none";
    }
  } 