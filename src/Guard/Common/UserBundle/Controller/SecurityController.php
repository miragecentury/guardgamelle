<?php

namespace Guard\Common\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as FOSSecurityController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends FOSSecurityController {

    public function loginAction(\Symfony\Component\HttpFoundation\Request $request) {
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl("guard_common_public_homepage"));
        } else {
            return parent::loginAction($request);
        }
    }

    /**
     * Récupération dans l'implémentation du Controller
     * @param type $route
     * @param type $parameters
     * @param type $referenceType
     * @return type
     */
    public function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH) {
        return $this->container->get('router')->generate($route, $parameters, $referenceType);
    }

    /**
     * Returns a RedirectResponse to the given URL.
     *
     * @param string  $url    The URL to redirect to
     * @param integer $status The status code to use for the Response
     *
     * @return RedirectResponse
     */
    public function redirect($url, $status = 302) {
        return new RedirectResponse($url, $status);
    }

}
