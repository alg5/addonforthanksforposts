<?php
/**
*
* @package AddonForThanksForPosts
* @copyright (c) alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\AddonForThanksForPosts\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['AddonForThanksForPosts']) && version_compare($this->config['AddonForThanksForPosts'], '2.0.0', '>=');
	}

	static public function depends_on()
	{
			return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_schema()
	{
        return array();
	}

	public function revert_schema()
	{
        return array();
	}

	public function update_data()
	{
		return array(
			// Add configs
			// Current version
			array('config.add', array('AddonForThanksForPosts', '2.0.0')),
		);
	}
}
