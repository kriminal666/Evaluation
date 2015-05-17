@extends('app')

@section('content')
    <div class="container" ng-app="testEvaluation" ng-controller="EvaluationTableController as EvaluationCtrl">
        <div class="row">
            <div class="col-md-4">
                <strong>Select Module(id=103 ;))</strong>
                <select  ng-model="module" class="" ng-options="module.moduleId as module.shortName for module in modules.data"
                        title="Modules" ng-change="getSubModules(module)">
                    <option value="" >Modules</option>
                </select>
            </div>

            <p> ID:$$module$$</p>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <strong>Now select one of its Submodules</strong>
                <select ng-model="moduleSubmodules" class="" ng-options="submodule.study_submodules_id as submodule.study_submodules_shortname for submodule in submodules"
                        title="SubModules" ng-change="getSubModuleEvaluations(moduleSubmodules)">
                    <option value="">SubModules</option>
                </select>
            </div>
            <p> ID:$$moduleSubmodules$$</p>
            <hr/>
        </div>
    <div ng-repeat="evaluation in submoduleEvaluations">


       <div ng-model="userEvaluation" ng-value="userEvaluation = evaluation.evaluation_id">

        <div ng-model="userId" ng-value="userId = evaluation.user.id">
        <strong>User Evaluation in this module and submodule</strong>

        <p>
            User : $$ evaluation.user.name $$<p>$$evaluation.user.id$$</p>
        </p>
        </div>
           <div ng-model="submodule" ng-value="submodule = evaluation.study_submodules.study_submodules_id">
        <p>
            UF : $$evaluation.study_submodules.study_submodules_name $$
        </p>
           </div>
        <p>
            Mark : $$ evaluation.mark.mark_value $$
            <p>
            <select ng-model="marks"  class=""
                    ng-options="mark.mark_id as mark.mark_value for mark in allMarks" title="Marks"
                    ng-init ="marks =  evaluation.mark.mark_id" ng-change="updateEvaluation(userEvaluation,userId,submodule,marks)">
                <option value="">Evaluate</option>
            </select>
             </p>

           </div>
    </div>


        <br/>
        <br/>
        <br/>
        <br/>
        <br/>


    <table id="evaluations_table" class="display dataTable">
        <thead>
        <tr>
            <th>Foto</th>
            <th>Tipo</th>
            <th>Oculto</th>
            <th>Lastname 1</th>
            <th>Lastname 2</th>
            <th>Name</th>
            <th>M01</th>
            <th>M02</th>
            <th>M03</th>
            <th><select ng-model="module" class="" ng-options="module.moduleId as module.shortName for module in modules.data"
                        title="Modules" ng-change="getSubModules(module)">
                    <option value="">Modules</option>
                    </select>
                <p>
                    <select ng-model="moduleSubmodules" class="" ng-options="submodule.study_submodules_id as submodule.study_submodules_shortname for submodule in submodules"
                            title="SubModules">
                        <option value="">SubModules</option>
                        </select>
                </p>
            </th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Foto</th>
            <th>Tipo</th>
            <th>Oculto</th>
            <th>Lastname 1</th>
            <th>LastName 2</th>
            <th>Name</th>
            <th>M01</th>
            <th>M02</th>
            <th>M03</th>
            <th>M04</th>
        </tr>
        </tfoot>
        <tbody>

        </tbody>
    </table>

</div>


@endsection