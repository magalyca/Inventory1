<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../generated-conf/config.php';
require '../functions.php';



$config['displayErrorDetails'] = true;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../app/views/");


$app->get('/sign_out', function (Request $request, Response $response, array $args) {
    signUserOut();

    return $response->withRedirect($this->router->pathFor('sign'));
})->setName('sign_out');




// -----  middleware (not signed in) -----
$app->group('', function () use ($app) {

    $app->get('/', function (Request $request, Response $response, array $args) {
        return $this->view->render($response, 'signIn.php', ['router'=>$this->router]);
    })->setName('sign');

    // post here when trying to sign in or sign up
    $app->post('/', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();

        $email = $post['Email'];
        $password = $post['Password'];

        if (isset($post['signup'])) {
            // trying to sign up
            $user = new \User();

            if (\UserQuery::create()->findOneByEmail($email) != null) {
                // email is already taken
                return $response->withJSON(['success'=>false, 'msg'=>'Email taken']);
            }

            $user->setEmail($email);
            $user->setPassword($password);
            $user->setRole(1);

            $user->save();
            signUserIn($user->getUserId());

            //redirect them to main page after sign up
            return $response->withJSON(['success'=>true,
                'path'=>$this->router->pathFor('main')]);
        } else {
            // trying to sign in
            $user = \UserQuery::create()->findOneByEmail($email);
            if ($user == null) {
                return $response->withJSON(['success'=>false]);
            }

            if (!$user->login($password)) {
                return $response->withJSON(['success'=>false]);
            }

            signUserIn($user->getUserId());
            //redirect them to main page after signing in
            //$user= getRole();
            
            return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('main')]);
           
        }
    })->setName('sign');

})->add(function ($request, $response, $next) {
    if (currentUser() != null) {
        return $response->withRedirect($this->router->pathFor('main'));
    }

    return $next($request, $response);
});

// -----  middleware (signed in generic user and admin) -----
$app->group('/user', function () use ($app) {
  $app->get('/home', function (Request $request, Response $response, array $args) {
     $all = \AllInventoryQuery::create()->find();
     return $this->view->render(
        $response,
        'homepage.php',
        ['router'=>$this->router, 'all'=>$all]
        );


 })->setName('main');

  $app->get('/surplus', function (Request $request, Response $response, array $args) {
    $all = \SurplusQuery::create()->find();
    return $this->view->render(
        $response,
        'surplus.php',
        ['router'=>$this->router,'all'=>$all]
        );
})->setName('sur');

  $app->get('/missing', function (Request $request, Response $response, array $args) {
     $all = \MissingQuery::create()->find();
     return $this->view->render(
        $response,
        'missing.php',
        ['router'=>$this->router,'all'=>$all]
        );
 })->setName('miss');

  $app->get('/transfer', function (Request $request, Response $response, array $args) {
     $all = \TransferQuery::create()->find();
     return $this->view->render(
        $response,
        'transfer.php',
        ['router'=>$this->router,'all'=>$all]
        );
 })->setName('transf');

  $app->get('/myassets', function (Request $request, Response $response, array $args) {
    $all = \AssetUserQuery::create()->filterByUserId(currentUser()->getUserId())->find();
    
    //echo currentUser();
    return $this->view->render(
        $response,
        'assetuser.php',
        ['router'=>$this->router, 'all'=>$all]
        );
})->setName('myassets');

  $app->get('/admin', function (Request $request, Response $response, array $args) {
    $all = \UpdatesQuery::create()->find();
    return $this->view->render(
        $response,
        'admin.php',
        ['router'=>$this->router,'all'=>$all]
        );
})->setName('admin');

  $app->get('/users', function (Request $request, Response $response, array $args) {
    $all = \UserQuery::create()->find();
    return $this->view->render(
        $response,
        'users.php',
        ['router'=>$this->router,'all'=>$all]
        );
})->setName('users');

  $app->get('/results', function (Request $request, Response $response, array $args) {
    
    return $this->view->render(
        $response,
        'results.php',
        ['router'=>$this->router]
        );
})->setName('result');

})->add(function ($request, $response, $next) {
    if (currentUser() == null) {
        return $response->withRedirect($this->router->pathFor('sign'));
    }
    return $next($request, $response);
});




$app->run();


