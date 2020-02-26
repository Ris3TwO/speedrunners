var app = angular.module("app", ['angularMask', 'smoothScroll']);

app.controller("controlador", function($scope, $http, $location, smoothScroll) {
    var json = {};
    var height = screen.height;
    var width = screen.width;
    $scope.dataCheck = false;
    $scope.dataSend = false;
    $scope.gender = "";
    $scope.accept = false;
    $scope.newsletter = false;
    $scope.shoes = "";
    $scope.distance = "";
    $scope.team = "";
    $scope.time = "";
    $scope.namesFull = "";
    $scope.ageFull = "";
    $scope.emailErr = false;
    $scope.namesErr = false;
    $scope.emailrErr = false;
    $scope.ageErr = false;
    $scope.lastErr = false;
    $scope.cityErr = false;
    $scope.genderErr = false;
    $scope.shoesErr = false;
    $scope.teamErr = false;
    $scope.distanceErr = false;
    $scope.timeErr = false;
    $scope.verify = function(value) {        
        console.log($scope.adidasForm.inputAge.$viewValue.length)
        if (!$scope.adidasForm.inputNames.$error.required && !$scope.adidasForm.inputLastnames.$error.required && $scope.adidasForm.inputAge.$viewValue.length > 9 && $scope.adidasForm.inputAge.$viewValue.length < 11 && !$scope.adidasForm.inputEmail.$error.required && $scope.gender != "" && $scope.shoes != "" && $scope.time != "" && $scope.distance != "") {

            var year = $scope.adidasForm.inputAge.$viewValue.substr(0, 4);
            var month = $scope.adidasForm.inputAge.$viewValue.substr(5, 2);
            var day = $scope.adidasForm.inputAge.$viewValue.substr(8, 2);
            $scope.ageFull = year + "/" + month + "/" + day
            $scope.namesFull = $scope.adidasForm.inputNames.$viewValue;
            $scope.newsletter = $scope.adidasForm.inputNewsletter.$viewValue;

            if ($scope.team == "") {
                $scope.team = $scope.adidasForm.inputTeam.$viewValue
            } else {
                $scope.team = "ADIDAS RUNNERS"
            }

            console.log($scope.team)
            console.log($scope.ageFull)
            console.log($scope.namesFull)
            console.log($scope.newsletter)
            // muestra la tabla
            $scope.dataCheck = true;

            // oculta los mensaje de error
            $scope.emailErr = false;
            $scope.namesErr = false;
            $scope.emailrErr = false;
            $scope.ageErr = false;
            $scope.lastErr = false;
            $scope.cityErr = false;
            $scope.genderErr = false;
            $scope.shoesErr = false;
            $scope.teamErr = false;
            $scope.distanceErr = false;
            $scope.timeErr = false;

            smoothScroll(document.getElementById('info'));
        } else {
            if ($scope.adidasForm.inputNames.$error.required) {
                $scope.namesErr = true
            } else {
                $scope.namesFull = $scope.adidasForm.inputNames.$viewValue
                $scope.namesErr = false
            }
            if ($scope.adidasForm.inputEmail.$error.required) {
                $scope.emailErr = true
            } else {
                $scope.emailErr = false
            }

            if ($scope.gender == "") {
                $scope.genderErr = true
            } else {
                $scope.genderErr = false
            }
            if ($scope.time == "") {
                $scope.timeErr = true
            } else {
                $scope.timeErr = false
            }
            if ($scope.distance == "") {
                $scope.distanceErr = true
            } else {
                $scope.distanceErr = false
            }
            if ($scope.team == "") {
                $scope.teamErr = true
            } else {
                $scope.teamErr = false
            }

            if ($scope.shoes == "") {
                $scope.shoesErr = true
            } else {
                $scope.shoesErr = false
            }

            if ($scope.adidasForm.inputAge.$viewValue.length > 9 || $scope.adidasForm.inputAge.$viewValue.length < 11) {
                $scope.ageErr = true
            } else {
                var year = $scope.adidasForm.inputAge.$viewValue.substr(0, 4);
                var month = $scope.adidasForm.inputAge.$viewValue.substr(5, 2);
                var day = $scope.adidasForm.inputAge.$viewValue.substr(8, 2);
                var maxDay = "";
                var month31 = ["01", "03", "05", "07", "08", "10", "12"];
                var month28 = "02";

                if (month31.includes(month)) {
                    maxDay = "31"
                } else if (month == "02") {
                    maxDay = "28"
                } else {
                    maxDay = "30"
                }
                console.log("Dia: " + day + " mes: " + month + " año: " + year)

                if (year > "2007" || year < "1940") {
                    $scope.ageErr = true
                    console.log("hay problema de año")
                } else if (month < "01" || month > "12") {
                    $scope.ageErr = true
                    console.log(maxDay)
                    console.log("hay problema de mes")
                } else if (day > maxDay || day < "01") {
                    $scope.ageErr = true
                    console.log("hay problema de día")
                } else {
                    $scope.ageErr = false
                }
            }

            if ($scope.adidasForm.inputLastnames.$error.required) {
                $scope.lastErr = true
            } else {
                $scope.lastErr = false
            }
            smoothScroll(document.getElementById('bazinga'));
        }
    }

    $scope.field = {
        inputAge: null,
    };

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

    $scope.toggle = function() {
        document.getElementById('check').classList.add("col-inactive");
        document.getElementById('check2').classList.remove("col-inactive");
    }

    $scope.sendData = function() {
        if (!$scope.adidasForm.inputAccept.$viewValue) {
            return alert("Acepta los terminos y condiciones")
        }

        var data = {
            names: $scope.adidasForm.inputNames.$viewValue,
            last_names: $scope.adidasForm.inputLastnames.$viewValue,
            age: $scope.adidasForm.inputAge.$viewValue,
            email: $scope.adidasForm.inputEmail.$viewValue,
            gender: $scope.gender,
            shoes: $scope.shoes,
            team: $scope.team,
            best_time: $scope.time,
            distance: $scope.distance,
            email_notices: $scope.newsletter,
            url: absUrl
        }
        console.log(data);


        $http.post("https://speedrunnersadidas.com/api/v1/registration", JSON.stringify(data)).then((result) => {
            console.log(result, "Resuto 72");
            console.log("Aja");
            $scope.dataSend = true;
            smoothScroll(document.getElementById('bazinga'));
        }).catch((err) => {
            let a = err;
            smoothScroll(document.getElementById('bazinga'));
            console.log(a);

            try {
                if (a.data.errors.email) {
                    console.log("activo el error");
                    $scope.emailErr = true
                }
            } catch (error) {
                console.log("error activo en el catch", error)
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
        objetive2.classList.remove("active-down");
        objetive3.classList.remove("active-img")
        if (width >= 320 && width <= 359) {
            obj1.style.paddingTop = "0.5rem";
        }

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
        obj2.removeAttribute("style");
        if (width >= 320 && width <= 320) {
            objetive2.classList.add("active-img");
            objetive2.classList.add("active-down");
            objetive1.style.transform = "translate(64px, -94px)"
            objetive1.style.maxWidth = "178px"
            objetive2.style.transform = "translate(-11px,94px)"
            objetive2.style.maxWidth = "284px"
            obj2.style.paddingTop = "4.5rem";
        }
        if (width >= 360 && width <= 374) {
            objetive2.classList.add("active-img");
            objetive2.classList.add("active-down");
            objetive1.style.transform = "translate(69px, -93px)"
            objetive1.style.maxWidth = "194px"
            objetive2.style.transform = "translate(-12px, 94px)"
            objetive2.style.maxWidth = "305px"
            obj2.style.paddingTop = "5rem";
        }
        if (width >= 375 && width <= 414) {
            objetive2.classList.add("active-img");
            objetive2.classList.add("active-down");
            objetive1.style.transform = "translate(76px, -93px)"
            objetive1.style.maxWidth = "194px"
            objetive2.style.transform = "translate(-20px, 94px)"
            objetive2.style.maxWidth = "305px"
            obj2.style.paddingTop = "5rem";
        }
        if (width >= 768 && width <= 1024) {
            objetive2.classList.add("active-img");
            objetive2.classList.add("active-down");
            objetive1.style.transform = "translate(200px, -210px)"
            objetive1.style.maxWidth = "322px"
            objetive2.style.transform = "translate(-144px, 174px)"
            objetive2.style.maxWidth = "450px"
            obj2.style.paddingTop = "5.5rem";
        }
        if (width >= 1200 && width <= 1440) {
            objetive2.classList.add("active-img");
            objetive2.classList.add("active-down");
            objetive1.style.transform = "translate(136px, -220px)"
            objetive1.style.maxWidth = "317px"
            objetive2.style.transform = "translate(14px, -11px)"
            objetive2.style.maxWidth = "457px"
            obj2.style.paddingTop = "5rem";
        }


        objetive1.classList.add("filter");
        objetive3.classList.add("filter");
        objetive3.removeAttribute("style")
        obj1.style.display = "none";

        obj3.style.display = "none"
    }

    $scope.objetive3 = function() {
        console.log("testting");
        objetive3.classList.remove("filter")
        objetive1.classList.remove("active-img")
        objetive2.classList.remove("active-img")
        objetive3.classList.add("active-img")
        obj3.removeAttribute("style");
        if (width >= 320 && width <= 359) {
            if (objetive2.classList.contains('active-down')) {
                obj3.style.paddingTop = "4.5rem";
            } else {
                obj3.style.paddingTop = "1rem";
            }
        }
        if (width >= 360 && width <= 374) {
            if (objetive2.classList.contains('active-down')) {
                obj3.style.paddingTop = "5.5rem";
            } else {
                obj3.style.paddingTop = "1rem";
            }
        }

        if (width >= 375 && width <= 414) {
            if (objetive2.classList.contains('active-down')) {
                obj3.style.paddingTop = "5rem";
            } else {
                obj3.style.paddingTop = "1rem";
            }
        }

        if (width >= 768 && width <= 1024) {
            if (objetive2.classList.contains('active-down')) {
                obj3.style.paddingTop = "5rem";
            } else {
                obj3.style.paddingTop = "1rem";
            }
        }

        if (width >= 1200 && width <= 1440) {
            if (objetive2.classList.contains('active-down')) {
                obj3.style.paddingTop = "5rem";
            } else {
                obj3.style.paddingTop = "1rem";
            }
        }

        objetive2.classList.add("filter");
        objetive1.classList.add("filter");
        obj1.style.display = "none";
        obj2.style.display = "none"
    }
    $scope.animacion = function() {
        document.getElementById("statuc").classList.add("tracking-in-expand");
        document.getElementById("statud").classList.add("tracking-in-expand");
        document.getElementById("statuf").classList.add("tracking-in-expand2");
        document.getElementById("statug").classList.add("tracking-in-expand2");
        document.getElementById("statuh").classList.add("tracking-in-expand2");
        document.getElementById("timeline").classList.add("slidelerlu");
        /*
                document.getElementById("statu4").classList.add("tracking-in-expand4");*/
        document.getElementById("statu1").classList.add("tracking-in-expand3");
        document.getElementById("statu2").classList.add("tracking-in-expand3");
        document.getElementById("statu3").classList.add("tracking-in-expand3");
        document.getElementById("statu4").classList.add("tracking-in-expand4");
        document.getElementById("final1").classList.add("tracking-in-expand4");
        document.getElementById("final2").classList.add("tracking-in-expand4");

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

});