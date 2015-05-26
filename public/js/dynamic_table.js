(function () {
    var app = angular.module('testEvaluation',['bsTable'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });

    app.controller('EvaluationController', function ($scope, $http) {

        $scope.users = [];
        $scope.modules = [];
        $scope.submodules = [];
        $scope.submoduleEvaluations = [];
        $scope.evaluationMarks = [];
        $scope.usersEvaluations=[];
        $scope.finalArray = [];
        $scope.test=[];
        var moduleId=0;
        $scope.showTable = false;
        //Search and filter table
        $scope.sortType     = 'name'; // set the default sort type
        $scope.sortReverse  = false;  // set the default sort order
        $scope.searchUser   = '';     // set the default search/filter term





        //Get all marks
        $scope.marks = function () {
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.allMarks = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //get all modules
        $scope.getModules = function () {
            $http.get('/api/studymodules').
                success(function (data, status, headers, config) {
                    $scope.modules = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //get
        $scope.getSubModules = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('/studymodule/' + $id + '/submodules').
                success(function (data, status, headers, config) {
                    $scope.submodules = data;
                    //console.log(data);
                    moduleId=$id;
                   $scope.usersGroupEvaluations($id);
                    //console.log('hemos llamado al método');

                }).error(function (data, status, headers, config) {
                    return status;

                });

        };



        $scope.usersGroupEvaluations = function ($id) {
            console.log('Estamos en el método de buscar evaluaciones ' + $id);
            $http.post('usersgroupevaluations', {
                id: [16, 37, 23, 45, 55, 66],
                module: $id

            }).success(function (data, status, headers, config) {
                $scope.usersEvaluations = data;
                subArrayGenerate();
                console.log('success de la petición');



            })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };

        //generate a new subarray
        function subArrayGenerate(){
            console.log('hay tantas UFs'+$scope.submodules.length);
           var final = [];
            var data = $scope.usersEvaluations;
            var subModules = $scope.submodules;
            for (var i = 0;i<data.length;i++){
               var aux1 ={};

                var evaluations = data[i].evaluations;
                var auxEval=[];

                for(var j =0;j<subModules.length;j++){
                    var aux3 = null;
                    var count=0;
                        for (var s = 0 ; s<evaluations.length;s++){

                                if (subModules[j].study_submodules_id==evaluations[s].studysubmodules.study_submodules_id) {
                                    count=s;
                                    break;
                                }else{
                                    if(s==evaluations.length-1){
                                    aux3 = {
                                        "study_submodules_id": subModules[j].study_submodules_id
                                    };
                                    break;
                                }
                            }

                        }//end third for
                    var aux2;
                    if(aux3 != null){
                        aux2 = {
                            "evaluation_id": "",
                            "studysubmodules": aux3,
                            "mark": {"mark_id":""}

                        };

                    }else if(evaluations.length !=0){
                        aux2 = {
                            "evaluation_id": evaluations[count].evaluation_id,
                            "studysubmodules": evaluations[count].studysubmodules,
                            "mark": {"mark_id": evaluations[count].mark.mark_id}
                        }
                    }else{
                        if(evaluations.length ==0){
                            aux3 = {
                                "study_submodules_id": subModules[j].study_submodules_id
                            };
                            aux2 = {
                                "evaluation_id": "",
                                "studysubmodules": aux3,
                                "mark": {"mark_id":""}

                            };

                        }
                    }

                   auxEval.push(aux2);
                   console.log(auxEval);

                    aux3 = null;
                }//end second for


                aux1={
                    "id": data[i].id,
                    "name": data[i].name,
                    "evaluations": auxEval
                };
                final.push(aux1);
            }//End first for



          console.log(final);
          $scope.finalArray = final;



        }

        $scope.actionToDo = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('action to do');
            $academicPeriod = 4;
            console.log('Evaluation Id:'+$evaluationId);
            console.log('userID:'+$user);
            console.log('academicPeriod: '+$academicPeriod);
            console.log('submodule: '+$subModule);
            console.log('markID: '+$markId);
            switch (angular.isUndefined($evaluationId)) {
                case true : //create new evaluation
                    $scope.createEvaluation($user, $academicPeriod, $subModule, $markId);
                    break;
                default : //update or destroy
                    switch ($markId) {
                        case null: //destroy
                            $scope.destroyEvaluation($evaluationId);
                            break;
                        default: //Update evaluation
                            $scope.updateEvaluation($evaluationId, $user, $academicPeriod, $subModule, $markId);
                    }
            }
        };


        //create a new evaluation
        $scope.createEvaluation = function ($user, $academicPeriod, $subModule, $markId) {
            console.log('create');
            $academicPeriod = 4;
            $http.post('/api/evaluations', {
                evaluation_academic_period_id: $academicPeriod,
                evaluation_mark_id: $markId,
                evaluation_student_id: $user,
                evaluation_study_subModule_id: $subModule
            }).success(function (data, status, headers, config) {
                console.log(data);

            }).error(function (data, status, headers, config) {
                return status;

            });
        };

        //Update mark of user
        $scope.updateEvaluation = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('update');
            $academicPeriod = 4;
            console.log('user id:' + $user);
            console.log('Academic Period: ' + $academicPeriod);
            console.log('submodule id:' + $subModule);
            console.log('evaluation id:' + $evaluationId);
            console.log('Mark id:' + $markId);

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

        //Destroy evaluation
        $scope.destroyEvaluation = function ($userEvaluation) {

            console.log('evaluation id: ' + $userEvaluation);
            console.log('destroy');

            $http.delete('/api/evaluations/' + $userEvaluation).success(function () {
                //$scope.submoduleEvaluations.splice($index, 1);
                //$scope.usersGroupEvaluations(moduleId);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };




    $scope.getModules();
    $scope.marks();

    });//Close EvaluationController'

})();

