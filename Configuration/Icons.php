<?php

/**
 * Icon Registry
 */

defined('TYPO3') || die();

return [
    // icon identifier
    'ucph_ce_header_icon' => [
        'provider' => \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        'source' => 'EXT:ucph_ce_header/Resources/Public/Icons/Extension.svg',
    ],
];
