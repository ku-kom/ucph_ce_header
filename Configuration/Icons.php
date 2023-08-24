<?php

/**
 * Icon Registry
 */

defined('TYPO3') || die();

return [
    // icon identifier
    'ucph_content_header_icon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:ucph_content_header/Resources/Public/Icons/Extension.svg',
    ],
];
