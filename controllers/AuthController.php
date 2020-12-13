<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29.11.2020
 * Time: 17:33
 */

namespace App\controllers;


use shonchan\phpmvc\Application;
use shonchan\phpmvc\Controller;
use shonchan\phpmvc\middlewares\AuthMiddleware;
use App\models\LoginForm;
use App\models\User;
use shonchan\phpmvc\Request;
use shonchan\phpmvc\Response;

/**
 * Class AuthController
 * @package App\controllers
 */
class AuthController extends Controller
{
    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $errors = [];
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thank\'s for registering');
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);

    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {

        return $this->render('profile', [

        ]);
    }
}