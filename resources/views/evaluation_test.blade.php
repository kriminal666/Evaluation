@extends('app')

@section('content')

    <div class="container" ng-app="testEvaluation">
        <!--  Review Form -->
        <form name="evaluateForm" ng-controller="FormController as FormCtrl"
              ng-submit=" FormCtrl.post()" novalidate>
            <!--  Live Preview -->
            <blockquote>
                <strong>Stars</strong>

                <cite class="clearfix"></cite>

            </blockquote>

            <!--  Review Form -->
            <h4>Submit a evaluation</h4>
            <fieldset class="form-group">
                <select ng-model="FormCtrl.mark" class="form-control" ng-options="mark for marks in [1,2,3,4,5,6,7,8,9,10,11]"  title="Notas" required>
                    <option value="">Evaluate</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <input ng-model="FormCtrl.student" type="number" class="form-control" placeholder="" title="Student" required />
            </fieldset>
            <fieldset class="form-group">
                <input ng-model="FormCtrl.uf" type="number" class="form-control" placeholder="" title="UF" required />
            </fieldset>

            <fieldset class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Submit Review" />
            </fieldset>
        </form>








    </div>

















@endsection