<?php
use PHPUnit\Framework\TestCase;

// تأكد من أن المسار هنا يشير لمكان وجود ملف الـ Logic فعلياً
require_once __DIR__ . '/../src/SubscriptionManager.php';

class SubscriptionTest extends TestCase {
    
    public function testDaysRemainingCalculation() {
        $sub = new \App\SubscriptionManager();
        
        
        $expectedDays = 20;
        $result = $sub->getDaysRemaining(30, 10);
        
       
        $this->assertEquals($expectedDays, $result, "Failed asserting that 30 - 10 equals 20");
    }

    public function testExpiredSubscription() {
        $sub = new \App\SubscriptionManager();
        
        
        $result = $sub->getDaysRemaining(30, 35);
        
        $this->assertEquals(0, $result, "Failed asserting that expired subscription returns 0");
    }
}
