<?php
namespace Cvy\WP\SitePages;
use Exception;

abstract class Singular extends SitePage
{
  public function is_current() : bool
  {
    if ( ! did_action( 'wp' ) && current_action() !== 'wp' )
    {
      throw new Exception( 'This method must not be called before "wp" action!' );
    }

    return is_singular( $this->get_post_type() );
  }

  abstract public function get_post_type() : string;
}