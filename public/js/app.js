(function () {
    var app = angular.module('testEvaluation', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });

    app.controller('FormController', function ($scope, $http) {
        $scope.loading = false;
        $scope.evaluates = [];
        $scope.marks = [];
        $scope.users = [];
        $scope.userEvaluations = [];

        $scope.marks = function () {
            $scope.loading = true;
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.marks = data;
                    $scope.loading = false;
                });
        };

        $scope.users = function () {
            $scope.loading = true;
            $http.get('/api/users').
                success(function (data, status, headers, config) {
                    $scope.users = data;
                    $scope.loading = false;
                });
        };

        $scope.addEvaluation = function () {
            $scope.loading = true;
            $http.post('/api/evaluation', {
                evaluation_academic_period_id: 4,
                evaluation_mark_id: $scope.evaluate.mark,
                evaluation_student_id: $scope.evaluate.student,
                evaluation_study_subModule_id: $scope.evaluate.uf
            }).success(function (data, status, headers, config) {
                $scope.evaluates.push(data);
                $scope.loading = false;
            }).error(function (data, status, headers, config) {
                return status;

            });

        };

        $scope.getUserEvaluations = function ($id) {
              console.log("cojones");
            $scope.userEvaluations = [];
            $scope.loading = true;
            $http.get('/user/evaluation/' + $id).
                success(function (data, status, headers, config) {
                    $scope.userEvaluations = data;
                    $scope.loading = false;

                });
        };

        $scope.marks();
        $scope.users();
    });


})();