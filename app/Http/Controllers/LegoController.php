<?php namespace App\Http\Controllers;

use Lego\Widget\Widget;

class LegoController extends Controller
{
    private function demos()
    {
        return [
            'city-list' => 'Form：城市列表',
            'city' => 'Form：新建/编辑城市',
            'street-list' => 'Form：街道列表',
            'street' => 'Form：新建/编辑街道',
            'suite-list' => 'Form：公寓列表',
            'suite' => 'Form：新建/编辑公寓',
        ];
    }

    public function demo($item)
    {
        abort_unless(isset($this->demos()[$item]), 404);

        $path = resource_path("demos/{$item}.php");

        /** @var Widget $widget */
        $widget = require $path;
        $lines = explode("\n", file_get_contents($path));
        $code = trim(implode("\n", array_slice($lines, 1, -2)));

        return $widget->view('demo', [
            'title' => $this->demos()[$item],
            'widget' => $widget,
            'code' => $code,
            'demos' => $this->demos(),
        ]);
    }
}
