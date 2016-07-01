
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

<h2><?php _e('Setting ConoHa Object Sync', "openstack-media-sync"); ?></h2>

<p><?php _e("Type the API informations for the ConoHa Object storage. No account? Let's ", 'openstack-media-sync'); ?><a href="<?php _e('https://www.conoha.jp/en/', 'openstack-media-sync'); ?>" target="_blank" ><?php _e('signup', 'openstack-media-sync'); ?></a></p>

<form method="post" action="options.php">
		<?php settings_fields('osms-options'); ?>
		<?php do_settings_sections('osms-options'); ?>
		<table>
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

								<p class="description"><?php _e('The name of OpenStack object-store service. You can find it in KeyStone "token-get" response.', 'openstack-media-sync'); ?></p>

<p class="description"><?php _e('You will use "Object Storage Service" for ConoHa. If you use the old ConoHa, try to use "swift".', 'openstack-media-sync'); ?></p>

						</td>
				</tr>
				<tr>
						<th><?php _e('Container Name', 'openstack-media-sync') ?>:</th>
						<td>
								<input id="osms-container" name="osms-container" type="text"
												size="15" value="<?php echo esc_attr(
																				 get_option('osms-container')
																				 ); ?>" class="regular-text code"/>
								<p class="description"><?php _e('Container name that media files is uploaded. If the container not found, It will create automatically.', 'openstack-media-sync'); ?></p>
								<p class="osms-warning"><?php _e('The plugin will set the ACL to allow public access.', 'openstack-media-sync'); ?></p>
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

								<p class="description"><?php _e('The media files that has these extensions will be uploaded to the Object Storage. You can use comma separated format to specify more than one(Example: "png,jpg,gif,mov,wmv").', 'openstack-media-sync'); ?></p>
								<p class="description"><?php _e('If this field is blank, Everything will be uploaded.', 'openstack-media-sync'); ?></p>

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

								<p class="description"><?php _e('Media files in these directories ONLY will be uploaded. You can use comma separated format to specify more than one.', 'openstack-media-sync'); ?></p>
								<p class="description"><?php _e('If this field is blank, Everything will be uploaded.', 'openstack-media-sync'); ?></p>

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
     <p><?php _e('Resynchronization all media files to the Object Storage. It may take a long time.', 'openstack-media-sync') ?></p>
    <?php submit_button('Resynchronization', 'Secondary', 'resync') ?>
</form>
