grids.app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

grids.app.animation('.slideDown', function() {
    return {
        addClass: function(element, className, done) {
            jQuery(element).slideDown(800,done);
        },
        removeClass: function(element, className, done) {
            jQuery(element).slideUp(800,done);
        }
    }
});