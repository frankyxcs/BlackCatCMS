<div class="iframe-container iframe-container-{$ratio}{if $content_type=='video'} iframe-container-video{/if}">
    <object type="text/html" data="{$url}" dir="ltr">
      {translate('Your browser does not support inline frames.<br />Click on the link below to visit the website that was meant to be shown here...<br />')}
      <a href="{$url}">{$url}</a>
    </object>
</div>