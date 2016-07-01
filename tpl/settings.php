
<div id="osms-flash" class="updated">
		<p></p>
		<?php if($messages): ?>
				<?php foreach($messages as $msg): ?>
						<p><?php echo $msg; ?></p>
				<?php endforeach; ?>
		<?php endif; ?>
</div>

<?php if(isset($_POST['resync']) && $_POST['resync']): ?>
<div id="conohao-resync-status" class="updated">
		<?php _e('Resynchronization result.', "openstack-media-sync"); ?>
		<?php if($messages): ?>
				<?php foreach($messages as $msg): ?>
						<p><?php echo $msg; ?></p>
				<?php endforeach; ?>
		<?php endif; ?>
</div>
<?php endif; ?>

<h2><?php _e('Openstack Media Sync Settings', "openstack-media-sync"); ?></h2>


<h4><?php _e('Configure Openstack Object Storage Service', "openstack-media-sync"); ?></h4>

<p><?php _e("Enter your openstack account information.", 'openstack-media-sync'); ?></p>

<form method="post" action="options.php">
		<?php settings_fields('osms-options'); ?>
		<?php do_settings_sections('osms-options'); ?>
		<table class="osms-settings">
				<tr>
						<th><?php _e('API Account', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-username" name="osms-username" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-username')
																				 ); ?>" class="regular-text code"/>

						</td>
				</tr>
				<tr>
						<th><?php _e('API Password', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-password" name="osms-password" type="password"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-password')
																				 ); ?>"  class="regular-text code"/>

						</td>
				</tr>
				<tr>
						<th><?php _e('Tenant ID', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-tenant-id" name="osms-tenant-id" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-tenant-id')
																				 ); ?>" class="regular-text code"/>

						</td>
				</tr>
				<tr>
						<th><?php _e('Auth URL', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-auth-url" name="osms-auth-url" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-auth-url')
																				 ); ?>" class="regular-text code"/>

						</td>
				</tr>
				<tr>
						<th><?php _e('Region', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-region" name="osms-region" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-region')
																				 ); ?>" class="regular-text code"/>

						</td>
				</tr>
				<tr>
						<th><?php _e('Service Name', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-servicename" name="osms-servicename" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-servicename')
																				 ); ?>" class="regular-text code"/>

								<p class="description">
									<?php _e('The name of your OpenStack object-store service. You can find it in KeyStone "token-get" response or by using', 'openstack-media-sync'); ?><a href="http://docs.openstack.org/cli-reference/common/cli_install_openstack_command_line_clients.html" target="_blank"><?php _e('openstack command line tools', 'openstack-media-sync'); ?></a><?php _e('to call ‘openstack catalog list’.', 'openstack-media-sync'); ?></p>

								<p class="description"><?php _e('Usually this is "Object Storage Service", but some older services use "swift".', 'openstack-media-sync'); ?></p>

						</td>
				</tr>
				<tr>
						<th><?php _e('Container Name', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-container" name="osms-container" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-container')
																				 ); ?>" class="regular-text code"/>
								<p class="description"><?php _e('Container to connect wordpress to.  Only one container can be used currently. If not matching container is found, a new container will be created.', 'openstack-media-sync'); ?></p>
								<p class="osms-warning"><?php _e('This plugin requires the access control list to allow public access to the container.', 'openstack-media-sync'); ?></p>
						</td>
				</tr>
				<tr>
						<td colspan="2" style="padding-top: 1em">
                <input type="button" name="test" id="submit" class="button button-secondary"
                        value="<?php _e('Check the connection', 'openstack-media-sync'); ?>"
												onclick="osms_connect_test()"/>
						</td>
				</tr>
		</table>

		<h3><?php _e('File Types', 'openstack-media-sync'); ?></h3>
		<table>
				<tr>
						<th><?php _e('Extensions', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-extensions" name="osms-extensions" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-extensions')
																				 ); ?>" class="regular-text code"/>

								<p class="description"><?php _e('Only upload/sync files with these extensions. Use comma separated format to list more filetype (e.g. "png,jpg,gif,mov,wmv").', 'openstack-media-sync'); ?></p>
								<p class="description"><?php _e('Leave this field black to upload all Wordpress attachment file types.', 'openstack-media-sync'); ?></p>

						</td>
				</tr>
		</table>

		<h3><?php _e('File Directories', 'openstack-media-sync'); ?></h3>
		<table>
				<tr>
						<th><?php _e('Directories', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-directories" name="osms-directories" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-directories')
																				 ); ?>" class="regular-text code"/>

								<p class="description"><?php _e('Only upload/sync attachment files in these directories. You can use comma separated format to specify more than one.  Matching is path-string based, so you can enter "photos" or be more specific by entering "/photos/2015/".', 'openstack-media-sync'); ?></p>
								<p class="description"><?php _e('Leave this field black to upload Wordpress attachment files in all directories.', 'openstack-media-sync'); ?></p>

						</td>
				</tr>
		</table>

		<h3><?php _e('Directories for Custom Post Types', 'openstack-media-sync'); ?></h3>
		<table>
				<tr>
						<td colspan="2">
                <input id="osms-custom-post-dir" type="checkbox" name="osms-custom-post-dir"
                        value="1" <?php checked(get_option('osms-custom-post-dir'),1); ?> />
                <label for="osms-custom-post-dir"><?php _e('Create / store uploads for custom posts in directories based on post slug (this option can be used in conjunction with File Directories to restrict Object Storage to custom post types.', 'openstack-media-sync'); ?></label>
						</td>
				</tr>
		</table>

		<h3><?php _e('Synchronization options', 'openstack-media-sync'); ?></h3>
		<table>
				<tr>
						<td colspan="2">
                <input id="delobject" type="checkbox" name="osms-delobject"
                        value="1" <?php checked(get_option('osms-delobject'),1); ?> />
                <label for="delobject"><?php _e('Delete the object from the object storage when the library file is deleted.', 'openstack-media-sync'); ?></label>
						</td>
				</tr>
		</table>

		<table>
				<tr>
						<td colspan="2">
								<?php submit_button(); ?>
						</td>
				</tr>
		</table>

</form>

<hr />
<h2><?php _e('Resynchronization', "openstack-media-sync"); ?></h2>
<form  method="post">
     <p><?php _e('Resynchronize all media files to the Object Storage account. This may take a significant amount of time if you have a large amount of files.', 'openstack-media-sync') ?></p>
    <?php submit_button('Resynchronization', 'Secondary', 'resync') ?>
</form>
