function myLogPassword(){

   var a = document.getElementById('logpassword');
   var b = document.getElementById('eye');
   var c = document.getElementById('eye-slash');

   if(a.type === "password"){
       a.type = "text"
       b.style.opacity = "0";
       c.style.opacity = "1";

   }else {
       a.type = "password"
       b.style.opacity = "1";
       c.style.opacity = "0";
   }
   
}
function myRegPassword(){

   var a = document.getElementById('regpassword');
   var b = document.getElementById('eye');
   var c = document.getElementById('eye-slash');

   if(a.type === "password"){
       a.type = "text"
       b.style.opacity = "0";
       c.style.opacity = "1";

   }else {
       a.type = "password"
       b.style.opacity = "1";
       c.style.opacity = "0";
   }
   
}
function myRegPassword2(){

   var a = document.getElementById('regpassword2');
   var b = document.getElementById('eye2');
   var c = document.getElementById('eye-slash2');

   if(a.type === "password"){
       a.type = "text"
       b.style.opacity = "0";
       c.style.opacity = "1";

   }else {
       a.type = "password"
       b.style.opacity = "1";
       c.style.opacity = "0";
   }
   
}

function myNewPassword(){

   var a = document.getElementById('newpassword');
   var b = document.getElementById('eye');
   var c = document.getElementById('eye-slash');

   if(a.type === "password"){
       a.type = "text"
       b.style.opacity = "0";
       c.style.opacity = "1";

   }else {
       a.type = "password"
       b.style.opacity = "1";
       c.style.opacity = "0";
   }
   
}

function myNewPassword2(){

   var a = document.getElementById('newpassword2');
   var b = document.getElementById('eye2');
   var c = document.getElementById('eye-slash2');

   if(a.type === "password"){
       a.type = "text"
       b.style.opacity = "0";
       c.style.opacity = "1";

   }else {
       a.type = "password"
       b.style.opacity = "1";
       c.style.opacity = "0";
   }
   
}

window.onscroll = () =>{  
   profile.classList.remove('active');
   cart.classList.remove('active');
   notif.classList.remove('active');
}

function fadeOut(){
   setInterval(loader, 1200);
}
function loader(){
   document.querySelector('.loader').style.display = 'none';
}

window.onload = fadeOut;

$('.custom-file-input').change(function (e) {
   if (e.target.files.length) {
       $(this).next('.custom-file-label').html(e.target.files[0].name);
   }
});

function orderFrom() {
     location.href = "user_profile_update.php"
}
function dnto(word){
   $("#dnto").val(word);
   $("#dnto_text").html(word);
   
 }

 function payMethod(word){
   $("#pay_method").val(word);
   if(word == "GCash"){
      $("#gcash-method").css("opacity", "1");
      $("#ss-image").css("opacity", "1");
      $("#upload-ss").css("display", "block");
      $("#gcash-method").css("z-index", "1");
      $("#ss-image").css("z-index", "1");
      $("#cash-method").css("opacity", "0");
      $("#cash-method").css("z-index", "-1");
      $("#trm").popover('enable')
      $("#gcash-method").css("animation", "transitionIn-Y-bottom .7s");
      $("#ss-image").css("animation", "transitionIn-Y-bottom .7s");
      $("#upload-ss").css("animation", "transitionIn-Y-bottom .7s");
      $("#cash-method").css("animation", "none");
      $("#file").prop("required", true);
      $("#check").prop("required", true);
   }
   else{
      $("#cash-method").css("opacity", "1");
      $("#cash-method").css("z-index", "1");
      $("#check-terms").css("opacity", "1");
      $("#gcash-method").css("opacity", "0");
      $("#ss-image").css("opacity", "0");
      $("#upload-ss").css("display", "none");
      $("#gcash-method").css("z-index", "-1");
      $("#ss-image").css("z-index", "-1");
      $("#trm").popover('disable')
      $("#cash-method").css("animation", "transitionIn-Y-bottom .7s");
      $("#gcash-method").css("animation", "none");
      $("#ss-image").css("animation", "none");
      $("#upload-ss").css("animation", "none");
      $("#file").prop("required", false);
      $("#check").prop("required", true);
   }
 }
 let copyText = document.querySelector(".copy-text");
 copyText.querySelector("button").addEventListener("click", function () {
    let input = copyText.querySelector("input.text");
    input.select();
    document.execCommand("copy");
    copyText.classList.add("active");
    window.getSelection().removeAllRanges();
    setTimeout(function () {
       copyText.classList.remove("active");
    }, 2000);
 });
  

(function() {
  
   'use strict';
 
   $('.input-file').each(function() {
     var $input = $(this),
         $label = $input.next('.js-labelFile'),
         labelVal = $label.html();
     
    $input.on('change', function(element) {
       var fileName = '';
       if (element.target.value) fileName = element.target.value.split('\\').pop();
       fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
    });
   });
 
 })();