<?php
class WebApp
{
    public $Controllers;
    
    public function __construct()
    {
        include_once('Controllers/IController.php');


        foreach (new DirectoryIterator('Controllers') as $fileInfo)
        {
            if(($fileInfo->isDot()) == false and $fileInfo->getFileName() != 'IController.php')
            {
                include_once('Controllers/' . $fileInfo->getFilename());
                $controllerTypeName = explode('.php', $fileInfo->getFilename())[0];
                $this->Controllers[explode('Controller', $controllerTypeName)[0]] = new $controllerTypeName();
            }
        }
    }
    
    public function Route($_crumb)
    {
        $controller = 'Home';
        $view = 'Index';
        $id = NULL;

        switch(count($_crumb))
        {
            case 4:
                if($_crumb[2] != '')
                {
                    $id = $_crumb[3];
                }
            case 3:
                if($_crumb[2] != '')
                {
                    $view = ucfirst(explode('.', $_crumb[2])[0]);
                }
            case 2:
                if($_crumb[1] != '')
                {
                    $controller = ucfirst($_crumb[1]);

                    $matched = false;
                    foreach($this->Controllers as $_controller)
                    {
                        if($controller == $_controller->GetName())
                        {
                            $matched = true;
                            break;
                        }
                    }
                    if($matched == false)
                    {
                        header('Location: /Error/404');
                    }
                }
                break;
        }

        try
        {
            $this->Controllers[$controller]->Invoke($view, $id);
        }
        catch (exception $_e)
        {
            header('Views/Error/404.php');
        }
    }
}
?>