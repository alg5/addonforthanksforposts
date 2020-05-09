<?php
/**
*
* @package addonforthanksforposts
* @copyright (c) 2014 alg
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
 */

namespace alg\addonforthanksforposts\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\controller\helper */
	protected $controller_helper;
	/**
	* Constructor
	* @param \phpbb\template\template		$template			Template object
	* @param \phpbb\controller\helper		$controller_helper	Controller helper object

	* @access public
	*/

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\controller\helper $controller_helper, \phpbb\path_helper $path_helper)
	{
		$this->config = $config;
		$this->template = $template;
		$this->controller_helper = $controller_helper;
		$this->path_helper = $path_helper;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.viewtopic_modify_page_title'  => 'viewtopic_modify_page_title',
			'core.text_formatter_s9e_render_before' => 'set_smilies_path',
		);
	}

	public function viewtopic_modify_page_title($event)
	{
		$this->template->assign_vars(array(
			'U_ADDONFORTHANKSFORPOSTS_PATH'	=> $this->controller_helper->route('alg_addonforthanksforposts_controller_main'),
		));
	}

	public function set_smilies_path($event)
	{
		$root_path = (defined('PHPBB_USE_BOARD_URL_PATH') && PHPBB_USE_BOARD_URL_PATH) ? generate_board_url() . '/' : $this->path_helper->get_web_root_path();
		$event['renderer']->set_smilies_path($this->path_helper->remove_web_root_path($root_path) . $this->config['smilies_path']);
	}

}
