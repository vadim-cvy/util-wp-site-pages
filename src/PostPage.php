<?php
namespace Cvy\WP\SitePages;
use Exception;

abstract class PostPage extends SitePage
{
  abstract public function get_id() : int;

  final public function is_current() : bool
  {
    if ( ! did_action( 'wp' ) && current_action() !== 'wp' )
    {
      throw new Exception( 'This method must not be called before "wp" action!' );
    }

    return is_singular() && $this->get_id() === get_the_ID();
  }
}