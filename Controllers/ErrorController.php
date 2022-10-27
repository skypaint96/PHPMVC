<?php 

class ErrorController implements IController
{  
    private $views;

    public function __construct()
    {
        $i = 0;
        foreach (new DirectoryIterator('Views/Error') as $fileInfo)
        {
            if(($fileInfo->isDot()) == false)
            {
                $this->views[$i] = explode('.php', $fileInfo->getFilename())[0];
                $i = $i + 1;
            }
        }
    }

    public function GetName()
    {
        return 'Error';
    }

    public function Invoke($_view, $_id)
    {
        if (in_array($_view, $this->views))
        {
            $controllerAction = 'Invoke' . $_view;
	        $this->$controllerAction($_id);
        }
        else
        {
            include('Views/Error/404.php');
        }
    }

    private function InvokeIndex($_id)
    {
        header('Location: /Error/404');
    }
    private function Invoke404($_id)
    {
        include('Views/Error/404.php');
    }
}  
?>