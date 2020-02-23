var app = angular.module("app", [], function($interpolateProvider, $) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller("controlador", function($scope, $http, $location) {
    var json = {};
    var height = screen.height;
    var width = screen.width;
    $scope.dataCheck = false;
    $scope.dataSend = false;
    $scope.gender = "HOMBRE";
    $scope.accept = false;
    $scope.shoes = "ADIDAS";
    $scope.distance = "10 K";
    $scope.team = "ADIDAS RUNNERS";
    $scope.time = "30 MIN";
    $scope.emailErr = false;
    $scope.namesErr = false;
    $scope.emailrErr = false;
    $scope.ageErr = false;
    $scope.lastErr = false;
    $scope.cityErr = false;
    $scope.verify = function(value) {


        $scope.dataCheck = value;
        console.log($scope.adidasForm.inputNames.$viewValue);
    }


    $scope.selectGender = function(value) {
        $scope.gender = value;
    }



    $scope.selectShoes = function(value) {
        $scope.shoes = value;
    }

    $scope.selectAge = function(value) {
        $scope.age = value;
    }

    $scope.selectTeam = function(value) {
        $scope.team = value;
    }

    $scope.selectDistance = function(value) {
        $scope.distance = value;
    }

    $scope.selectTime = function(value) {
        $scope.time = value;
    }

    $scope.sendData = function() {
        if (!$scope.adidasForm.inputEmail.$viewValue) {
            alert("Acepta los terminos y condiciones")
        }

        var data = {
            names: $scope.adidasForm.inputNames.$viewValue,
            last_names: $scope.adidasForm.inputLastnames.$viewValue,
            age: $scope.age,
            email: $scope.adidasForm.inputEmail.$viewValue,
            gender: $scope.gender,
            shoes: $scope.shoes,
            team: $scope.team,
            best_time: $scope.time,
            distance: $scope.distance,
            url: absUrl
        }
        console.log(data);


        $http.post("http://www.speedrunners.ml/api/v1/registration", JSON.stringify(data)).then((result) => {
            console.log(result, "Resuto 72");
            console.log("Aja");
            $scope.dataSend = true;
        }).catch((err) => {
            let a = err;
            console.log(document.getElementById('bazinga').scrollIntoView(), "leonardo");

            console.log(a);

            try {
                if (a.data.errors.email) {
                    console.log("activo el error");
                    $scope.emailErr = true
                }
            } catch (error) {

            }

            if ($scope.adidasForm.inputNames.$error.required) {
                $scope.namesErr = true
            }
            if ($scope.adidasForm.inputEmail.$error.required) {
                $scope.emailrErr = true
            }
            if ($scope.adidasForm.inputAge.$error.required) {
                $scope.ageErr = true
            }
            if ($scope.adidasForm.inputLastnames.$error.required) {
                $scope.lastErr = true
            }

            console.log($scope.adidasForm);
            console.log(err);
        });

    }
    var objetive1 = document.getElementById("objetive1");
    var objetive2 = document.getElementById("objetive2");
    var objetive3 = document.getElementById("objetive3");
    var obj1 = document.getElementById("obj1");
    var obj2 = document.getElementById("obj2");
    var obj3 = document.getElementById("obj3");
    var absUrl = $location.absUrl();
    console.log(absUrl);
    $scope.objetive1 = function() {
        console.log("testting");
        objetive1.classList.remove("filter")
        objetive2.classList.remove("active-img")
        objetive3.classList.remove("active-img")

        objetive1.classList.add("active-img");
        objetive1.removeAttribute("style")
        objetive2.removeAttribute("style")
        console.log("mobile");

        objetive1.style.height = objetive1.clientHeigh + 100;
        obj1.removeAttribute("style");

        objetive2.classList.add("filter");
        objetive3.classList.add("filter");
        obj2.style.display = "none";
        obj3.style.display = "none"

    }

    $scope.objetive2 = function() {
        console.log("testting");
        objetive2.classList.remove("filter")
        objetive1.classList.remove("active-img")
        objetive3.classList.remove("active-img")
        if (width >= 360 && width <= 414) {
            objetive2.classList.add("active-img");
            objetive1.style.transform = "translate(69px, -95px)"
            objetive1.style.maxWidth = "194px"
            objetive2.style.transform = "translate(-12px, 133px)"
            objetive2.style.maxWidth = "305px"
        }
        if (width >= 768 && width <= 1024) {
            objetive2.classList.add("active-img");
            objetive1.style.transform = "translate(200px, -210px)"
            objetive1.style.maxWidth = "322px"
            objetive2.style.transform = "translate(-136px, 203px)"
            objetive2.style.maxWidth = "450px"
        }
        if (width >= 1200 && width <= 1440) {
            objetive2.classList.add("active-img");
            objetive1.style.transform = "translate(136px, -220px)"
            objetive1.style.maxWidth = "317px"
            objetive2.style.transform = "translate(14px, -11px)"
            objetive2.style.maxWidth = "457px"
        }
        obj2.removeAttribute("style");

        objetive1.classList.add("filter");
        objetive3.classList.add("filter");
        objetive3.removeAttribute("style")
        obj1.style.display = "none";
        obj2.style.paddingTop = "5.5rem";
        obj3.style.display = "none"
    }

    $scope.objetive3 = function() {
        console.log("testting");
        objetive3.classList.remove("filter")
        objetive1.classList.remove("active-img")
        objetive2.classList.remove("active-img")
        objetive3.classList.add("active-img")
        obj3.removeAttribute("style");
        obj3.style.paddingTop = "5.5rem";

        objetive2.classList.add("filter");
        // objetive1.removeAttribute("style")
        // objetive2.removeAttribute("style")
        objetive1.classList.add("filter");
        obj1.style.display = "none";
        obj2.style.display = "none"
    }
    $scope.animacion = function() {
        document.getElementById("timeline").classList.add("slidelerlu");
        document.getElementById("statuc").classList.add("tracking-in-expand");
        document.getElementById("statud").classList.add("tracking-in-expand");
        document.getElementById("statuf").classList.add("tracking-in-expand");
        document.getElementById("statug").classList.add("tracking-in-expand2");
        document.getElementById("statuh").classList.add("tracking-in-expand2");
        /*
                document.getElementById("statu4").classList.add("tracking-in-expand4");*/
        document.getElementById("statu1").classList.add("tracking-in-expand");
        document.getElementById("statu2").classList.add("tracking-in-expand3");
        document.getElementById("statu3").classList.add("tracking-in-expand3");
        document.getElementById("statu4").classList.add("tracking-in-expand");
        document.getElementById("final1").classList.add("tracking-in-expand4");
        document.getElementById("final2").classList.add("tracking-in-expand4");
        document.getElementById("final3").classList.add("tracking-in-expand4");
        document.getElementById("final4").classList.add("tracking-in-expand4");


        console.log("Test");

    }
    var t = 0;
    window.onscroll = function() {
        // Obtenemos la posicion del scroll en pantall
        var scroll = document.documentElement.scrollTop || document.body.scrollTop;
        var x = document.getElementById("header").clientHeight;
        var y = document.getElementById("descrip").clientHeight;
        if (scroll > (x + y) - 400) {
            $scope.animacion();
        }
        // Realizamos alguna accion cuando el scroll este entre la posicion 300 y 400
        if (scroll > 1600 && scroll < 1800) {
            console.log("Pasaste la posicion 300 del scroll");
        }
    }

})