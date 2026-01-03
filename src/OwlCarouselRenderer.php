<?php

declare(strict_types=1);

/*
 * This file is part of Contao OwlCarousel Bundle.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

namespace Respinar\OwlCarouselBundle;

use Contao\Model;
use Contao\StringUtil;
use Contao\Template;
use Respinar\OwlCarouselBundle\Model\OwlCarouselModel;
use Respinar\OwlCarouselBundle\Model\OwlCarouselSlideModel;

class OwlCarouselRenderer
{
    public function render(Template $template, Model $model, string $instancePrefix, ?string $imageSize = null): void
    {
        $carouselId = (int) ($model->owl_carousel ?? 0);
        $template->owlCarouselId = sprintf('%s-%s-%s', $instancePrefix, $model->id, $carouselId);
        $template->owlCarouselConfig = '{}';

        if ($carouselId < 1) {
            $this->markEmpty($template);

            return;
        }

        $carousel = OwlCarouselModel::findByPk($carouselId);

        if (null === $carousel) {
            $this->markEmpty($template);

            return;
        }

        $template->setData($carousel->row());
        $template->owlCarouselConfig = $this->buildConfig($carousel);

        $slides = OwlCarouselSlideModel::findPublishedByPid($carouselId);

        if (null === $slides || $slides->count() < 1) {
            $this->markEmpty($template);

            return;
        }

        if (null !== $imageSize) {
            $model->imgSize = $imageSize;
        }

        $template->slides = OwlCarousel::parseSlides($slides, $model);

        $this->addAssets($carousel);
    }

    private function markEmpty(Template $template): void
    {
        $template->empty = $GLOBALS['TL_LANG']['MSC']['owlcarousel_noSlide'] ?? '';
        $template->slides = [];
    }

    private function buildConfig(OwlCarouselModel $carousel): string
    {
        $config = [
            'items' => (int) $carousel->items,
            'margin' => (int) $carousel->margin,
            'stagePadding' => (int) $carousel->stagePadding,
            'dots' => (bool) $carousel->dots,
        ];

        foreach (['loop', 'center', 'rewind', 'merge', 'autoWidth', 'autoHeight', 'rtl', 'lazyLoad'] as $field) {
            if ((bool) $carousel->{$field}) {
                $config[$field] = true;
            }
        }

        if (!$carousel->mergeFit) {
            $config['mergeFit'] = false;
        }

        foreach (['smartSpeed'] as $field) {
            if ((int) $carousel->{$field} > 0) {
                $config[$field] = (int) $carousel->{$field};
            }
        }

        if ((bool) $carousel->nav) {
            $config['nav'] = true;
            $navText = StringUtil::deserialize($carousel->navText, true);

            if ([] !== $navText) {
                $config['navText'] = $navText;
            }

            foreach (['navSpeed', 'slideBy'] as $field) {
                if ((int) $carousel->{$field} > 0) {
                    $config[$field] = (int) $carousel->{$field};
                }
            }
        }

        if ((bool) $carousel->dots) {
            foreach (['dotsEach', 'dotsSpeed'] as $field) {
                if ((int) $carousel->{$field} > 0) {
                    $config[$field] = (int) $carousel->{$field};
                }
            }
        }

        if ((bool) $carousel->autoplay) {
            $config['autoplay'] = true;

            foreach (['autoplaySpeed', 'autoplayTimeout'] as $field) {
                if ((int) $carousel->{$field} > 0) {
                    $config[$field] = (int) $carousel->{$field};
                }
            }

            if ((bool) $carousel->autoplayHoverPause) {
                $config['autoplayHoverPause'] = true;
            }
        }

        if (1 === (int) $carousel->items) {
            foreach (['animateIn', 'animateOut'] as $field) {
                if ('' !== (string) $carousel->{$field}) {
                    $config[$field] = (string) $carousel->{$field};
                }
            }
        }

        return json_encode($config, \JSON_THROW_ON_ERROR | \JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_AMP | \JSON_HEX_QUOT);
    }

    private function addAssets(OwlCarouselModel $carousel): void
    {
        $GLOBALS['TL_BODY']['respinar_owlcarousel_js'] = Template::generateScriptTag('bundles/respinarowlcarousel/owl.carousel.min.js', false, null);
        $GLOBALS['TL_HEAD']['respinar_owlcarousel_css'] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.carousel.min.css', false, null);
        $GLOBALS['TL_HEAD']['respinar_owlcarousel_theme_css'] = Template::generateStyleTag('bundles/respinarowlcarousel/assets/owl.theme.default.min.css', false, null);

        if ($carousel->animateIn || $carousel->animateOut) {
            $GLOBALS['TL_HEAD']['respinar_owlcarousel_animate_css'] = Template::generateStyleTag('bundles/respinarowlcarousel/animate/animate.min.css', false, null);
        }
    }
}
