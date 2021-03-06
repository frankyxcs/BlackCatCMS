{include file="header.tpl"}
  <a href="{$CAT_ADMIN_URL}/admintools/tool.php?tool=droplets">&laquo; {translate('Back to overview')} &laquo;</a><br />
  {if $problem}<div class="problem ui-corner-all">{$problem}</div>{/if}
  {if $info}<div class="info ui-corner-all">{$info}</div>{/if}
  <form method="post" action="{$action}">
    <input type="hidden" name="tool" value="droplets" />
    <input type="hidden" name="datafile" value="{$id}" />
    <fieldset>
      <legend>{translate('Edit datafile for Droplet')}: {$name}</legend>
        <label for="code">{translate('Contents')}:</label>
          <textarea cols="100" name="contents" rows="20">{$contents}</textarea><br /><br />
        <input type="submit" name="save" value="{translate('Save')}" />
        <input type="submit" name="save_and_back" value="{translate('Save and Back')}" />
        <input type="submit" name="cancel" value="{translate('Cancel')}" />
    </fieldset>
  </form>
{include file="footer.tpl"}