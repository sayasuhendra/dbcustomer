function TodosController($scope) {

    $scope.todos = [
        { body: 'Go to store', completed: true },
        { body: 'Finish video', completed: false },
        { body: 'Learn Angular', completed: false },
    ]

    $http.get('/todos').success(function(todos){
        $scope.todos = todos;
    });

    $scope.remaining = function() {
        var count = 0;

        angular.forEach($scope.todos, function(todo) {
            count += todo.completed ? 0 : 1;
        });

        return count;
    }

    $scope.addTodo = function() {
        var todo = {
            body: $scope.newTodoText,
            completed: false
        };

        $scope.todos.push(todo);

        $http.post('todos', todo);
    };

}

