<?php
/*
GET /users/{id}/income: Retrieves a list of all income entries for a user.
GET /users/{id}/income/{income_id}: Retrieves a specific income entry.
POST /users/{id}/income: Creates a new income entry.
PUT /users/{id}/income/{income_id}: Updates an existing income entry.
DELETE /users/{id}/income/{income_id}: Deletes an income entry.
*/

Flight::route("GET /users/@id/income", function ($user_id) {
    Flight::json(Flight::incomeDao()->get_income_by_user_id($user_id));
});

Flight::route("GET /users/@id/income/@income_id", function ($id, $income_id) {
    Flight::json(Flight::incomeDao()->getIncomeByIDandUserID($id, $income_id));
});

Flight::route('POST /users/@id/income', function ($id) {
    $data = Flight::request()->data->getData();
    $data['user_id'] = $id;
    Flight::json(Flight::incomeDao()->addIncome($data));
});

Flight::route('PUT /users/@id/income/@income_id', function ($id, $income_id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::incomeDao()->updateIncome($data, $income_id));
});

Flight::route('DELETE /users/@id/income/@income_id', function ($id, $income_id) {
    Flight::json(Flight::incomeDao()->deleteIncome($income_id), ['message' => 'Income entry deleted']);
});
