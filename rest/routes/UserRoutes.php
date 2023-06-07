<?php
/*
GET /users: Retrieves a list of all users.
GET /users/{id}: Retrieves a specific user.
POST /users: Creates a new user.
PUT /users/{id}: Updates an existing user.
DELETE /users/{id}: Deletes a user.
*/

/*
// Route to get all users from the database
*/
Flight::route("GET /users", function () {
    Flight::json(Flight::userDao()->get_all());
});

/*
// Route to get a single user by ID from the database (query param)
*/
Flight::route("GET /user_by_id", function () {
    Flight::json(Flight::userDao()->get_by_id(Flight::request()->query['id']));
});

/*
// Route to get a single user by ID from the database (route param)
*/
Flight::route("GET /users/@id", function ($id) {
    Flight::json(Flight::userDao()->get_by_id($id));
});

/*
// Route to delete a single user by id from the database
*/
Flight::route("DELETE /users/@id", function ($id) {
    Flight::course_dao()->delete($id);
    Flight::json(['message' => "User deleted successfully"]);
});

/*
// Route to add a user to the database
*/
Flight::route("POST /users", function () {
    $request = Flight::request()->data->getData();
    Flight::json([
        'message' => "User added successfully",
        'data' => Flight::userDao()->add($request)
    ]);
});

/*
// Route to update a user by ID in the database
*/
Flight::route("PUT /users/@id", function ($id) {
    $student = Flight::request()->data->getData();
    Flight::json([
        'message' => "User updated successfully",
        'data' => Flight::userDao()->update($user, $id)
    ]);
});
