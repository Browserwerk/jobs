<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        if (TYPO3_MODE === 'BE') {
            ExtensionUtility::registerModule(
                'Browserwerk.BwJobs',
                'web', // Make module a submodule of 'web'
                'bwjobs', // Submodule key
                '', // Position
                [
                    'Job'       => 'list, show, delete',
                    'Location'  => 'list, show, delete',
                    'JobType'   => 'list, show, delete',
                    'Contact'   => 'list, show, delete',
                ],
                [
                    'access'    => 'user,group',
                    'icon'      => 'EXT:jobs/ext_icon.svg',
                    'labels'    => 'LLL:EXT:jobs/Resources/Private/Language/locallang_bwjobs.xlf',
                ]
            );
        }

        // add static includes
        ExtensionManagementUtility::addStaticFile('jobs', 'Configuration/TypoScript', 'jobs');

        // job language config
        ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_job',
            'EXT:jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_job.xlf'
        );
        ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_job');

        // contact language config
        ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_contact',
            'EXT:jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_contact.xlf'
        );
        ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_contact');

        // job language config
        ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_location',
            'EXT:jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_location.xlf'
        );
        ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_location');

        // jobType language config
        ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_bwjobs_domain_model_jobtype',
            'EXT:jobs/Resources/Private/Language/locallang_csh_tx_bwjobs_domain_model_jobtype.xlf'
        );
        ExtensionManagementUtility::allowTableOnStandardPages('tx_bwjobs_domain_model_jobtype');

        ExtensionUtility::registerPlugin(
            'Browserwerk.BwJobs',
            'Frontend',
            'Frontend'
        );
    }
);
