/**
 * This file is part of LEPTON Core, released under the GNU GPL
 * Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
 * 
 * NOTICE:LEPTON CMS Package has several different licenses.
 * Please see the individual license in the header of each single file or info.php of modules and templates.
 *
 * @author          LEPTON Project
 * @copyright       2012, LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see LICENSE and COPYING files in your package
 * @version         $Id$
 *
 */

(function ($) {
	$.fn.fc_show_popup = function (options)
	{
		var defaults =
		{
			functionOpen:	false
		};
		var options = $.extend(defaults, options);
		return this.each(function ()
		{
			var current_button		= $(this),
				current_item		= $('#'+current_button.attr('rel'));

			current_button.unbind().click(function()
			{
				// remove validation classes -> this is for optical reset of forms
				current_item.find('.fc_valid, .fc_invalid').removeClass('fc_invalid fc_valid');
				
				// Find the title of the element, get it to add it to the ui-dialog-titlebar
				var title	= current_item.find('input[name="form_title"]').val();

				// Find confirm-buttons of the element, get them for adding them to the ui-dialog-footer and hide it
				if ( current_item.find('.fc_confirm_bar').size() > 0 )
				{
					buttonsOpts			= new Array();
					current_item.find('.fc_confirm_bar input').each(function()
					{
						var input		= $(this);
						// bind hidden inputs with empty function and add class hidden to hide them in the dialog form
						if ( input.hasClass( 'hidden' ) )
						{
							var action			= function(){ },
								buttonClass		= 'hidden';
						}
						// bind reset buttons
						else if ( input.attr('type') == 'reset' )
						{
							var action			= function()
							{
								current_item.find('input[type="reset"]').click(); 
								// current_item.find('.fc_individual').removeClass('fc_individual');
								current_item.dialog('close'); 
							},
								buttonClass		= 'reset';
						}
						// else bind submit buttons
						else //if ( $(this).attr('type')=='submit' )
						{
							var action			= function(){
								current_item.submit();
							},
								buttonClass		= 'submit';
						}
						buttonsOpts.push(
						{
							'text':		input.val(),
							'click':	action,
							'class':	buttonClass
						});
					});
					current_item.find('.fc_confirm_bar').hide();
				}

				// activate dialog for the form
				current_item.dialog(
				{
					create:			function(event, ui)
					{
						// again change of classes for optical reason only
						$('.ui-widget-header').removeClass('ui-corner-all').addClass('ui-corner-top');
					},
					open:			function(event, ui)
					{
						if ( typeof(functionOpen) != 'undefined' && functionOpen != false )
						{
							functionOpen.call(this);
						}
					},
					modal:			true,
					closeOnEscape:	true,
					title:			title,
					minWidth:		600,
					minHeight:		400,
					buttons:		buttonsOpts
				});
			});
			current_item.hide();
		});
	}
})(jQuery);