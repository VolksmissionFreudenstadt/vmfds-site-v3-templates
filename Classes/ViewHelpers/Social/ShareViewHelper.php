<?php
namespace VMFDS\V3\ViewHelpers\Social;

class ShareViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    private $urls = [
        'facebook' => [
            'url' => 'https://www.facebook.com/sharer/sharer.php?sdk=joey&u={url}&display=popup&ref=plugin&src=share_button',
            'li' => 'hb-fb',
            'icon' => 'fa fa-facebook',
            'title' => 'Auf Facebook teilen'
        ],
        'twitter' => [
            'url' => 'https://twitter.com/intent/tweet?url={url}&text={text}&tw_p=tweetbutton',
            'li' => 'hb-tw',
            'icon' => 'fa fa-twitter',
            'title' => 'Auf Twitter teilen'
        ],
        'addthis' => [
            'url' => 'http://api.addthis.com/oexchange/0.8/offer?url={url}',
            'li' => 'hb-plus',
            'icon' => 'fa fa-plus',
            'title' => 'Weitere soziale Netzwerke'
        ]
    ];

    /**
     * Render three sharer widgets
     *
     * @param string $url
     *            Url to share
     * @param string $text
     *            Text
     */
    function render($url, $text = '')
    {
        $o = array();
        foreach ($this->urls as $service) {
            $serviceUrl = str_replace('{url}', urlencode($url), str_replace('{text}', urlencode($text), $service['url']));
            $o[] = '<li class="' . $service['li'] . '">' . '<a title="' . $service['title'] . '" href="' . $serviceUrl . '" target="_blank"><i class="' . $service['icon'] . '"></i></a></li>';
        }
        return '<ul class="hb-social">' . join('', $o) . '</ul>';
    }
}