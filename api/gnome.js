function gnomed() {
    var gnome = document.getElementById('gnome');
    var stolen_img = document.getElementById('stolen_item');
    var gnomed_txt = document.getElementById('gnomed_txt');
    // gnome.style.display = 'block';
    if (gnome.style.bottom === '0%') {
        gnome.style.bottom = '-100%';
      } else {
        gnome.style.transition = 'bottom 0.5s ease-in-out, left 0.5s ease-in-out';
        gnome.style.bottom = '-20%';
      }
    if (gnome.style.bottom === '-20%') {
        
        // looking around
        setTimeout(function () {
            gnome.style.transition = 'none';
            gnome.style.transform = 'scaleX(1)';
        },1300);
        setTimeout(function () {
            gnome.style.transform = 'scaleX(-1)';
        },1800);
        // laughing
        setTimeout(function () {
            gnome.style.transition = 'bottom 0.5s ease-in-out, left 0.5s ease-in-out';
            gnome.style.bottom = '-10%';
        },2000);
        setTimeout(function () {
            gnome.style.bottom = '-20%';
        },2100);
        setTimeout(function () {
            gnome.style.bottom = '-10%';
        },2200);
        setTimeout(function () {
            gnome.style.bottom = '-20%';
        },2300);
        setTimeout(function () {
            gnome.style.bottom = '-10%';
        },2400);
        setTimeout(function () {
            gnome.style.bottom = '-20%';
        },2500);
        setTimeout(function () {
            gnome.style.bottom = '-10%';
        },2600);
        setTimeout(function () {
            gnome.style.bottom = '-20%';
        },2700);
        
        setTimeout(function () {
            gnome.style.transition = 'bottom 0.5s ease-in-out, left 0.5s ease-in-out';
            gnome.style.position = 'absolute';
            gnome.style.left = '-3%';
            gnome.style.bottom = '50%';
            // gnome.style.transform = 'rotate(60deg)';
        },3000);
        setTimeout(function () {
            gnome.style.transform = 'rotate(40deg)';
        },3350);
        setTimeout(function () {
            gnome.style.transition = 'transform 0.1s ease-in-out';
            gnome.style.transform = 'rotate(60deg)';
        },4000);
        setTimeout(function () {
            document.getElementById('main_img').style.display = 'none';
            stolen_img.style.display = 'block';
        },4050);
        setTimeout(function () {
            gnome.style.transform = 'rotate(40deg)';
            stolen_img.style.top = "260px";
            stolen_img.style.left = "80px";
        },4100);
        setTimeout(function () {
            gnome.style.transition = 'left 0.5s ease-in-out';
            stolen_img.style.transition = 'left 0.5s ease-in-out';
            gnome.style.left = "-50%"
            stolen_img.style.left = "-500px"
        },4500);
        setTimeout(function () {
            gnome.style.transition = 'left 0.375s ease-in-out';
            gnomed_txt.style.transition = 'left 0.5s ease-in-out';
            gnome.style.left = "5%"
            gnome.style.transform = 'rotate(0deg)';
            gnomed_txt.style.left = "230px";
        },5000);
        setTimeout(function () {
            gnome.style.left = "-50%"
        },5800);
    }
}