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
            $http.get('/user/' + $id + '/evaluations/').
                success(function (data, status, headers, config) {
                    $scope.userEvaluations = data;
                    $scope.loading = false;

                });
        };

        $scope.marks();
        $scope.users();
        $scope.studySubmodules();
    });

    app.controller('EvaluationTableController', function ($scope, $http) {
        $scope.users = [];
        $scope.modules = [];
        $scope.submodules = [];
        $scope.submoduleEvaluations = [];
        $scope.evaluationMarks = [];
        $scope.showTable = false;


        //get
        $scope.getSubModules = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('/studymodule/' + $id + '/submodules').
                success(function (data, status, headers, config) {
                    $scope.submodules = data;
                    console.log(data);

                }).error(function (data, status, headers, config) {
                    return status;

                });

        };
        //get all modules
        $scope.getModules = function () {
            $http.get('/api/studymodules').
                success(function (data, status, headers, config) {
                    $scope.modules = data;
                    $scope.selected = $scope.modules[103];
                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //get evaluations from subModule
        $scope.getSubModuleEvaluations = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('submodule/' + $id + '/evaluations').
                success(function (data, status, headers, config) {
                    $scope.submoduleEvaluations = data;
                    $scope.showTable = true;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Get all marks
        $scope.marks = function () {
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.allMarks = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Update mark of user
        $scope.updateEvaluation = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('user id:' + $user);
            console.log('Academic Period: ' + $academicPeriod);
            console.log('submodule id:' + $subModule);
            console.log('evaluation id:' + $evaluationId);
            console.log('Mark id:' + $markId);
            if ($markId == null) {
                return;
            }
            $http.put('api/evaluations/' + $evaluationId, {
                academicPeriodId: $academicPeriod,
                subModuleId: $subModule,
                studentId: $user,
                markId: $markId
            })
                .success(function (data, status, headers, config) {

                })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Mark for deletion evaluation
        $scope.deleteEvaluation = function ($index, $userEvaluation) {
            console.log($index);
            $http.delete('/evaluation/' + $userEvaluation).success(function () {
                $scope.submoduleEvaluations.splice($index, 1);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };

        //Destroy evaluation
        $scope.destroyEvaluation = function ($index, $userEvaluation) {
            console.log('Index: ' + $index);
            console.log('evaluation id: ' + $userEvaluation);
            $http.delete('/api/evaluations/' + $userEvaluation).success(function () {
                $scope.submoduleEvaluations.splice($index, 1);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };

        $scope.getModules();
        $scope.marks();
    })


})();