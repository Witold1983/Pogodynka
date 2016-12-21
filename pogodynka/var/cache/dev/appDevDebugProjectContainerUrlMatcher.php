<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ($pathinfo === '/_profiler/open') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/manager')) {
            // show
            if ($pathinfo === '/manager') {
                return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showAction',  '_route' => 'show',);
            }

            // showUser
            if ($pathinfo === '/manager/user') {
                return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showUserAction',  '_route' => 'showUser',);
            }

            // showService
            if ($pathinfo === '/manager/services') {
                return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showServiceAction',  '_route' => 'showService',);
            }

            // showCity
            if ($pathinfo === '/manager/cities') {
                return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showCityAction',  '_route' => 'showCity',);
            }

        }

        // homepage
        if ($pathinfo === '/pogodynka') {
            return array (  '_controller' => 'AppBundle\\Controller\\PogodynkaController::indexAction',  '_route' => 'homepage',);
        }

        // user_registration
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'AppBundle\\Controller\\ServicesController::showAction',  '_route' => 'user_registration',);
        }

        if (0 === strpos($pathinfo, '/pogodynka')) {
            // index
            if ($pathinfo === '/pogodynka') {
                return array('_route' => 'index');
            }

            // register
            if ($pathinfo === '/pogodynka/register') {
                return array (  '_controller' => 'AppBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'register',);
            }

            if (0 === strpos($pathinfo, '/pogodynka/manager')) {
                // manager
                if ($pathinfo === '/pogodynka/manager') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showAction',  '_route' => 'manager',);
                }

                // manager_users
                if ($pathinfo === '/pogodynka/manager/users') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showUserAction',  '_route' => 'manager_users',);
                }

                // manager_cities
                if ($pathinfo === '/pogodynka/manager/cities') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showCityAction',  '_route' => 'manager_cities',);
                }

                // manager_services
                if ($pathinfo === '/pogodynka/manager/services') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ManagerController::showServiceAction',  '_route' => 'manager_services',);
                }

            }

            if (0 === strpos($pathinfo, '/pogodynka/log')) {
                // login
                if ($pathinfo === '/pogodynka/login') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // logout
                if ($pathinfo === '/pogodynka/logout') {
                    return array('_route' => 'logout');
                }

            }

            // services
            if ($pathinfo === '/pogodynka/services') {
                return array (  '_controller' => 'AppBundle\\Controller\\ServicesController::showAction',  '_route' => 'services',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
