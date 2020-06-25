<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Lego\Widget\Widget;
use Psr\Log\LoggerInterface;

class LegoController extends Controller
{
    function __construct()
    {
        view()->share('demos', $this->demos());

        $this->middleware(function (Request $request, $next) {
            Log::info('request', [
                $request->method(),
                $request->fullUrl(),
                $request->all(),
            ]);
            return $next($request);
        });
    }

    private function demos()
    {
        return [
            'city-list' => 'Filter & Grid：城市列表',
            'city' => 'Form：新建/编辑城市',
            'street-list' => 'Filter & Grid：街道列表',
            'street' => 'Form：新建/编辑街道',
            'suite-list' => 'Filter & Grid：公寓列表',
            'suite' => 'Form：新建/编辑公寓',
            'suite-delete' => 'Confirm：删除公寓',
            'confirm' => 'Confirm：确认操作示例',
            'grid-batch' => 'Grid：批处理',
            'message' => 'Message：提示信息',
            'condition-group' => 'Form：动态添加字段',
            'elastic-query' => 'Filter: ES 示例',
        ];
    }

    public function demo($item, LoggerInterface $logger, Request $request, Session $session)
    {
        abort_unless(isset($this->demos()[$item]), 404);

        $path = resource_path("demos/{$item}.php");

        $widget = require $path;
        $lines = explode("\n", file_get_contents($path));
        $code = trim(implode("\n", array_slice($lines, 1)));

        $data = [
            'title' => $this->demos()[$item],
            'widget' => $widget,
            'code' => $code,
        ];

        if ($widget instanceof Widget) {
            return $widget->view('demo', $data);
        } else {
            return view('demo', $data);
        }
    }
}
