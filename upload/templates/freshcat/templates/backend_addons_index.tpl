<div id="fc_content_header">
	{translate('Addons')}
</div>
<div id="fc_main_content">
	<div id="fc_lists_overview">
		<div id="fc_list_search">
			<div class="fc_input_fake">
				<input type="text" name="fc_list_search" id="fc_list_search_input" value="{translate('Search...')}" />
				<label class="fc_close" for="fc_list_search_input"></label>
			</div>
		</div>
		<div class="fc_gradient1 fc_border">
			<button class="icon-puzzle fc_active fc_gradient1 fc_gradient_hover" title="{translate('Modules')}"></button>
			<button class="icon-color-palette fc_gradient1 fc_gradient_hover" title="{translate('Templates')}"></button>
			<button class="icon-comments fc_gradient1 fc_gradient_hover" title="{translate('Languages')}"></button>
			{if $permissions.MODULES_INSTALL}<button id="fc_list_add" class="icon-plus fc_gradient1 fc_gradient_hover" title="{translate('Install Addon')}"></button>{/if}
			<div class="clear"></div>
		</div>
		<ul id="fc_list_overview" class="fc_group_list">
			{foreach $addons as addon}
			{if $addon.name}
			<li class="fc_module_item fc_type_{$addon.type} fc_border fc_gradient1 fc_gradient_hover{if $addon.is_installed === false} fc_not_installed{/if}">
				{if $addon.icon}<img src="{$addon.icon}" alt="{$addon.directory}" />
				{elseif $addon.type == 'templates'}<span class="icon-color-palette"></span>{elseif $addon.type == 'languages'}<span class="icon-comments"></span>{else}<span class="icon-puzzle"></span>{/if}
				<span class="fc_groups_name"> {$addon.name}</span>
				<input type="hidden" name="addon_directory" value="{$addon.directory}" />
			</li>
			{else}
			<li class="fc_uninstalled_addon">
				<span class="fc_groups_name">{$addon.INSTALL.name}</span>
			</li>
			{/if}
			{/foreach}

            {if $not_installed_addons}
            <li class="fc_type_heading fc_border fc_gradient4">
				<span class="fc_groups_name">{translate('Not installed yet')}</span>
			</li>
            {foreach $not_installed_addons as addon}
			{if $addon.name}
			<li class="fc_module_item fc_type_{$addon.type} fc_border fc_gradient1 fc_gradient_hover{if $addon.is_installed === false} fc_not_installed{/if}">
				{if $addon.icon}<img src="{$addon.icon}" alt="{$addon.directory}" />
				{elseif $addon.type == 'templates'}<span class="icon-color-palette"></span>{elseif $addon.type == 'languages'}<span class="icon-comments"></span>{else}<span class="icon-puzzle"></span>{/if}
				<span class="fc_groups_name"> {$addon.name}</span>
				<input type="hidden" name="addon_directory" value="{$addon.directory}" />
			</li>
			{else}
			<li class="fc_uninstalled_addon">
				<span class="fc_groups_name">{$addon.INSTALL.name}</span>
			</li>
			{/if}
			{/foreach}
{/if}
		</ul>
	</div>
	<div class="fc_all_forms">
		{if $permissions.MODULES_INSTALL}
		<form name="install" enctype="multipart/form-data" action="install.php" method="post" id="fc_install_new" class="fc_list_forms">
			<p class="submit_settings fc_gradient1">
				<strong>{translate('Install addon')}</strong>
				<input type="submit" name="submit" value="{translate('Install addon')}" />
				<input type="reset" name="reset" value="{translate('Reset')}" />
			</p>
			<div class="clear_sp"></div>
			<p>
				<input type="file" name="userfile" />
			</p>
			{if $groups.viewers}
			<hr />
			<h3>{translate('Addon permissions')}</h3>
			<p>
				{translate('You can set permissions for each group to use this addon.')}<br />
				{translate('You can customize permissions later on group administration.')}<br />
				{translate('If you upgrade a module, those settings will have no effect on current permissions.')}
			</p>
			<button class="fc_gradient1 fc_gradient_hover" id="fc_mark_all">
				<span class="fc_mark">{translate('Mark all groups')}</span>
				<span class="fc_unmark hidden">{translate('Unmark all groups')}</span>
			</button>
			<div class="clear_sp"></div>
			<div id="fc_perm_groups" class="fc_settings_max">
				{foreach $groups.viewers as group}
				<input type="checkbox" class="fc_checkbox_jq" name="group_id[]" id="fc_group_{$group.VALUE}" value="{$group.VALUE}" />
				<label for="fc_group_{$group.VALUE}">{$group.NAME}</label>
				{/foreach}
			</div>
			<div class="clear_sp"></div>
			{/if}
			<p class="submit_settings fc_gradient1">
				<input type="submit" name="submit" value="{translate('Install addon')}" />
				<input type="reset" name="reset" value="{translate('Reset')}" />
			</p>
		</form>
		{/if}
		{foreach $addons as addon}
		<div id="fc_list_{if $addon.directory}{$addon.directory}{else}{$addon.INSTALL.directory}{/if}" class="fc_list_forms fc_form_content">
            {if $addon.is_removable && $permissions.MODULES_UNINSTALL}
			<form name="uninstall" action="uninstall.php" method="post" class="submit_settings fc_gradient1">
				<input type="hidden" name="file" value="{$addon.directory}" />
				<input type="hidden" name="type" value="{$addon.type}" />
				<strong>{translate('Module details')}: {$addon.name}</strong>
				<input type="submit" name="uninstall_module" value="{translate('Uninstall Addon')}" class="fc_gradient_red" />
			</form>
            {else}
            <div class="submit_settings">
                <strong>{translate('Module details')}: {$addon.name}</strong>
                {if ! $addon.is_removable}
                <span>{translate('Marked as mandatory')}</span>
                {/if}
            </div>
            {/if}
			<div class="clear_sp"></div>
			{if $addon.description || $addon.type == 'languages'}
			{if $addon.description}
			<div>
				{if $addon.icon}<img class="right" src="{$addon.icon}" alt="{$addon.name}" />{/if}
				{$addon.description}
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<hr />
			{/if}
			<p>
			<span class="fc_label_200">{translate('Version')}:</span>{$addon.version}<br />
			<span class="fc_label_200">{translate('Author')}:</span>{$addon.author}<br />
			{if $addon.function}<span class="fc_label_200">{translate('Function')}:</span>{$addon.function}<br />{/if}
			<span class="fc_label_200">{translate('Designed for')}:</span>Black Cat CMS {$addon.platform}<br />
			<span class="fc_label_200">{translate('License')}:</span>{$addon.license}<br />
            {if $addon.installed}<span class="fc_label_200">{translate('Installed')}:</span>{$addon.installed}<br />{/if}
            {if $addon.upgraded}<span class="fc_label_200">{translate('Upgraded')}:</span>{$addon.upgraded}<br />{/if}
			</p>
			{if $permissions.MODULES_UNINSTALL && !$addon.UNINSTALLED}
			<div class="clear"></div>
			<hr />
			<div class="clear_sp"></div>
			{/if}
			{else}
			<h2>{translate('Module seems to be not installed yet.')}</h2>
			{/if}
			{if $permissions.MODULES_INSTALL}
              <p class="fc_gradient_red">{translate('DANGER ZONE! This may delete your current data!')}</p>
			  <p>{translate('When modules are uploaded via FTP (not recommended), the module installation functions install, upgrade or uninstall will not be executed automatically. Those modules may not work correct or do not uninstall properly.')}<br />
              {translate('You can execute the module functions manually for modules uploaded via FTP below.')}
              </p>
              {if $addon.INSTALL}
			  <form name="install" action="manual_install.php" method="post" style="float:left;">
				<input type="hidden" name="action" value="install" />
				<input type="hidden" name="file" value="{if $addon.directory}{$addon.directory}{else}{$addon.INSTALL.directory}{/if}" />
				<input type="submit" name="install_manual_module" class="fc_gradient_red" value="{translate('Execute install.php manually')}" />
			</form>
			  {else}
              <h3>{translate('No install.php found! The module cannot be installed!')}</h3>
			{/if}
			  {if $addon.UPGRADE}
			<form name="upgrade" action="manual_install.php" method="post">
				<input type="hidden" name="action" value="upgrade" />
				<input type="hidden" name="file" value="{if $addon.directory}{$addon.directory}{else}{$addon.INSTALL.directory}{/if}" />
				<input type="submit" name="upgrade_module" class="fc_gradient_red" value="{translate('Execute upgrade.php manually')}" />
			</form>
			{/if}
            {/if}
			<div class="clear_sp"></div>
		</div>
		{/foreach}
	</div>
</div>