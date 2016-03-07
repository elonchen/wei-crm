<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Widget for showing list of group messages
 *
 * PHP version 5
 *
 * This program is free software: you can redistribute it and/or modify
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
 * @category  GroupPrivateMessage
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

/**
 * Widget for showing list of group messages
 *
 * @category  GroupPrivateMessage
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class GroupMessageList extends Widget
{
    var $gm;

    /**
     * Constructor
     *
     * @param HTMLOutputter $out output context
     * @param Group_message $gm  Group message stream
     */
    function __construct($out, $gm)
    {
        parent::__construct($out);
        $this->gm = $gm;
    }

    /**
     * Show the list
     *
     * @return void
     */
    function show()
    {
        $this->out->elementStart('ul', 'notices messages group-messages');

        $cnt = 0;

        while ($this->gm->fetch() && $cnt <= MESSAGES_PER_PAGE) {

            $cnt++;

            if ($cnt > MESSAGES_PER_PAGE) {
                break;
            }

            $gmli = new GroupMessageListItem($this->out, $this->gm);
            $gmli->show();
        }

        $this->out->elementEnd('ul');

        return $cnt;
    }
}