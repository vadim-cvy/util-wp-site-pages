<?php
namespace Cvy\WP\SitePages;

abstract class SitePage extends \Cvy\DesignPatterns\Singleton
{
  protected function __construct()
  {
    add_action( 'wp', fn() => $this->is_current() ? $this->on_is_current() : null );
  }

  abstract public function is_current() : bool;

  protected function on_is_current() : void
  {
    $this->enqueue_assets();
  }

  abstract protected function enqueue_assets() : void;
}