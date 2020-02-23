var app = angular.module("app", []);

app.controller("controlador", function($scope, $http, $location) {
    var json = {};

    $scope.dataCheck = false;
    $scope.dataSend = false;
    $scope.gender = "HOMBRE";
    $scope.age = "18 - 25";
    $scope.shoes = "ADIDAS";
    $scope.distance = "10 K";
    $scope.team = "ADIDAS RUNNERS";
    $scope.time = "30 MIN";
    $scope.emailErr = false;
    $scope.namesErr = false;
    $scope.emailrErr = false;
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
        console.log("SendData");
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
            console.log(result);
            $scope.dataSend = true;
        }).catch((err) => {
            let a = err;
            console.log(document.getElementById('bazinga').scrollIntoView(), "leonardo");

            console.log(a.status);
            if (a.status) {
                document.getElementById('bazinga').scrollIntoView()
                $scope.dataSend = true;

            }
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
            if ($scope.adidasForm.inputLastnames.$error.required) {
                $scope.lastErr = true
            }

            console.log($scope.adidasForm.inputNames.$error.required);
            console.log(err);
        });

    }
    var objetive1 = document.getElementById("objetive1");
    var objetive2 = document.getElementById("objetive2");
    var objetive3 = document.getElementById("objetive3");
    var obj1 = document.getElementById("obj1");
    var obj2 = document.getElementById("obj2");
    var obj3 = document.getElementById("obj3");
    var absUrl = $location.absUrl();;
    console.log(absUrl);
    $scope.objetive1 = function() {
        console.log("testting");
        objetive1.classList.remove("filter")
        objetive1.style.transform = "translate(30px,-235px)"
        objetive1.style.height = objetive1.clientHeigh + 100;
        obj1.removeAttribute("style");

        objetive2.classList.add("filter");
        objetive2.style.transform = "translate(-22px, 30px)"
        objetive3.classList.add("filter");
        obj2.style.display = "none";
        obj3.style.display = "none"

    }

    $scope.objetive2 = function() {
        console.log("testting");
        objetive2.classList.remove("filter", )
        objetive2.style.transform = "translate(-103px, -206px)"
        obj2.removeAttribute("style");

        objetive1.classList.add("filter");
        objetive1.removeAttribute("style")
        objetive3.classList.add("filter");
        objetive3.removeAttribute("style")
        obj1.style.display = "none";
        obj3.style.display = "none"
    }

    $scope.objetive3 = function() {
        console.log("testting");
        objetive3.classList.remove("filter")
        obj3.removeAttribute("style");

        objetive2.classList.add("filter");
        objetive1.removeAttribute("style")
        objetive2.removeAttribute("style")
        objetive1.classList.add("filter");
        obj1.style.display = "none";
        obj2.style.display = "none"
    }

    document.getElementById("header").clientHeight
    var t = 0;
    window.onscroll = function() {
        // Obtenemos la posicion del scroll en pantall
        var scroll = document.documentElement.scrollTop || document.body.scrollTop;
        var scrollHeader = document.getElementById("header").clientHeight

        if (scroll > scrollHeader && scroll < scrollHeader / 2 + scrollHeader) {
            t = t + 0.02;
            console.log(t);
        }
        // Realizamos alguna accion cuando el scroll este entre la posicion 300 y 400
        if (scroll > 1600 && scroll < 1800) {
            console.log("Pasaste la posicion 300 del scroll");
        }
    }

})