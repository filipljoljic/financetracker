<?php

Flight::route("GET /users/@id/expense", function ($user_id) {
    Flight::json(Flight::expenseDao()->get_expense_by_user_id($user_id));
});

Flight::route("GET /users/@id/expense/@expense_id", function ($id, $expense_id) {
    Flight::json(Flight::expenseDao()->getExpenseByIDandUserID($id, $expense_id));
});

Flight::route('POST /users/@id/expense', function ($id) {
    $data = Flight::request()->data->getData();
    $data['user_id'] = $id;
    Flight::json(Flight::expenseDao()->addExpense($data));
});

Flight::route('PUT /users/@id/expense/@expense_id', function ($id, $expense_id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::expenseDao()->updateExpense($data, $expense_id));
});

Flight::route('DELETE /users/@id/expense/@expense_id', function ($id, $expense_id) {
    Flight::json(Flight::expenseDao()->deleteExpense($expense_id), ['message' => 'Expense entry deleted']);
});