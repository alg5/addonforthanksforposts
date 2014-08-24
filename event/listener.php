<?php
/**
 *
 * @package ratinggame
 * @copyright (c) 2014 alg 
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace alg\AddonForThanksForPosts\event;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
    public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, \phpbb\cache\driver\driver_interface $cache, $phpbb_root_path, $php_ext)
    {
	    $this->config = $config;
		$this->db = $db;
		$this->auth = $auth;
        $this->template = $template;
        $this->user = $user;
		$this->cache = $cache;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
    }

	static public function getSubscribedEvents()
	{
		return array(
            'core.viewtopic_modify_page_title'		                => 'viewtopic_modify_page_title',
        );
	}

    public function viewtopic_modify_page_title($event)
    {
        $this->user->add_lang_ext('gfksx/ThanksForPosts', 'thanks_mod');
        global $forum_id;
        $this->template->assign_vars(array(
	        'S_FORUM_THANKS'	=> (bool)($this->auth->acl_get('f_thanks', $forum_id)) ,
            ));
    }
}
