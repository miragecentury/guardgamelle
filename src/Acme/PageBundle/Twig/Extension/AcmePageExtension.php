<?php

// src/Acme/PageBundle/Twig/Extension/AcmePageExtension.php

namespace Acme\PageBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\Request;

class AcmePageExtension extends \Twig_Extension {

    protected $request;

    /**
     *
     * @var \Twig_Environment
     */
    protected $environment;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function initRuntime(\Twig_Environment $environment) {
        $this->environment = $environment;
    }

    public function getFunctions() {
        return array(
            'get_controller_name' => new \Twig_Function_Method($this, 'getControllerName'),
            'get_action_name' => new \Twig_Function_Method($this, 'getActionName'),
            'get_bundle_name' => new \Twig_Function_Method($this, 'getBundleName'),
        );
    }

    /**
     * Get current controller name
     */
    public function getControllerName() {
        $pattern = "#Controller\\\([a-zA-Z]*)Controller#";
        $matches = array();
        preg_match($pattern, $this->request->get('_controller'), $matches);

        return strtolower($matches[1]);
    }

    /**
     * Get current action name 
     */
    public function getActionName() {
        $pattern = "#::([a-zA-Z]*)Action#";
        $matches = array();
        preg_match($pattern, $this->request->get('_controller'), $matches);

        return $matches[1];
    }
    
    /**
     * Get current bundle name 
     */
    public function getBundleName() {
        $pattern = "#^([a-zA-Z//]*)Bundle#";
        $matches = array();
        preg_match_all("/^([a-zA-Z\\\]*Bundle)/", $this->request->get('_controller'), $matches);
        $m = $matches[1][0];
        
        return str_replace("\\","", $m);
    }

    public function getName() {
        return 'acme_page';
    }

}
