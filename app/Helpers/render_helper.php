<?php
 
if ( ! function_exists('render'))
{
    function render(string $name, array $data = [], array $options = [])
    {
        return view(
            'layout',
            [
                'content' => view($name, $data, $options),
            ],
            $options
        );
    }
}



// if (! function_exists('render')) {
//     function render(string $view, array $data = []): string
//     {
//         $viewPath = 'App\\Views\\' . $view . '.php';
//         $renderer = \Config\Services::renderer();
//         return $renderer->setData($data)->render($viewPath);
//     }
// }


 ?>