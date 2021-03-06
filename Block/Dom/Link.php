<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: jeroen
 * Date: 15-4-19
 * Time: 22:43
 */

namespace Elgentos\PrismicIO\Block\Dom;

use Elgentos\PrismicIO\Block\AbstractBlock;
use Prismic\Dom\Link as PrismicLink;

class Link extends AbstractBlock
{
    public function fetchDocumentView(): string
    {
        $url = PrismicLink::asUrl($this->getContext(), $this->getLinkResolver());

        $baseUrl = $this->_urlBuilder->getBaseUrl();
        $findAndReplaceBaseUrl = [
            'http://{{relative}}',
            'https://{{relative}}',
        ];

        $url = str_replace($findAndReplaceBaseUrl, $baseUrl, $url);
        return $this->escapeUrl($url);
    }
}
