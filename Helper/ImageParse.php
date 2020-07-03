<?php
/**
 * Class ImageParse
 * @package HandH\Lazyload\Helper
 *
 * This class allows dynamic insertion of padding-top onto the parent element of an image.
 * When combined with the .ratio class, this will eliminate any page re-flow caused by the images lazy loading.
 */

namespace HandH\Lazyload\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class ImageParse extends AbstractHelper
{

    /**
     * @param $image
     * @return float
     */
    public function getImageRatio($image)
    {
        if (preg_match('/(\.jpg|\.png|\.bmp)$/', $image)) {

            /**
             * $image paths may be full URLs,
             * if this is the case translate to full filesystem path
             */
            $urlPaths = parse_url($image);
            if (isset($urlPaths['host'])) {
                $image = BP.'/pub'.$urlPaths['path'];
            }
            $size = @getimagesize($image);

            if ($size) {
                return round((round($size[1]) / round($size[0])) * 100);
            }

            return false;
        }

        return false;
    }

    /**
     * @param $image
     * @return string
     */
    public function getImageRatioStyles($image)
    {
        if (preg_match('/(\.jpg|\.png|\.bmp)$/', $image)) {
            $ratio = $this->getImageRatio($image);
            return "padding-top:" . $ratio . "%;";
        }

        return false;
    }

    /**
     * @param $imageWidth
     * @param $imageHeight
     * @return bool|string
     */
    public function getProductImageRatioStyles($imageWidth, $imageHeight)
    {
        $ratio = round((round($imageHeight) / round($imageWidth)) * 100);
        return "padding-top:" . $ratio . "%;";
    }

    /**
     * @param $image
     * @param $selector
     * @param $mobile
     * @param $breakpoint
     * @return string
     */
    public function getImageRatioInlineStyles($image, $selector, $mobile, $breakpoint)
    {
        $html = "";
        $html .= "<style>" . $selector . "{";
        $html .= $this->getImageRatioStyles($image);
        $html .= "width:100%;";
        $html .= "}";
        if (preg_match('/(\.jpg|\.png|\.bmp)$/', $mobile)) {
            $html .= "@media screen and (max-width: " . $breakpoint . "){";
            $html .= $selector . "{";
            $html .= $this->getImageRatioStyles($mobile);
            $html .= "}}";
        }
        $html .= "</style>";
        return $html;
    }
}
