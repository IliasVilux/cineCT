document.addEventListener("DOMContentLoaded", function(){
		
    window.addEventListener('scroll', function() {
       
        if (window.scrollY > 200) {
            document.getElementById('navbar_top').classList.add('fixed-top');
        } else {
             document.getElementById('navbar_top').classList.remove('fixed-top');
        } 
    });
}); 