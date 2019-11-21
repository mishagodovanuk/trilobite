<?php
namespace Core\App\View;

use Core\App\View\View;
use Core\App\View\RenderTemplate;


class TemplateFactory
{
    const TEMPLATE_FOLDER = SITE_ROOT . '/view/templates/';

    const CONTENT_FOLDER = SITE_ROOT . '/view/content/';

    private $view;

    public function __construct(View $view)
    {
        $this->view = $view;

        $this->generateTemplate();
    }

    private function generateTemplate()
    {
        $templatePath = self::TEMPLATE_FOLDER . "{$this->view->getTemplate()}.php";
        $contentPath = self::CONTENT_FOLDER . "{$this->view->getTemplate()}/{$this->view->getContent()}.php";
        if (file_exists($templatePath)) {
            if (file_exists($contentPath)) {
                $this->render($templatePath, $contentPath);
            } else {
                die("Content {$contentPath} doesnt exist"); // Redirect 404
            }
        } else {
            die("Template {$templatePath} doesnt exist");   // Redirect 404
        }
    }

    private function render($template, $content)
    {
        $pageData['title'] = $this->view->getTitle();
        $pageData['data'] = $this->view->getData();

        $result = new RenderTemplate($template, $content, $pageData);
    }

}
