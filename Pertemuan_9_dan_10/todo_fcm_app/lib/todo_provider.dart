import 'package:flutter/material.dart';

class Todo {
  final String id;
  final String title;

  Todo({
    required this.id,
    required this.title,
  });
}

class TodoProvider with ChangeNotifier {
  List<Todo> _todos = [];

  List<Todo> get todos => _todos;

  void addTodo(String title) {
    if (title.trim().isEmpty) return;
    
    final newTodo = Todo(
      id: DateTime.now().toString(),
      title: title,
    );
    
    _todos.add(newTodo);
    notifyListeners();
  }

  void deleteAllTodos() {
    _todos.clear();
    notifyListeners();
  }
}
