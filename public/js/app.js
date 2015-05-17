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
        $scope.studySubmodules = [];
        $scope.response = false;
        $scope.message = "";
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

        $scope.studySubmodules = function () {
            $scope.loading = true;
            $http.get('/api/studysubmodules').
                success(function (data, status, headers, config) {
                    $scope.studySubmodules = data;
                    $scope.loading = false;
                });
        };

        $scope.addEvaluation = function () {
            $scope.loading = true;
            $http.post('/api/evaluations', {
                evaluation_academic_period_id: 4,
                evaluation_mark_id: $scope.evaluate.mark,
                evaluation_student_id: $scope.evaluate.student,
                evaluation_study_subModule_id: $scope.evaluate.uf
            }).success(function (data, status, headers, config) {
                $scope.evaluates.push(data);
                console.log(data);
                $scope.response = true;
                $scope.message = data.message;
                $scope.loading = false;
            }).error(function (data, status, headers, config) {
                return status;

            });

        };

        $scope.getUserEvaluations = function ($id) {
            console.log("cojones");
            $scope.userEvaluations = [];
            $scope.loading = true;
            $http.get('/user/'+ $id +'/evaluations/' ).
                success(function (data, status, headers, config) {
                    $scope.userEvaluations = data;
                    $scope.loading = false;

                });
        };

        $scope.marks();
        $scope.users();
        $scope.studySubmodules();
    });

    app.controller('EvaluationTableController', function($scope, $http){
        $scope.users = [];
        $scope.modules = [];
        $scope.submodules = [];
        $scope.submoduleEvaluations = [];
        $scope.evaluationMarks = [];


        //get
        $scope.getSubModules = function($id) {
            $http.get('/studymodule/'+$id+'/submodules').
                success(function(data,status,headers,config){
                    $scope.submodules = data;
                    console.log(data);

                });

        };
        //get all modules
        $scope.getModules = function() {
            $http.get('/api/studymodules').
                success(function(data,status,headers,config){
                    $scope.modules = data;
                    $scope.selected = $scope.modules[103];
                });
        };

        $scope.getSubModuleEvaluations = function($id) {
            $http.get('submodule/'+$id+'/evaluations').
                success(function(data,status,headers,config){
                    $scope.submoduleEvaluations = data;

                });
        };

        $scope.marks = function () {
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.allMarks = data;

                });
        };

        $scope.updateEvaluation = function($evaluationId,$user, $submodule, $markId){
            console.log('user id:'+$user);
            console.log('Mark id:'+$submodule);
            console.log('evaluation id:'+$evaluationId);
            console.log('Mark id:'+$markId);
            $http.put('api/evaluations/'+$evaluationId,{
                academicPeriodId:4,
                subModuleId: $submodule,
                studentId: $user,
                markId: $markId
            }).success(function(data,status,headers,config){
                $scope.submoduleEvaluations = data;
            });
        };

        $scope.getModules()
        $scope.marks();
    })


})();