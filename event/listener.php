<?php
/**
 *
 * @package AddonForThanksForPosts
 * @copyright (c) 2014 alg 
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace alg\AddonForThanksForPosts\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	public function __construct(\phpbb\template\template $template, $phpbb_root_path)
	{
		$this->template = $template;
		$this->phpbb_root_path = $phpbb_root_path;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.viewtopic_modify_page_title'  => 'viewtopic_modify_page_title',
		);
	}

	public function viewtopic_modify_page_title($event)
	{
		$this->template->assign_vars(array(
			'U_ADDONFORTHANKSFORPOSTS_PATH'	=> append_sid("{$this->phpbb_root_path}AddonForThanksForPosts/" ),
		));
	}
}
