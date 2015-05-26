@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        You are logged in!<br/>
                        <blockquote>
                            <p><strong>Here create new evaluation and you can show one user evaluations</strong></p>
                            <a href="/test"> Create Evaluation</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>Here update users module/submodule evaluations. Soft delete and destroy
                                    it.</strong></p>
                            <a href="/table_test">Evaluation-table</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>Update, delete, by now</strong></p>

                            <a href="/table_dynamic">Evaluation-dynamic</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>This works with CRUD</strong></p>

                            <a href="/table_static">Evaluation-static</a>
                        </blockquote>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
