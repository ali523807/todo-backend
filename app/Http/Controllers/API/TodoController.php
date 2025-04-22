<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller {
    use AuthorizesRequests;
    public function index() {
        return Auth::user()->todos;
    }

    public function store(Request $request) {
        return Auth::user()->todos()->create($request->validate(['title' => 'required']));
    }

    public function update(Request $request, Todo $todo) {
        $this->authorize('update', $todo);
        $todo->update($request->validate(['title' => 'required']));
        return $todo;
    }

    public function destroy(Todo $todo) {
        $this->authorize('delete', $todo);
        $todo->delete();
        return response()->noContent();
    }
}

