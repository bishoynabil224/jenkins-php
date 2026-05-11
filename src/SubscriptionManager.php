<?php
namespace App;

class SubscriptionManager {
    public function getDaysRemaining($totalDays, $daysUsed) {
        // احسب الفرق مباشرة
        $remaining = $totalDays - $daysUsed;
        
        return ($remaining > 0) ? $remaining : 0;
    }
}
