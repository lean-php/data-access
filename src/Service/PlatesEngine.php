<?php
/**
 * Created by PhpStorm.
 * User: Micha
 * Date: 28.08.2018
 * Time: 23:12
 */

namespace App\Service;


use League\Plates\Engine;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Templating\TemplateReferenceInterface;

class PlatesEngine implements EngineInterface
{
    /**
     * @var Engine
     */
    protected $engine;

    /**
     * PlatesEngine constructor.
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Renders a template.
     *
     * @param string|TemplateReferenceInterface $name A template name or a TemplateReferenceInterface instance
     * @param array $parameters An array of parameters to pass to the template
     *
     * @return string The evaluated template as a string
     *
     * @throws \RuntimeException if the template cannot be rendered
     */
    public function render($name, array $parameters = array())
    {
        return $this->engine->render($name, $parameters);
    }

    /**
     * Returns true if the template exists.
     *
     * @param string|TemplateReferenceInterface $name A template name or a TemplateReferenceInterface instance
     *
     * @return bool true if the template exists, false otherwise
     *
     * @throws \RuntimeException if the engine cannot handle the template name
     */
    public function exists($name)
    {
        return $this->engine->exists($name);
    }

    /**
     * Returns true if this class is able to render the given template.
     *
     * @param string|TemplateReferenceInterface $name A template name or a TemplateReferenceInterface instance
     *
     * @return bool true if this class supports the given template, false otherwise
     */
    public function supports($name)
    {
        return true;
    }
}