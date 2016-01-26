var blog = angular.module('blog', []);

blog.controller('PostList', function($scope, $http) {
    $http.get('api/v1/getPosts').
    success(function(data, status, headers, config) {
        $scope.posts = data;
    }).
    error(function(data, status, headers, config) {
      // log error
    });
});
