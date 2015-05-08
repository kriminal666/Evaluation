@extends('app')

@section('content')

    <div class="container" ng-app="testEvaluation" ng-controller="FormController">
        <!--  Review Form -->
        <form name="evaluateForm"
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
        <blockquote><p>Select user and get evaluation of him.</p></blockquote>
        <div class="row">
        <div class="col-md-4">
            <select ng-model="student" class="form-control" ng-options="user.id as user.name for user in users"  title="Users" required>
                <option value="">Users</option>
            </select>
            </div>
      <div class="col-md-4">
        <button class="btn btn-primary" ng-click ="getUserEvaluations(student)">Get  evaluations</button>
          <p> ID:$$student$$</p>
      </div>
    </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <table class="table table-striped">
                    <tr ng-repeat='evaluation in userEvaluations'>
                        <td>Academic period : $$ evaluation.evaluation_academic_period_id $$</td>
                        <td>Student :$$ evaluation.evaluation_student_id $$</td>
                        <td>UF ID :$$ evaluation.evaluation_study_subModule_id $$</td>
                        <td>Mark ID : $$ evaluation.evaluation_mark_id $$</td>
                    </tr>
                </table>
            </div>
        </div>






    </div>

















@endsection