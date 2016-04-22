<?php
require_once('../unittest/autorun.php');

//.....Simple test to checking the unit test working properly

class CanAddUp extends UnitTestCase {
    function testOneAndOneMakesTwo() {
        $this->assertEqual(1 + 1, 2);
    }
}

?>