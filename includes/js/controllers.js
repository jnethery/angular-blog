var blog = angular.module('blog', ['ngRoute']);

blog.config(function($routeProvider, $locationProvider) {
   $routeProvider.
    when('/', {
        templateUrl : '/../../views/posts.html',
        controller : 'postListController'
    }).
    when('/test', {
        templateUrl : '/../../views/posts_test.html',
        controller : 'postListController'
    });
    $locationProvider.html5Mode(true);
});

blog.controller('postListController', function($scope, $http) {
    $http.get('api/v1/getPosts', {
        params : { backend_request : 1 }
    }).
    success(function(data, status, headers, config) {
        $scope.posts = data;
    }).
    error(function(data, status, headers, config) {
      // log error
    });
});
