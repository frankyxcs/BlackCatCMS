<div class="iframe-container iframe-container-{$ratio}{if $content_type=='video'} iframe-container-video{/if}">
  <iframe src="{$url}" frameborder="0" scrolling="auto" allowfullscreen="">
    {translate('Your browser does not support inline frames.<br />Click on the link below to visit the website that was meant to be shown here...<br />')}
    <a href="{$url}">{$url}</a>
  </iframe>
</div>