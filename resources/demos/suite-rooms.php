<?php

$form = Lego::form(Suite::find(Input::query('id')));

$form->add...

$form->addRelation('rooms')
    ->new(function (Room $room) use ($suite) {
    	$room->suite()->associate($suite);
    })
    ->form(function (Form $form) {
    	$form->addText('code', '房间号')->unique()->required();
    	...
    });
