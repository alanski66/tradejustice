<?php
/**
 * Mailchimp Subscribe plugin for Craft CMS 3.x
 *
 * @link      https://www.vaersaagod.no
 * @copyright Copyright (c) 2017 André Elvan
 */

namespace aelvan\mailchimpsubscribe\models;

use craft\base\Model;

class MemberResponse extends Model
{
    public $action = 'get-member';
    public $success = '';
    public $response = null;
}
