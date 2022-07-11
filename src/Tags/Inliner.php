<?php
 
namespace Surgems\Inliner\Tags;

use Exception;
use Statamic\Tags\Tags;
use MatthiasMullie\Minify;
 
class Inliner extends Tags
{
    public function index()
    {
        $path = $this->params->get("src");

        if(isset($path))
        {
            $path_ext = pathinfo($path, PATHINFO_EXTENSION);
            $asset = file_get_contents($path);

            if($path_ext != 'css' && $path_ext != 'js')
            {
                throw new Exception('Unsupported file type: '.$path_ext);
            }

            if($this->params->bool('minify')) {
                if($path_ext == 'css')
                {
                    $minifier = new Minify\CSS($asset);
                } elseif($path_ext == 'js') {
                    $minifier = new Minify\JS($asset);
                }

                $asset = $minifier->minify();
            }

            if($path_ext == 'css')
            {
                $inliner = '<style>'.$asset.'</style>';
            } elseif($path_ext == 'js') {
                $inliner = '<script>'.$asset.'</script>';
            }

            return $inliner;
        }
        
        throw new Exception('SRC not set on Inliner tag.');
    }
}
