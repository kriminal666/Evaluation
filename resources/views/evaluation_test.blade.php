@extends('app')

@section('content')

    <div class="container" ng-app="testEvaluation">
        <!--  Review Form -->
        <form name="evaluateForm" ng-controller="FormController"
              ng-submit="evaluateForm.$valid && addEvaluation()" novalidate>
            <!--  Live Preview -->
            <blockquote>
                <strong>Stars</strong>

                <cite class="clearfix"></cite>

            </blockquote>

            <!--  Review Form -->
            <h4>Submit a evaluation</h4>
            <fieldset class="form-group">
                <select ng-model="evaluate.mark" class="form-control" ng-options="mark.mark_id as mark.mark_value for mark in marks"  title="Marks" required>
                    <option value="">Evaluate</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <select ng-model="evaluate.student" class="form-control" ng-options="user.id as user.name for user in users"  title="Users" required>
                    <option value="">Users</option>
                </select>

            </fieldset>
            <fieldset class="form-group">
                <input ng-model="evaluate.uf" type="number" class="form-control" placeholder="UF" title="UF" required />
            </fieldset>
            <div>Evaluate Form is : $$ evaluateForm.$valid $$</div>
            <fieldset class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit Evaluation" />
                <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
            </fieldset>
        </form>

        <hr>
       <!-- <div class="row">
            <div class="col-md-4">
                <table class="table table-striped">
                    <tr ng-repeat='evaluation in evaluations'>
                        <td><input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="todo.done" ng-change="updateTodo(todo)"></td>
                        <td><% todo.title %></td>
                        <td><button class="btn btn-danger btn-xs" ng-click="deleteTodo($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                    </tr>
                </table>
            </div>
        </div>-->






    </div>

















@endsection