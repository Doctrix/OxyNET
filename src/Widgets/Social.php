<?php
namespace Model\Widgets;

class Social {

    public function facebook(string $url, string $label, string $nom, string $titre): string {
    return <<<HTML
    <style type="text/css">
    .center-div-fb
    {
    margin: 0 auto;
    padding: 0 0 80px 0;
    height: 600px;
    margin-left: auto;
    margin-right: auto;    }
    </style>
    <div class="card text-center center-div-fb col-md-3">
    <label><b>{$label}</b></label><br>
        <div class="fb-page" 
            data-href="https://www.{$url}.com/{$nom}" 
            data-tabs="timeline, events, messages" 
            data-width="340px" 
            data-height="100%" 
            data-small-header="false" 
            data-adapt-container-width="false" 
            data-hide-cover="false" 
            data-show-facepile="false">
            <blockquote cite="https://www.{$url}.com/{$nom}" 
                class="fb-xfbml-parse-ignore"><a href="https://www.{$url}.com/{$nom}">{$titre}</a>
            </blockquote>
        </div>
    </div>
    <br clear="all">
HTML;
}

    public function twitter(string $url, string $label, string $nom, string $titre): string {
    $ref = "ref_src=twsrc%5Etfw";
    return <<<HTML
    <style type="text/css">
    .center-div-tweets
    {
    padding: 10px 0 80px 0;
    height: 600px;
    margin: 0 auto;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;    }
    </style>
    <div class="center-div-tweets card col-md-3">
    <label><b>{$label}</b></label><br>
        <a class="{$url}-timeline" 
        data-lang="fr" 
        data-theme="dark"
        data-width="94%"
        data-height="100%" 
        href="https://{$url}.com/{$nom}?{$ref}">Tweets by {$titre}</a>
        <script async src="https://platform.{$url}.com/widgets.js" charset="utf-8"></script>
    </div>
    <br clear="all">
HTML;
}

}

