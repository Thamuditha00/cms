<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\registerMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\driverModel;
use app\models\userModel;

class registerController extends Controller
{
    public function __construct($func, Request $request, Response $response)
    {
        $this->middleware = new registerMiddleware();
        parent::__construct($func, $request, $response);
    }

    protected function registerDriver(Request $request, Response $response)
    {
        $driver = new driverModel();
        $user = new userModel();

        if($request->isPost()) {
            $driver->getData($request->getBody());
            $user->getData($request->getBody());
            if($driver->validate($request->getBody()) && $user->validate($request->getBody())) {
                $driver->setUser($user);
                if($driver->save()) {
                        $this->setFlash('success', 'Driver registered successfully');
                        $driver->reset();
                        $user->reset();
                }
                $this->setFlash('Error', 'Unable to save on database');
            }
            else {
                $this->setFlash('Error', 'Validation failed');
            }
        }

        $this->render("manager/drivers/register", [
            'driver' => $driver,
            'user' => $user
        ]);

    }

    protected function registerManager(Request $request, Response $response)
    {
        // TODO: Implement registerManager() method.

    }

    protected function registerLogistic(Request $request, Response $response)
    {
        // TODO: Implement registerLogistic() method.

    }

}