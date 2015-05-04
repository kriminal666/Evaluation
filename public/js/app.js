(function(){
    var app = angular.module('testEvaluation',[ ], function($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });

    app.controller('FormController' , function(){
        this.mark = 0;
        this.student = 0;
        this.uf = 0;

    });


})();