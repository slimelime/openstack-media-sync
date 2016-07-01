# Openstack Media Sync (Wordpress Plugin)

Openstack Media Sync is a lightweight Wordpress plugin that automatically moves media attachment object to a Openstack Swift-based storage service, updating path and url records.

This plugin is heavily based on Hironobu Saitoh's ConoHa Object Sync plugin (https://github.com/hironobu-s/conoha-ojs-sync), but has been extended to include some additionally functionality and has had a few bug fixes.

## Installation

Clone package into wordpress plugins directory, or download and ftp files into plugins directory manually.  Activate plugin and configure in Settings > Openstack Media Sync page.

## Configuring Openstack Service / Account

Due to inconsistent terminology, this can be confusing for some users.

Configuration fields:
* API Account - This is the account name that you wish to use to connect to the service. Often it is your personal account username.
* API Password - This is the account password that you wish to use to connect to the service. Often it is your personal account password.
* Tenant ID - This is sometimes referred to as 'Project ID', it's the identifier for the openstack allocation you wish to connect to.  Some systems use 'Tenant Name', this plugin requires an ID string.
* Auth URL - This is a Keystone v2 authentication URL.
* Region - This is the region string. If you have an OpenStack client installed (http://docs.openstack.org/cli-reference/common/cli_install_openstack_command_line_clients.html) you can call ‘openstack catalog list’ to get this information.
* Service Name - This is usually 'Object Storage Service', but with older versions occasionally. If you have an OpenStack client installed (http://docs.openstack.org/cli-reference/common/cli_install_openstack_command_line_clients.html) you can call ‘openstack catalog list’ to get this information.
* Container Name - This is the container in the allocation you wish to use.  Sometimes this is referred to as a 'Bucket'.  This plugin will create a container if a matching one is not found.