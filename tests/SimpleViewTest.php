<?php namespace Dtkahl\SimpleView;

class SimpleViewTest extends \PHPUnit_Framework_TestCase {

  public function test()
  {
    $renderer = new ViewRenderer(__DIR__.'/testviews/');
    $obj = new \stdClass();
    $obj->foo2 = "bar2";
    $this->assertEquals('<div>bar</div>', $renderer->render('testview.php', ['foo'=> 'bar'], $obj));
  }

}