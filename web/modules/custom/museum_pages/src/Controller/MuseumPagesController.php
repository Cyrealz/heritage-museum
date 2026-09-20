<?php

namespace Drupal\museum_pages\Controller;

use Drupal\Core\Controller\ControllerBase;

class MuseumPagesController extends ControllerBase {

  public function about() {
    return [
      '#theme' => 'page__about',
    ];
  }

  public function visit() {
    return [
      '#theme' => 'page__visit',
    ];
  }

  public function contact() {
    return [
      '#theme' => 'page__contact',
    ];
  }

}
