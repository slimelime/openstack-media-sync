=== Openstack Media Sync ===
Contributors: wolski, hironobu
Tags: OpenStack Swift, object storage
Requires at least: 4.0
Tested up to: 4.5.2
Stable tag: 0.1
License: GPLv2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Openstack Media Sync is a lightweight Wordpress plugin that automatically moves media attachment object to a Openstack Swift-based storage service, updating path and url records.


== Description ==

This plugin is heavily based on Hironobu Saitoh's ConoHa Object Sync plugin (https://github.com/hironobu-s/conoha-ojs-sync), but has been extended to include some additionally functionality and has had a few bug fixes.


== Features ==

 - Connect to a Openstack Storage service container (currently only a single container).
 - Add / Delete files uploaded through worpdress to/from an Openstack Storage container (files must be uploaded through wordpress, this plugin does not read down from openstack).
 - Restrict synchronisation by file extension.
 - Restrict synchronisation by directory.
 - Create custom upload directories for custom post types (this can be used with directory settings to restrict synchronisation to custom post types by slug).
 - Resynchronise function to capture existing files. 


== Configuring Openstack Service / Account ==

Due to inconsistent terminology, this can be confusing.

Configuration fields:
API Account - This is the account name that you wish to use to connect to the service. Often it is your personal account username.
API Password - This is the account password that you wish to use to connect to the service. Often it is your personal account password.
Tenant ID - This is sometimes referred to as 'Project ID', it's the identifier for the openstack allocation you wish to connect to.  Some systems use 'Tenant Name', this plugin requires an ID string.
Auth URL - This is a Keystone v2 authentication URL.
Region - This is the region string. If you have an OpenStack client installed (http://docs.openstack.org/cli-reference/common/cli_install_openstack_command_line_clients.html) you can call ‘openstack catalog list’ to get this information.
Service Name - This is usually 'Object Storage Service', but with older versions occasionally. If you have an OpenStack client installed (http://docs.openstack.org/cli-reference/common/cli_install_openstack_command_line_clients.html) you can call ‘openstack catalog list’ to get this information.
Container Name - This is the container in the allocation you wish to use.  Sometimes this is referred to as a 'Bucket'.  This plugin will create a container if a matching one is not found.