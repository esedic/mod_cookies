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

use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;
?>

<div class="cookies uk-position-fixed uk-position-bottom uk-padding-small uk-position-z-index" id="cookies_row">
  <div class="uk-text-center uk-position-relative">
    <?php echo Text::sprintf('MOD_COOKIES_PRIVACYPOLICY_LINK', JRoute::_('index.php?Itemid='.$privacypolicy)); ?>
    <a href="#cookies_modal" id="cookie_settings" class="uk-button uk-button-primary uk-margin-small-left" uk-toggle><?php echo Text::_('MOD_COOKIES_SETTINGS_BTN');?></a>
    <a href="#" class="uk-position-top-right" uk-toggle="target: #cookies_row; animation: uk-animation-slide-bottom-small" id="cookies_close_modal">
      <span uk-icon="close"></span>
    </a>
  </div>
</div>

<div id="cookies_modal" class="uk-modal-container" uk-modal>
  <div class="uk-modal-dialog">
    <div class="uk-container uk-container-small">
      <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
      <div class="uk-flex uk-flex-middle uk-flex-center">
        <div class="uk-padding">
          <h3><?php echo Text::_('MOD_COOKIES_SETTINGS_COOKIE');?></h3>
          <?php echo Text::_('MOD_COOKIES_SETTINGS_INTRO');?>
          <div class="uk-margin">
            <label><input class="uk-checkbox" type="checkbox" checked disabled> <?php echo Text::_('MOD_COOKIES_NECESSARY_COOKIES_TITLE');?></label>
            <p class="uk-margin-small-top"><?php echo Text::_('MOD_COOKIES_NECESSARY_COOKIES_DESC');?></p>
          </div>
          <div class="uk-margin">
            <label><input class="uk-checkbox" type="checkbox" checked id="statistika"> <?php echo Text::_('MOD_COOKIES_ANALYTICAL_COOKIES_TITLE');?></label>
            <p class="uk-margin-small-top"><?php echo Text::_('MOD_COOKIES_ANALYTICAL_COOKIES_DESC');?></p>
          </div>
          <p class="uk-text-right">
            <button class="uk-button uk-button-primary uk-modal-close" type="button" uk-toggle="target: #cookies_row" id="cookies_save">
              <?php echo Text::_('MOD_COOKIES_SAVE');?>
            </button>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>