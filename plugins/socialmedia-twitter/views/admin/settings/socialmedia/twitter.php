<?php 
/**
 * Twitter Settings view page.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     Facebook Settings View
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?>
			<div class="bg">
				<h2>
					<?php admin::settings_subtabs("socialmedia"); ?>
				</h2>
				<?php print form::open(); ?>
				<!-- tabs -->
				<div class="tabs">
					<!-- tabset -->
					<ul class="tabset">
						<?php
						$dispatch = Dispatch::controller("SocialMedia", "admin/settings");
						if ($dispatch instanceof Dispatch) $run = $dispatch->method('subtabs', 'twitter');
						?>
					</ul>
					<!-- /tabset -->

					<!-- tab -->
					<div class="tab">
						<ul>
							<li><input style="margin:0;" type="submit" class="save-rep-btn" value="<?php echo Kohana::lang('ui_admin.save_settings');?>" /></li>
						
						<?php
						if ( ! $form_error
							AND ! empty($form['twitter_api_key'])
							AND ! empty($form['twitter_api_key_secret'])
							AND ! empty($form['twitter_token'])
							AND ! empty($form['twitter_token_secret'])
						)
						{
						?>
										<li><a href="javascript:twitterTest();"><?php echo utf8::strtoupper(Kohana::lang('settings.test_settings'));?></a></li>
										<li id="test_loading"></li>
										<li id="test_status"></li>
						<?php
						}
						?>

						</ul>
					</div>
					<!-- /tab -->

				</div>
				<!-- /tabs -->

				<div class="report-form">
					<?php
					if ($form_error) {
					?>
						<!-- red-box -->
						<div class="red-box">
							<h3><?php echo Kohana::lang('ui_main.error');?></h3>
							<ul>
							<?php
							foreach ($errors as $error_item => $error_description)
							{
								// print "<li>" . $error_description . "</li>";
								print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
							}
							?>
							</ul>
						</div>
					<?php
					}

					if ($form_saved) {
					?>
						<!-- green-box -->
						<div class="green-box">
							<h3><?php echo Kohana::lang('ui_main.configuration_saved');?></h3>
						</div>
					<?php
					}
					?>				
					<!-- column -->
		
					<div class="sms_holder">
						<div class="row">
							<p><?php echo Kohana::lang('settings.twitter.description');?>:<br><a href="https://twitter.com/oauth_clients/" target="_blank">https://twitter.com/oauth_clients/</a></p>
							<p>For instructions see <a
							href="https://wiki.ushahidi.com/display/WIKI/Configuring+Twitter+on+a+deployment/"target="_blank">https://wiki.ushahidi.com/display/WIKI/Configuring+Twitter+on+a+deployment</a></h4>
						</div>
						<div class="row">
							<h4><?php echo Kohana::lang('settings.twitter.api_key');?>:</h4>
							<?php print form::input('twitter_api_key', $form['twitter_api_key'], ' class="text long2"'); ?>
						</div>
						<div class="row">
							<h4><?php echo Kohana::lang('settings.twitter.api_key_secret');?>:</h4>
							<?php print form::input('twitter_api_key_secret',$form['twitter_api_key_secret'],'class="text long2"'); ?>
						</div>
						<div class="row">
							<h4><?php echo Kohana::lang('settings.twitter.token');?>:</h4>
							<?php print form::input('twitter_token', $form['twitter_token'], ' class="text long2"'); ?>
						</div>
						<div class="row">
							<h4><?php echo Kohana::lang('settings.twitter.token_secret');?>:</h4>
							<?php print form::input('twitter_token_secret',$form['twitter_token_secret'],'class="text long2"'); ?>
						</div>
					</div>
				</div>
				<?php print form::close(); ?>
			</div>
		</div>