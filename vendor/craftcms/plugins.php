<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'aelvan/mailchimp-subscribe' => 
  array (
    'class' => 'aelvan\\mailchimpsubscribe\\MailchimpSubscribe',
    'basePath' => $vendorDir . '/aelvan/mailchimp-subscribe/src',
    'handle' => 'mailchimp-subscribe',
    'aliases' => 
    array (
      '@aelvan/mailchimpsubscribe' => $vendorDir . '/aelvan/mailchimp-subscribe/src',
    ),
    'name' => 'Mailchimp Subscribe',
    'version' => '3.0.1',
    'schemaVersion' => '2.0.0',
    'description' => 'Simple Craft plugin for subscribing to a MailChimp audience.',
    'developer' => 'André Elvan',
    'developerUrl' => 'https://www.vaersaagod.no',
    'changelogUrl' => 'https://raw.githubusercontent.com/aelvan/mailchimp-subscribe/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
    'components' => 
    array (
    ),
  ),
);
