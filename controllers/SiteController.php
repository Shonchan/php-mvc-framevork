<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29.11.2020
 * Time: 16:53
 */
namespace App\controllers;


use shonchan\phpmvc\Application;
use shonchan\phpmvc\Controller;
use shonchan\phpmvc\Request;
use shonchan\phpmvc\Response;
use App\models\ContactForm;


/**
 * Class SiteController
 * @package App\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'AlexMVC'
        ];
        return $this->render('home', $params);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return string
     */
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thank for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact,
        ]);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        return "some Data";
    }
}