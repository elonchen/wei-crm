<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Form for unsubscribing to a peopletag
 *
 * PHP version 5
 *
 * LICENCE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Form
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR.'/lib/form.php';

/**
 * Form for unsubscribing to a peopletag
 *
 * @category Form
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 *
 * @see      UnunsubscribeForm
 */
class UnsubscribePeopletagForm extends Form
{
    /**
     * peopletag for the user to join
     */
    var $peopletag = null;

    /**
     * Constructor
     *
     * @param HTMLOutputter $out   output channel
     * @param peopletag     $peopletag peopletag to unsubscribe to
     */
    function __construct($out=null, $peopletag=null)
    {
        parent::__construct($out);

        $this->peopletag = $peopletag;
    }

    /**
     * ID of the form
     *
     * @return string ID of the form
     */
    function id()
    {
        return 'peopletag-unsubscribe-' . $this->peopletag->id;
    }

    /**
     * class of the form
     *
     * @return string of the form class
     */
    function formClass()
    {
        return 'form_peopletag_unsubscribe';
    }

    /**
     * Action of the form
     *
     * @return string URL of the action
     */
    function action()
    {
        return common_local_url('unsubscribepeopletag',
                                array('id' => $this->peopletag->id));
    }

    /**
     * Action elements
     *
     * @return void
     */
    function formActions()
    {
        // TRANS: Button text for unsubscribing from a list.
        $this->out->submit('submit', _m('BUTTON','Unsubscribe'));
    }
}
