<?php
/**
*
* @package AddonForThanksForPosts
* @copyright (c) alg
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace alg\AddonForThanksForPosts\migrations;

class v_3_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['AddonForThanksForPosts_3_2']) && version_compare($this->config['AddonForThanksForPosts_3_2'], '3.0.*', '>=');
	}

	static public function depends_on()
	{
			return array(
				'\alg\AddonForThanksForPosts\migrations\v_2_0_0',
			);
	}

	public function update_schema()
	{
		return array(
		);
	}

	public function revert_schema()
	{
		return array(
		);
	}

	public function update_data()
	{
		return array(
			// Current version
			array('config.update', array('AddonForThanksForPosts_3_2', '3.0.0')),
		);
	}
}
