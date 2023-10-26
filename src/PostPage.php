<?php
namespace Cvy\WP\SitePages;

abstract class PostPage extends Singular
{
  abstract public function get_id() : int;

  final public function is_current() : bool
  {
    return parent::is_current() && $this->get_id() === get_the_ID();
  }

  protected function get_post_type() : string
  {
    return '';
  }
}