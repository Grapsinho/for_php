<?php

namespace routes;

class Router {
    private $routes = [];

    // ასეთი იქნება ეს როუტეს ერეი

    /**
     * $this->routes = [
      * 'GET' => [
       *    '/' => function() {  },
        * '/about' => function() {  },
     *   // ... other GET routes
     *   ],
     *   'POST' => [
     *       '/submit' => function() {  },
     *       // ... other POST routes
     *   ],
     *   // ... other HTTP methods and their corresponding routes
     *   ];
     */

    // add a route for HTTP GET requests.
    public function get($uri, $handler) {
        return $this->addRoute('GET', $uri, $handler);
    }

    // adds a route for HTTP POST requests.
    public function post($uri, $handler) {
        return $this->addRoute('POST', $uri, $handler);
    }

    // The addRoute method is a private method used internally by get and post methods to add routes to the $routes property.
    private function addRoute($method, $uri, $handler) {
        $this->routes[$method][$uri] = $handler;
        return $this;
    }

    // The route method is responsible for handling the routing logic based on the provided request method and URI.
    public function route($requestMethod, $requestUri) {
        $newUri = explode('?', $requestUri);
        if (isset($this->routes[$requestMethod][$newUri[0]])) {
            $handler = $this->routes[$requestMethod][$newUri[0]];
            return $handler();
        } else {
            return $this->notFound();
        }
    }

    private function notFound() {
        http_response_code(404);
        return '404 Not Found';
    }
}