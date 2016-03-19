<?php namespace Dtkahl\SimpleView;

class SimpleViewTest extends \PHPUnit_Framework_TestCase {

  public function test()
  {
    $renderer = new ViewRenderer(['view_path' => __DIR__.'/testview/']);
    $this->assertEquals('<div>bar</div>', $renderer->render('testview.php', ['foo'=> 'bar']));
  }

}