<?php


use App\Suite;
use Illuminate\Support\Facades\Input;
use Lego\Lego;

$id = Input::query('id');
abort_unless($id, 404);

$suite = Suite::find($id);
abort_unless($suite, 404);

return Lego::confirm(
    "确定删除公寓 #{$suite->id} {$suite->address} ？",
    function () use ($suite) {
        $suite->delete();
        return redirect(route('demo', 'suite-list'));
    }
);
