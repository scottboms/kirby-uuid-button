<?php

use Kirby\Cms\Page;
use Kirby\Cms\App;

if (
	version_compare(App::version() ?? '0.0.0', '6.0.0', '<') ||
	version_compare(App::version() ?? '0.0.0', '7.0.0', '>=')
) {
	throw new Exception('UUID Button requires Kirby v6');
}

Kirby::plugin('scottboms/uuid-button', [
	'areas' => [
		'uuid-button' => function () {
			return [
				'buttons' => [
					// button name: "copy-page-uuid"
          // build exactly: page://UUID (UUID without prefix)
					'copy-page-uuid' => function (Page $page): array {
						$uuid = $page->uuid();
						$value = '(link: page://' . $uuid->id() . ' text: )';

						return [
							'props' => [
								'value' => $value,
							],
						];
					},
				],
      ];
		},
	],
	'info' => [
		'homepage' => 'https://github.com/scottboms/kirby-uuid-button',
		'version'  => '6.0.0',
		'license'  => 'MIT',
		'authors'  => [[ 'name' => 'Scott Boms' ]],
	],
]);
