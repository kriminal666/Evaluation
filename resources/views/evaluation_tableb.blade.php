@extends('app')

@section('content')
    <div class="container" ng-app="testEvaluation" ng-controller="EvaluationTableController as EvaluationCtrl">
        <div class="row">
            <div class="col-md-4">
                <strong>Select Module(id=103 ;))</strong>
                <select id="module_selector" ng-model="module" class=""
                        ng-options="module.moduleId as module.shortName for module in modules.data"
                        title="Modules" ng-change="getSubModules(module)">
                    <option value="">Modules</option>
                </select>
            </div>

            <p> ID:$$module$$</p>
        </div>
        <table id ="evaluations_table" class="display dataTable">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Oculto</th>
                <th>Lastname 1</th>
                <th>Lastname 2</th>
                <th>Name</th>
                <th>Academic Course</th>
                <th ng-repeat="submodule in submodules" class="uf">
                    <label class="hidden id">$$submodule.study_submodules_id$$</label>
                    $$submodule.study_submodules_shortname$$</th>



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
                <th>Academic Course</th>
                <th ng-repeat="submodule in submodules">$$submodule.study_submodules_shortname$$</th>


            </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
        <div id="submodules"
        <div ng-show="showTable">
        <select ng-model="marks" class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                title="Marks" ng-init="marks =  evaluation.mark.mark_id"
                ng-change="updateEvaluation(userEvaluation,userId,academicPeriod,submodule,marks)">
            <option value="">Evaluate</option>
        </select></td>
        </div>

    </div>
    <!--data_tables-->


    @endsection