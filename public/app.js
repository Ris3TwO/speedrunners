var app = angular.module("app", []);


app.controller("controlador", function ($scope, $http) {
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
    $scope.verify = function (value) {
       
        
        $scope.dataCheck = value;
        console.log($scope.adidasForm.inputNames.$viewValue);
    }


    $scope.selectGender = function (value) {
        $scope.gender = value;
    }

    

     $scope.selectShoes = function (value) {
        $scope.shoes = value;
    }

    $scope.selectAge = function (value) {
        $scope.age = value;
    }

    $scope.selectTeam = function (value) {
        $scope.team = value;
    }

    $scope.selectDistance = function (value) {
        $scope.distance = value;
    }

    $scope.selectTime = function (value) {
        $scope.time= value;
    }

    $scope.sendData = function () {
        console.log("SendData");
        var data = {
            names : $scope.adidasForm.inputNames.$viewValue,
            last_names : $scope.adidasForm.inputLastnames.$viewValue,
            age : $scope.age,
            email : $scope.adidasForm.inputEmail.$viewValue,
            city : $scope.adidasForm.inputCity.$viewValue,
            gender : $scope.gender,
            shoes : $scope.shoes,
            team : $scope.team,
            best_time : $scope.time,
            distance : $scope.distance

        }
        console.log(data);


        $http.post("http://www.speedrunners.ml/api/v1/registration",JSON.stringify(data)).then((result) => {
            console.log(result);
            $scope.dataSend = true;
        }).catch((err) => {
            let a = err;
            console.log(document.getElementById('bazinga').scrollIntoView(),"leonardo"); 

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
            if ($scope.adidasForm.inputCity.$error.required) {
                $scope.cityErr = true
            }
           console.log($scope.adidasForm.inputNames.$error.required);
            console.log(err);
        });

    }

        $scope.objetive1 = function () {
                 console.log("testting");
            }
            
        $scope.objetive2 = function () {
            console.log("testting");
       }
       
       $scope.objetive3 = function () {
        console.log("testting");
   }
    
})