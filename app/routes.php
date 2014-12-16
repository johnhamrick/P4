<?php

        /*
        |--------------------------------------------------------------------------
        | Application Routes
        |--------------------------------------------------------------------------
        |
        | This is where you can register all of the routes for an application.
        | It's a breeze. Simply tell Laravel the URIs it should respond to
        | and give it the Closure to execute when that URI is requested.
        |
        */

        /**
        * Index
        */
        Route::get('/', 'IndexController@getIndex');

        /**
        * User
        * (Explicit Routing)
        */
        Route::get('/signup','UserController@getSignup' );
        Route::get('/login', 'UserController@getLogin' );
        Route::post('/signup', 'UserController@postSignup' );
        Route::post('/login', 'UserController@postLogin' );
        Route::get('/logout', 'UserController@getLogout' );

        /**
        * Task
        * (Explicit Routing)
        */
        Route::get('/task', 'TaskController@getIndex');
        Route::get('/task/edit/{id}', 'TaskController@getEdit');
        Route::post('/task/edit', 'TaskController@postEdit');
        Route::get('/task/create', 'TaskController@getCreate');
        Route::post('/task/create', 'TaskController@postCreate');
        Route::get('/task/delete/{id}', 'TaskController@getDelete');

        /**
        * Category
        * (Explicit Routing)
        */
        Route::get('/category', 'CategoryController@getIndex');
        Route::get('/category/edit/{id}', 'CategoryController@getEdit');
        Route::post('/category/edit', 'CategoryController@postEdit');
        Route::get('/category/create', 'CategoryController@getCreate');
        Route::post('/category/create', 'CategoryController@postCreate');
        Route::get('/category/delete/{id}', 'CategoryController@getDelete');


        Route::get('/get-environment',function() {

        echo "Environment: ".App::environment();
});

    # /app/routes.php
        Route::get('/debug', function() {

        echo '<pre>';

        echo '<h1>environment.php</h1>';
            $path   = base_path().'/environment.php';

    try {
            $contents = 'Contents: '.File::getRequire($path);
            $exists = 'Yes';
    }
    catch (Exception $e) {
            $exists = 'No. Defaulting to `production`';
            $contents = '';
    }

        echo "Checking for: ".$path.'<br>';
        echo 'Exists: '.$exists.'<br>';
        echo $contents;
        echo '<br>';

        echo '<h1>Environment</h1>';
        echo App::environment().'<br>';

        echo '<h1>Debugging?</h1>';
            if(Config::get('app.debug')) echo "Yes"; else echo "No";

        echo '<h1>Database Config</h1>';
            print_r(Config::get('database.connections.mysql'));

        echo '<h1>Test Database Connection</h1>';
            try {
            $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
   
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
        echo '</pre>';
});

        Route::get('mysql-test', function() {

    # Use the DB component to select all the databases
            $results = DB::select('SHOW DATABASES;');
});