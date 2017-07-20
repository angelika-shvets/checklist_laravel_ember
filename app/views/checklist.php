<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ember.js • TodoMVC</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="container">
<script type="text/x-handlebars" data-template-name="todos">
<section id="todoapp">
    <header id="header">
        <div class="createTodoContainer">
            <div class="createTodoIcon" {{action "viewCreateInput"}}><p>+</p></div>
            <div class="createTodoContent">
                <p class="createTodoTitle">משימות</p>
            </div>
        </div>

    </header>
<section id="main">
  {{outlet}}

</section>
    <footer id="footer">
            {{input type="text" class="createInput" id="new-todo"  placeholder="What needs to be done?" value=newTitle
              action="createTodo"}}
               {{input type="checkbox" id="toggle-all" checked=allAreDone}}
        <span id="todo-count">
            <strong>{{remaining}}</strong> {{inflection}} left
        </span>
        {{#if hasCompleted}}
           <button id="clear-completed" {{action "clearCompleted"}}>
              Clear completed ({{completed}})
           </button>
        {{/if}}
        <ul id="filters" class="todosFilters">
            <li>
               {{#link-to "todos.active" activeClass="selected"}}{{active}}: לסיום{{/link-to}}
            </li>
            <li>
                {{#link-to "todos.completed" activeClass="selected"}}{{completed}}:הושלמו{{/link-to}}
            </li>
            <li>
               {{#link-to "todos.index" activeClass="selected"}} סה"כ: {{index}} {{/link-to}}
            </li>
        </ul>
    </footer>
</section>

<footer id="info">
<!--    <p>Double-click to edit a todo</p>-->
</footer>

</script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/handlebars/handlebars.js"></script>
<script src="bower_components/ember/ember.js"></script>
<script src="bower_components/ember-data/ember-data.js"></script>
<script src="bower_components/local_storage_adapter/localstorage_adapter.js"></script>
<script src="bower_components/ember/ember-template-compiler.js"></script>
<script src="js/application.js"></script>
<script src="js/router.js"></script>
<script src="js/models/todo.js"></script>
<script src="js/controllers/todos_controller.js"></script>
<script src="js/controllers/todo_controller.js"></script>
<script src="js/views/edit_todo_view.js"></script>
</body>
<body>
<script type="text/x-handlebars" data-template-name="todos/index">
  <ul id="todo-list" class="todoList">
    {{#each todo in model itemController="todo"}}
      <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>
        {{#if todo.isEditing}}
          {{edit-todo class="edit" value=todo.title focus-out="acceptChanges" insert-newline="acceptChanges"}}
        {{else}}
          <button {{action "removeTodo"}} class="destroy">x</button>

              <label {{action "editTodo" on="doubleClick"}}>{{todo.title}}</label>

          {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
        {{/if}}
      </li>
    {{/each}}
  </ul>
          
</script>
</body>
</html>