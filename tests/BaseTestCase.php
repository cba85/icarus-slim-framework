<?php
namespace Tests;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Create  a test environment
     *
     * @param string $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string $requestUri the request URI
     * @param array|object|null $requestData the request data
     * @return \Slim\Http\Request
     */
    public function createEnvironment($requestMethod, $requestUri, $requestData = null)
    {
        // Create a mock environment for testing with
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );
        // Set up a request object based on the environment
        $request = Request::createFromEnvironment($environment);
        // Add request data, if it exists
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }
        // Return the request
        return $request;
    }

    /**
     * Create a Slim application
     *
     * @param boolean $withMiddleware
     * @return Slim\App
     */
    public function createApp($withMiddleware = false)
    {
        // Load secret parameters (.env)
        $dotenv = new \Dotenv\Dotenv(__DIR__);
        $dotenv->load();

        // Use the application settings
        $settings = [
            'slim' => [
                'displayErrorDetails' => true,
                'addContentLengthHeader' => false,
            ]
        ];
        // Instantiate the application
        $app = new App($settings);

        // Set up dependencies
        $container = $app->getContainer();
        require __DIR__ . '/src/dependencies.php';
        // Register middleware
        require __DIR__ . '/src/middlewares.php';
        // Register routes
        require __DIR__ . '/src/routes.php';
        // Return the app
        return $app;
    }

    /**
     * Create a response
     *
     * @param \Slim\Http\Request $request
     * @param object $app
     * @return \Slim\Http\Response
     */
    public function createResponse($request, $app)
    {
        // Set up a response object
        $response = new Response();
        // Process the application
        $response = $app->process($request, $response);
        // Return the response
        return $response;
    }

    /**
     * Process the application given a request method and URI
     *
     * @param string $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string $requestUri the request URI
     * @param array|object|null $requestData the request data
     * @return \Slim\Http\Response
     */
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        $request = $this->createEnvironment($requestMethod, $requestUri, $requestData);
        $app = $this->createApp();
        $response = $this->createResponse($request, $app);
        return $response;
    }

    /**
     * Get the application
     *
     * @return Slim\App
     */
    public function getApp($withMiddleware = false)
    {
        $app = $this->createApp($withMiddleware);
        return $app;
    }
}
