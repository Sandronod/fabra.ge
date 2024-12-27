var english = document.getElementById("en"),
    georgian = document.getElementById("ge");
    // function
    english.addEventListener("click", function() {
        document.getElementById("en").style.display = "none";
        document.getElementById("ge").style.display ="block";
      }
    );
    georgian.addEventListener("click", function() {
        document.getElementById("ge").style.display = "none";
        document.getElementById("en").style.display = "block";
      }
    );
//   mobile burger bar
var enMob = document.getElementById("enMobile"),
    geMob = document.getElementById("geMobile");


    enMob.addEventListener("click", function() {
        document.getElementById("enMobile").style.display = "none";
        document.getElementById("geMobile").style.display ="block";
      }
    );
    geMob.addEventListener("click", function() {
        document.getElementById("geMobile").style.display = "none";
        document.getElementById("enMobile").style.display = "block";
      }
);
    