<?php
/**
 * @package    mod_cookies
 *
 * @author     Elvis Sedić elvis@spletodrom.si
 * @copyright  Spletodrom
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.spletodrom.si
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

// Access to module parameters
$privacypolicy = $params->get('privacypolicy', '');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Load cookie script
$doc = Factory::getDocument();
$doc->addStyleDeclaration("
.cookies {background: rgba(0, 0, 0, 0.74); color: #fff; font-size: .875rem;}
.cookies a:not(.uk-button) {color: #fff; text-decoration: underline;}
");
$doc->addScript(Uri::root() . 'modules/mod_cookies/assets/js/js.cookie.min.js');
$doc->addScriptDeclaration("
	// COOKIES
	jQuery(document).ready(function() {


		// skrij obvestilo
		if(Cookies.get('piskotki') == 'true' && jQuery('#cookies_row:visible')) {
			jQuery('#cookies_row').hide();
		}
		// prikaži obvestilo - TODO: use UIKit toggle()
		if(jQuery('#cookies_row:hidden')) {
			jQuery('#cookies_show').on('click', function() {
				jQuery('#cookies_row').show();
			});
		}
	});
	jQuery(window).load(function() {

		// Create cookie when modal window appears
		if(typeof Cookies.get('piskotki') == 'undefined') {
		  // console.log('cookie is undefined and will be created, cookie banner will be shown');
		  jQuery('#cookies_row').addClass('in');
		  Cookies.set('piskotki', 'true', { expires: 365 });
		  Cookies.set('statistika', 'true', { expires: 365 });
		}

		// Save cookies
		UIkit.util.on('#cookies_modal', 'hide', function () {
		  // Save cookie Stats
		  if(jQuery('#statistika').prop('checked') == false) {
		    console.log('getCookieStats is unchecked; getCookieStats will be set to false');
		    Cookies.set('statistika', 'false', { expires: 365 });
		  }
		});

		// Uncheck Analytics checkbox, if stats cookie is unchecked
		if(Cookies.get('statistika') === 'false') {
		  // Just in case we uncheck stats checkbox
		  jQuery('#statistika').prop('checked', false);
		}

		// Google Analytics
		if(Cookies.get('statistika') === 'true') {

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-452279-1']);
			_gaq.push (['_gat._anonymizeIp']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		}
	});
");

require ModuleHelper::getLayoutPath('mod_cookies', $params->get('layout', 'default'));