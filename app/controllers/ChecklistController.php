<?php

class ChecklistController extends BaseController {
	
	public function showWelcome()
	{
		return View::make('hello');
	}

	public function create()
	{
		$content = Input::get('content');
		$todos = new Todos;
		$todos->content = $content;
		$todos->save();
	}

	public function getAll()
	{
		return Todos::all();
	}

	public function updateStatus($id) {
		//     Todos::find($id)->update($request->all());

		$todos = Todos::find($id);
		if(Input::get('completed') != null){
			$completed = Input::get('completed');
			$todos->completed = $completed;
		}
		if(Input::get('content') ){
			$content = Input::get('content');
			$todos->content = $content;
		}

		$todos->save();
	}
	public function delete() {
		$id = Input::get('id');
		$todos = Todos::find($id);
		$todos->delete();
	}
}
