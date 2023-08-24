<?php

/*
 * This file is part of the package ucph_content_header.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 * June 2023 Nanna Ellegaard, University of Copenhagen.
 */
declare(strict_types=1);
defined('TYPO3') or die();

call_user_func(function ($extKey ='ucph_content_header', $contentType ='ucph_content_header') {
    // Adds the content element to the "Type" dropdown
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_be.xlf:ucph_content_header_title',
            $contentType,
            // icon identifier
            'content-text',
        ],
        'textmedia',
        'after'
    );

    // Add Content Element
    if (!is_array($GLOBALS['TCA']['tt_content']['types'][$contentType] ?? false)) {
        $GLOBALS['TCA']['tt_content']['types'][$contentType] = [];
    }

    // headers palette: change order of fields
    $GLOBALS['TCA']['tt_content']['palettes']['headers'] = array(
        'showitem' => 'header_layout, --linebreak--, header','canNotCollapse' => 1
    );

    // Configure the default backend fields for the content element
    $GLOBALS['TCA']['tt_content']['types'][$contentType] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
               --palette--;;language,
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
               --palette--;;hidden,
               --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
               categories,
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
               rowDescription,
           --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
         ',
    ];
});

 // Override header palette globally
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content', 
    'headers', 
    '', 
    'after:CType'
);